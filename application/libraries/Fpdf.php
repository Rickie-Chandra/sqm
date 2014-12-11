<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Fpdf {

    public function includeFunction()
    {
    	require ('fpdf/fpdf.php');
    }
}