<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);

include_once 'Sparqlendpoint.php';

define("CAMBRIDGE_URL",     'http://data.lib.cam.ac.uk/endpoint.php');



echo '<h2>hello</h2>';

$cambridgesparql = new Sparqlendpoint;
$cambridgesparql->initalise(CAMBRIDGE_URL);



/* list names */
$q = '
 
  SELECT * WHERE { 
	?bookid ?o \'http://data.lib.cam.ac.uk/id/entity/cambrdgedb_3a768b95333b51af49d37539e333b92d\'  .
	?bookid \'http://purl.org/dc/terms/title\' ?booktitle . 
	 }
';
$r = '';
if ($rows = $cambridgesparql->query($q)) {
  foreach ($rows as $row) {
    $r .= '<li>' . $row['booktitle'] . '</li>';
  }
}

echo $r ? '<ul>' . $r . '</ul>' : 'no stuff found';

echo $rows;
?>
