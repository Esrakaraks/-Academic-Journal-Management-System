<?php
namespace App\Models;

use Core\Model;
use Core\Cookie;
use Core\session;

class HakemKayit extends Model{

    public function __construct() {
        parent::__construct("kayit_hakem");
    }
  
    public function addHakem($HakemDatas){
        $addProcess = $this->insert($HakemDatas); 
       
        return $addProcess;
    }

    public function getHakemByEmail($eposta) {
        return $this->select([
            "where" => "kayit_email = '$eposta'"
        ]);
    }

}

?>