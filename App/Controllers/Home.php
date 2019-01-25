<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use App\Views\Anasayfa\index;
use App\Views\Anasayfa\hakkinda;
//use App\Models\

class Home extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
      

    }

    public function index() {
     
       $user = new User();
      //  $yield['users'] = $user->getUsers();
       
       $this->view->render("Anasayfa/index"); //anasayfa görüntülendi
    }

    public function hakkinda(){
        
   }
   public function dergiler(){

    $this->view->render("Anasayfa/dergiler");

        
  }

   
    public function konular(){

    }
    public function iletisim(){

    }
    public function yayıncılar(){

    }

    public function giris1(){
        
    }
}
?>