<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class FPDF
{
        /**
        * Constructor
        *
        * @param string $class class name
        */
        
        function __construct()
        {
$fpdf = NULL;

        $dir = dirname(__FILE__);
        require_once $dir . '/fpdf/fpdf.php';

        ini_set('include_path',
        ini_get('include_path') . PATH_SEPARATOR . APPPATH . 'libraries/fpdf/');

                if ($fpdf)
                {
                require_once (string) $fpdf . EXT;
                log_message('debug', "FPDF Class $fpdf Loaded");
                }
                else
                {
                log_message('debug', "FPDF Class Initialized");
                }
        }

        /**
        * PHPRtfLite Class Loader
        *
        * @param string $class class name
        */
        function load($fpdf)
        {
                require_once (string) $fpdf . EXT;
                log_message('debug', "FPDF Class $fpdf Loaded");
        }
}
?> 