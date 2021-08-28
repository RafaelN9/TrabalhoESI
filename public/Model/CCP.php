<?php
require_once('Professor.php');
class CCP extends Professor{
    private $isCCP;

    function __construct($isCCP) {
        $this->isCCP = $isCCP;
    }
 
    public function getisCCP(){
        return $this->isCCP;
    }

    public function setisCCP($isCCP){
        $this->isCCP = $isCCP;
    }
}
