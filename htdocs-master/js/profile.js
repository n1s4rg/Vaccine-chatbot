function getData() {
    let ssn = document.getElementById("ssn");
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let response = JSON.parse(this.responseText);
        if (response != null) {

            document.getElementById("ssn_data").innerHTML = "SSN : " + response.ssn;
            if (response['1st_dose_date'] != null) {
                document.getElementById("1st_dose_date").innerHTML = "1st Dose Date :" + response['1st_dose_date'];
                if (response['1st_dose_slot'] == "first") {
                    document.getElementById("1st_dose_slot").innerHTML = " 1st_dose_slot :11am to 1pm"
                }
                else if (response['1st_dose_slot'] == "second") {
                    document.getElementById("1st_dose_slot").innerHTML = "1st_dose_slot :1pm to 3pm"
                }
                else if (response['1st_dose_slot'] == "third") {
                    document.getElementById("1st_dose_slot").innerHTML = "1st_dose_slot: 3pm to 5pm"
                }
                else if (response['1st_dose_slot'] == "fourth") {
                    document.getElementById("1st_dose_slot").innerHTML = "1st_dose_slot :5pm to 7pm"
                }

                if (response['1st_dose_status'] == "1") {
                    document.getElementById("1st_dose_status").innerHTML = " 1st_dose_status :Dose Not Taken"
                }
                else if (response['1st_dose_status'] == "2") {
                    document.getElementById("1st_dose_status").innerHTML = "1st_dose_status :Doses Taken"
                }

                if (response['2nd_dose_date'] != null) {
                    document.getElementById("2nd_dose_date").innerHTML = "2nd_dose_date :" + response['2nd_dose_date']

                    if (response['2nd_dose_slot'] == "first") {
                        document.getElementById("2nd_dose_slot").innerHTML = "2nd_dose_slot :11am to 1pm"
                    }
                    else if (response['2nd_dose_slot'] == "second") {
                        document.getElementById("2nd_dose_slot").innerHTML = "2nd_dose_slot :1pm to 3pm"
                    }
                    else if (response['2nd_dose_slot'] == "third") {
                        document.getElementById("2nd_dose_slot").innerHTML = "2nd_dose_slot :3pm to 5pm"
                    }
                    else if (response['2nd_dose_slot'] == "fourth") {
                        document.getElementById("2nd_dose_slot").innerHTML = "2nd_dose_slot :5pm to 7pm"
                    }

                    if (response['2nd_dose_status'] == "1") {
                        document.getElementById("2nd_dose_status").innerHTML = " 2nd_dose_status :Dose Not Taken"
                    }
                    else if (response['2nd_dose_status'] == "2") {
                        document.getElementById("2nd_dose_status").innerHTML = "2nd_dose_status :Doses Taken"
                    }

                }
                else {
                    document.getElementById("2nd_dose_date").innerHTML = "Second Dose Date Not Confirmed"
                }
            }
            else {
                document.getElementById("1st_dose_date").innerHTML = "1st Dose Date Not Confirmed"
            }
        }
        else {
            document.getElementById("ssn_data").innerHTML= "Not Data Found"
        }

    }
    xhttp.open("GET", "getData.php?SSN=" + ssn.value, true);
    xhttp.send();

}