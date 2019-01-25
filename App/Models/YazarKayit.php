<?php
namespace App\Models;

use Core\Model;
use Core\Cookie;

class YazarKayit extends Model{

    public function __construct() {
        parent::__construct("kayit_yazar");
    }
      

    public function addYazar($yazarDatas){
        $addProcess = $this->insert($yazarDatas);
        return $addProcess;

    }

     public function getYazarByEmail($eposta) {
        return $this->select([
            "where" => "kayit_email = '$eposta'"
        ]);
    }

}

?>