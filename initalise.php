<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$task = $_GET["task"];

switch ($task) {
    case "search":
        include 'one.php';
        break;
    case "two":
        include 'yup';
        break;
    default:
        echo "default";
        include "searchform";
}
$_GET["search"]



?>
