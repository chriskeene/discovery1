<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sparqlendpoint
 *
 * @author chriskeene
 */
class Sparqlendpoint {
    
    
    protected $config;
    protected $store;


    
    public function initalise ($endpoint) {
        include_once("arc2/ARC2.php");
        
        $this->config['remote_store_endpoint'] = $endpoint;
        
        
        /* instantiation */
        $this->store = ARC2::getRemoteStore($this->config);
        
        /* LOAD will call the Web reader, which will call the
        format detector, which in turn triggers the inclusion of an
        appropriate parser, etc. until the triples end up in the store. */
        $this->store->query('LOAD <http://data.lib.cam.ac.uk/endpoint.php?>');

        
    }
    
    public function query ($q) {
        $result = $this->store->query($q, 'rows');
        return $result;
    }






}

?>
