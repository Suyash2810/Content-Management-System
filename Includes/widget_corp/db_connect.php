<?php 
        //Creating a database connection
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'secret';
        $dbname = 'widget_corp';

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