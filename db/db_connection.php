<!-- **This file should be in .env when we in real production enviorments** -->
<?php
// Enter your host name, database username, password, and database name.
// If you have not set database password on localhost then set empty.
$con = mysqli_connect("localhost", "root", "mira2022", "clock_project");

// Check Connection
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
    echo "Sucsses";
}

?>
