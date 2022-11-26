<?php      
// function myErrorHandler($errno, $errstr, $errfile, $errline) {
//     if (!(error_reporting() & $errno)) {
//         // This error code is not included in error_reporting
//         return;
//     }

//     switch ($errno) {
//         case E_USER_ERROR:
//         echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
//         echo "  Fatal error on line $errline in file $errfile";
//         echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
//         echo "Aborting...<br />\n";
//         exit(1);
//         break;

//     case E_USER_WARNING:
//         echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
//         break;

//     case E_USER_NOTICE:
//         echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
//         break;

//     default:
//         echo "Unknown error type: [$errno] $errstr<br />\n";
//         break;
//     }

//     /* Don't execute PHP internal error handler */
//     return true;
// }

// set_error_handler("myErrorHandler");


// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);


?>

