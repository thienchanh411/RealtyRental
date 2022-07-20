<?php

// set the folder path for the image files
define("IMAGES",'./images/');

define("STUDENT_NAME_1", "NHAT TAN VU");
define("STUDENT_ID_1", 300349240);
define("STUDENT_NAME_2", "CHANH VO");
define("STUDENT_ID_2", 300349240);

// Set all the database things! double check with the PDOWrapper class and your database 
define("DB_HOST", "localhost");
define("DB_NAME", "FinalProject");
define("DB_USER", "root");
define("DB_PASS","");
define("DB_PORT",3306);


// Set the error log things!
define("LOGFILE", "log/error_log.txt");
ini_set("log_errors", TRUE);
ini_set("error_log",LOGFILE);

?>