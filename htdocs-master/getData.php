<?php

$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

$ssn = $_GET["SSN"];
$sqlstmt = "SELECT * FROM `users` Where `ssn`= $ssn";

$queryId = mysqli_query($conn, $sqlstmt);

$rec = mysqli_fetch_assoc($queryId);
print_r(json_encode($rec));
?>