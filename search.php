<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Sparqlendpoint.php';

$cambridgesparql = new Sparqlendpoint;
$cambridgesparql->initalise(CAMBRIDGE_URL);

$searchphase = $_GET["q"];


/*  */
$sparqlq = '
 
  SELECT ?pubid ?pubname WHERE { 
	?pubid \'http://www.w3.org/2000/01/rdf-schema#label\' ?pubname .
        FILTER (regex(?pubname, "' . $searchphase . '")) .
        
    

	 }
';
$r = '';
if ($rows = $cambridgesparql->query($sparqlq)) {
  foreach ($rows as $row) {
    $r .= '<li>' . $row['pubid'] . 
      ' <a href="?task=publisherdetails&pubid=' . $row['pubid'] . '">' 
      . $row['pubname'] . '</a></li>';
  }
}


//output
$output .= "<h2>Search for $searchphase</h2>\n";
if ($r) {
    $output .= '<ul>' . $r . '</ul>';
}
else {
    $output .= 'no stuff found' . $sparqlq;
}


echo $output;



?>
