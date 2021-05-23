<?php
    
    require_once __DIR__.'/conector.php';

    class InfoUser{
        public function obterIP(){
            if(filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)){
                return $_SERVER['HTTP_CLIENT_IP'];
            }
            elseif(filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)){
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            elseif(filter_var($_SERVER['HTTP_VIA'], FILTER_VALIDATE_IP)){
                return $_SERVER['HTTP_VIA'];
            }
            else{
                return $_SERVER['REMOTE_ADDR'];
            }
        }
    }
?>