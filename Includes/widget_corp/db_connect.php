<?php 
        //Creating a database connection
        $dbhost = 'localhost';
        $dbuser = 'type your user name';
        $dbpass = 'type your password';
        $dbname = 'your database name';

        $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        //Checking whether the connection has been established successfully.

        if(mysqli_connect_errno())
         {
             die(
                 "Database Connection has failed: " .
                 mysqli_connect_error() . 
                "( " . mysqli_connect_errno() . " )"
             );
         }
?>
