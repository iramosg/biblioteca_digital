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
