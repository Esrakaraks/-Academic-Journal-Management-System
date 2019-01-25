<?php
namespace App\Models;

use Core\Model;
use Core\Cookie;
use Core\session;

class MakaleYaz extends Model{

    public function __construct() {
        parent::__construct("makale_yaz");
    }
    public function addMakaleYaz($MakaleData){
        $addProcess = $this->insert($MakaleData); 
         return $addProcess;

    }
    public function getYazarByMakale($dizin) {
        return $this->select([
            "where" => "makale = '$dizin'"
        ]);
    }

    public function makaleleriGetir($yazarTc) {
        return $this->select([
            "where" => "yazar_tc = '$yazarTc'"
        ]);
    }

    public function makaleGuncelle($makale_id, $data) {
        return $this->update("makale_id", $makale_id, $data);
    }

    public function editorBekleyenler() {
        return $this->select([
            "where" => "makale_durum = '1' OR makale_durum = '3'"
        ]);
    }
    public function hakemBekleyenler() {
        return $this->select([
            "where" => "makale_durum = '2'"
        ]);
    }

    public function dergileriGetir($konu) {
        return $this->select([
            "where" => "makale_konu = '$konu' AND makale_durum = '5'"
        ]);
    }
 
}


?>