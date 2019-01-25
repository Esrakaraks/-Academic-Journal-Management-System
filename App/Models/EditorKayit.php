<?php
namespace App\Models;

use Core\Model;
use Core\Cookie;

class EditorKayit extends Model{

    public function __construct() {
        parent::__construct("kayit_editor");
    }
   // public function get()

   public function addEditor($EditorDatas){
    $addProcess = $this->insert($EditorDatas); 
   
    return $addProcess;
}

public function getEditorByEmail($eposta) {
    return $this->select([
        "where" => "kayit_email = '$eposta'"
    ]);
}





}

?>