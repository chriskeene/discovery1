<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);

//include_once 'Sparqlendpoint.php';
define("CAMBRIDGE_URL",     'http://data.lib.cam.ac.uk/endpoint.php');


        $endpoint = CAMBRIDGE_URL;
        include_once("arc2/ARC2.php");
        
        $config['remote_store_endpoint'] = $endpoint;
        
        
        /* instantiation */
        $store = ARC2::getRemoteStore($config);
        
        /* LOAD will call the Web reader, which will call the
        format detector, which in turn triggers the inclusion of an
        appropriate parser, etc. until the triples end up in the store. */
        $store->query('LOAD <http://example.com/home.html>');

        
  



echo '<h2>hello</h2>';

//$cambridgesparql = new Sparqlendpoint;
//$cambridgesparql->initalise(CAMBRIDGE_URL);
$searchphase = "Pen";



/* list names */
$q = '
 
  SELECT DISTINCT ?pubid ?pubname WHERE { 
        # get all literals
	?pubid <http://www.w3.org/2000/01/rdf-schema#label\> ?pubname .
        # where the literal string matches this phase...
        FILTER (regex(?pubname, "Peng")) .
        # and the subject from the above triple is also the
        # object where the predicate is the following
        # ensuring we only select publishers
        ?b <http://purl.org/dc/terms/publisher> ?pubid .
}
';
$r = '';
if ($rows = $store->query($q, 'rows')) {
  foreach ($rows as $row) {
    $r .= '<li>' . $row['pubname'] . '</li>';
  }
}

echo $r ? '<ul>' . $r . '</ul>' : 'no stuff found';

echo $rows;
?>
