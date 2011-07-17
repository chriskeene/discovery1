<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("arc2/ARC2.php");

/* configuration */ 
$config = array(
  /* remote endpoint */
  'remote_store_endpoint' => 'http://data.lib.cam.ac.uk/endpoint.php',
);

/* instantiation */
$store = ARC2::getRemoteStore($config);




/* LOAD will call the Web reader, which will call the
format detector, which in turn triggers the inclusion of an
appropriate parser, etc. until the triples end up in the store. */
$store->query('LOAD <http://data.lib.cam.ac.uk/endpoint.php?>');

/* list names */
$q = '
 
  SELECT * WHERE { 
	?bookid ?o \'http://data.lib.cam.ac.uk/id/entity/cambrdgedb_3a768b95333b51af49d37539e333b92d\'  .
	?bookid \'http://purl.org/dc/terms/title\' ?booktitle . 
	 }
';
$r = '';
if ($rows = $store->query($q, 'rows')) {
  foreach ($rows as $row) {
    $r .= '<li>' . $row['booktitle'] . '</li>';
  }
}

echo $r ? '<ul>' . $r . '</ul>' : 'no named persons found';

?>
