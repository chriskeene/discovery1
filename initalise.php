<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$task = $_GET["task"];
echo $task;

switch ($task) {
    case "search":
        include 'search.php';
        break;
    case "pubdetails":
        include 'two.php';
        break;
    default:
        echo "default";
        //include "welcometext.php";
        include "searchform.php";
}



?>
