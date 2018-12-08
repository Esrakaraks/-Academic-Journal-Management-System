<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use App\Views\Anasayfa\index;
use App\Views\Anasayfa\dergiler;
use App\Views\Dergiler\doguarastırma;
use App\Views\Dergiler\fenbilimler;
use App\Views\Dergiler\sosyalbilimler;
use App\Views\Dergiler\tip;
use App\Views\Dergiler\iktisadi;



class Dergiturleri extends Controller {
  
    public function MühendislikBilimleriDergisi(){
        $this->view->render("Dergiler/muhendislik"); 

    }

    public function SosyalBilimlerDergisi(){
        $this->view->render("Dergiler/sosyalbilimler"); 

    }
    public function FenBilimlerDergisi(){
        $this->view->render("Dergiler/fenbilimler"); 

    }
    public function TıpDergisi(){
        $this->view->render("Dergiler/tip"); 

    }
    public function DoguArastırmaDergisi(){
        $this->view->render("Dergiler/doguarastırma"); 

    }
    public function İktisadidariBilimlerDergisi(){
        $this->view->render("Dergiler/iktisadi"); 

    }
} ?>