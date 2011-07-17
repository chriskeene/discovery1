<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Sparqlendpoint.php';

define("CAMBRIDGE_URL",     'http://data.lib.cam.ac.uk/endpoint.php');

$cambridgesparql = new Sparqlendpoint;
$cambridgesparql->initalise(CAMBRIDGE_URL);

$searchphase = $_GET["q"];


/* list names */
$sparqlq = '
 
  SELECT * WHERE { 
	?pubid \'http://www.w3.org/2000/01/rdf-schema#label\' \'' .
    $searchphase . '\'  .

	 }
';
$r = '';
if ($rows = $cambridgesparql->query($sparqlq)) {
  foreach ($rows as $row) {
    $r .= '<li>' . $row['pubid'] . '</li>';
  }
}


//output

echo $r ? '<ul>' . $r . '</ul>' : 'no stuff found' . $sparqlq;


?>
