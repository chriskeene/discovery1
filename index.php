<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

define("CAMBRIDGE_URL",     'http://data.lib.cam.ac.uk/endpoint.php');




include 'header-temp.php';

$task = $_GET["task"];
echo $task;

switch ($task) {
    case "search":
        include 'search.php';
        break;
    case "publisherdetails":
        include 'publisherdetails.php';
        break;
    default:
        echo "default";
        //include "welcometext.php";
        include "searchform.php";
}
//include 'initalise.php';

include 'footer-temp.php';

?>
