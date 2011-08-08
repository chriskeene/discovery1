<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);

include_once 'Sparqlendpoint.php';

$cambridgesparql = new Sparqlendpoint;
$cambridgesparql->initalise(CAMBRIDGE_URL);

$searchphase = $_GET["q"];


/*  */
$sparqlq = '
SELECT DISTINCT ?pubid ?pubname WHERE { 
        # get all literals
	?pubid <http://www.w3.org/2000/01/rdf-schema#label> ?pubname .
        # where the literal string matches this phase...
        FILTER (regex(?pubname, "' . $searchphase . '")) .
        # and the subject from the above triple is also the
        # object where the predicate is the following
        # ensuring we only select publishers
        ?b <http://purl.org/dc/terms/publisher> ?pubid .
        
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
$output = "";
$output .= "<h2>Search for $searchphase</h2>\n";
if ($r) {
    $output .= '<pre>' . urlencode($sparqlq) .'</pre>';
    $output .= '<ul>' . $r . '</ul>';
}
else {
    $output .= 'no stuff found <pre>' . $r . $sparqlq .'</pre>';
}


echo $output;

// ?b \'http://purl.org/dc/terms/publisher\' ?pubid .
// ?b <http://purl.org/dc/terms/publisher> ?pubid .

?>
