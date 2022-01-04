<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// connecting to database
$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

if ($_POST['type'] == "SSN_CHECK") {
    //checking user query to database query
    $query = "SELECT * FROM users WHERE ssn=" . $_POST['ssn'];
    $run_query = mysqli_query($conn, $query) or die("Error");

    // if user query matched to database query we'll show the reply otherwise it go to else statement
    if (mysqli_num_rows($run_query) > 0) {
        //fetching replay from the database according to the user query
        $data = mysqli_fetch_assoc($run_query);

        if ($data['1st_dose_status'] == 0) {
            echo '<p>Select Date for 1st Dose</p>
            <form onsubmit="dose1stDateCheck(event)">
              <input type="date" name="date" required/>
              <input type="submit" name="submit" />
            </form>';
            return false;
        }
        if ($data['1st_dose_status'] == 1) {
            echo "<p>1st Dose is already booked on: " . $data['1st_dose_date'] . "</p>";
            return false;
        }
        if ($data['1st_dose_status'] == 2) {
            if ($data['2nd_dose_status'] == 0) {
                echo '<p>1st dose already taken. <br/> Select Date for 2nd Dose</p>
                <form onsubmit="dose2ndDateCheck(event)">
                  <input type="date" name="date" required/>
                  <input type="submit" name="submit" />
                </form>';
                return false;
            }
            if ($data['2nd_dose_status'] == 1) {
                echo "<p>2nd Dose is already booked on: " . $data['1st_dose_date'] . "</p>";
                return false;
            }
            if ($data['2nd_dose_status'] == 2) {
                echo "<p>Both doses are already taken</p>";
                return false;
            }
        }
    } else {

        //API Call

        if ($_POST['ssn'] == "12345678") {
            echo "Age is not qualify";
            return false;
        }

        $insert_data = "INSERT INTO `users`(`ssn`) VALUES (" . $_POST['ssn'] . ")";
        $insert_run_query = mysqli_query($conn, $insert_data) or die("Error");
        if ($insert_run_query) {
            echo '<p>Select Date for 1st Dose</p>
            <form onsubmit="dose1stDateCheck(event)">
              <input type="date" name="date" required />
              <input type="submit" name="submit" />
            </form>';
        }
    }
}

if ($_POST['type'] == "1ST_DOSE_DATE_CHECK") {
    //checking user query to database query
    $check_data = 'SELECT * FROM `slots` WHERE `date`="' . $_POST['date'] . '"';
    $run_query = mysqli_query($conn, $check_data) or die("Error");
    // if user query matched to database query we'll show the reply otherwise it go to else statement
    if (mysqli_num_rows($run_query) > 0) {
        //fetching replay from the database according to the user query
        $fetch_data = mysqli_fetch_assoc($run_query);
        $reply = "<p>Please select time slot</p>";
        if ($fetch_data["first"] < 5) {
            $reply .= '<button class="option" onclick="dose1stTimeCheck(\'11 to 1\',\'first\');">11 to 1</button>';
        }
        if ($fetch_data["second"] < 5) {
            $reply .= '<button class="option" onclick="dose1stTimeCheck(\'1 to 3\',\'second\');">1 to 3</button>';
        }
        if ($fetch_data["third"] < 5) {
            $reply .= '<button class="option" onclick="dose1stTimeCheck(\'3 to 5\',\'third\');">3 to 5</button>';
        }
        if ($fetch_data["fourth"] < 5) {
            $reply .= '<button class="option" onclick="dose1stTimeCheck(\'5 to 7\',\'fourth\');">5 to 7</button>';
        }
        echo $reply;
    } else {
        echo "<p>This Date is not availiable for booking!<br/>" . '<button class="option" onclick="send(\'Main Menu\',\'1\');">
        Go to Main Menu
      </button></p>';
    }
}

if ($_POST['type'] == "1ST_DOSE_TIME_SET") {
    $ssn = $_POST['ssn'];
    $date = $_POST['date'];
    $slot = $_POST['slot'];
    $check_data = "UPDATE `users` SET `ssn`='$ssn',`1st_dose_date`='$date',`1st_dose_slot`='$slot',`1st_dose_status`=1 WHERE `ssn`='$ssn'";
    $run_query = mysqli_query($conn, $check_data) or die("Error");
    if ($run_query) {
        echo "<p>Registration for DOSE 1 is successful.<br/> Thank you</p>";
    } else {
        echo "<p>This Date is not availiable for booking!<br/>" . '<button class="option" onclick="send(\'Main Menu\',\'1\');">
        Go to Main Menu
      </button><br/>';
    }
}

if ($_POST['type'] == "2ND_DOSE_DATE_CHECK") {
    //checking user query to database query
    $check_data = 'SELECT * FROM `slots` WHERE `date`="' . $_POST['date'] . '"';
    $run_query = mysqli_query($conn, $check_data) or die("Error");
    // if user query matched to database query we'll show the reply otherwise it go to else statement
    if (mysqli_num_rows($run_query) > 0) {
        //fetching replay from the database according to the user query
        $fetch_data = mysqli_fetch_assoc($run_query);
        $reply = "<p>Please select time slot</p>";
        if ($fetch_data["first"] < 5) {
            $reply .= '<button class="option" onclick="dose2ndTimeCheck(\'11 to 1\',\'first\');">11 to 1</button>';
        }
        if ($fetch_data["second"] < 5) {
            $reply .= '<button class="option" onclick="dose2ndTimeCheck(\'1 to 3\',\'second\');">1 to 3</button>';
        }
        if ($fetch_data["third"] < 5) {
            $reply .= '<button class="option" onclick="dose2ndTimeCheck(\'3 to 5\',\'third\');">3 to 5</button>';
        }
        if ($fetch_data["fourth"] < 5) {
            $reply .= '<button class="option" onclick="dose2ndTimeCheck(\'5 to 7\',\'fourth\');">5 to 7</button>';
        }
        echo $reply;
    } else {
        echo "This Date is not availiable for booking!<br/>" . '<button class="option" onclick="send(\'Main Menu\',\'1\');">
        Go to Main Menu
      </button>';
    }
}

if ($_POST['type'] == "2ND_DOSE_TIME_SET") {
    $ssn = $_POST['ssn'];
    $date = $_POST['date'];
    $slot = $_POST['slot'];
    $check_data = "UPDATE `users` SET `ssn`='$ssn',`2nd_dose_date`='$date',`2nd_dose_slot`='$slot',`2nd_dose_status`=1 WHERE `ssn`='$ssn'";
    $run_query = mysqli_query($conn, $check_data) or die("Error");


    $data_query = "SELECT * from `slots` where `date`='$date'";
    $run_data_query = mysqli_query($conn, $data_query) or die("Error");
    $data = mysqli_fetch_assoc($run_data_query);
    $count = $data[$slot] + 1;

    $query_slots = "UPDATE `slots` SET `$slot`=$count WHERE `date`='$date'";
    $run_query_slots = mysqli_query($conn, $query_slots) or die("Error");
    if ($run_query) {
        echo "<p>Registration for DOSE 2 is successful.<br/> Thank you</p>";
    } else {
        echo "<p>This Date is not availiable for booking!<br/>" . '<button class="option" onclick="send(\'Main Menu\',\'1\');">
        Go to Main Menu
      </button><br/>';
    }
}
