<?php
namespace App\Controllers;
use Core\Controller;


class Secenek extends Controller{
    public function index(){
        $this->view->render("Anasayfa/secenek");

    }
    public function form(){
        $this->view->render("formlar/formhakem");

    }
}
?>