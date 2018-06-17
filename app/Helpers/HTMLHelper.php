<?php

if (!function_exists('HelperActivated')) {
    
    /**
    * description
    *
    * @param
    * @return
    */
    function HelperActivated($activated)
    {
        if($activated)
        return 'true';
        return 'false';
    }
}

if (!function_exists('HelperBool')) {
    
    /**
    * description
    *
    * @param
    * @return
    */
    function HelperBool($activated)
    {
        if($activated == "true")
        return '1';
        return '0';
    }
}

