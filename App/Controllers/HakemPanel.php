<?php
namespace App\Controllers;
use Core\Controller;
use Core\Model;
use App\Models\HakemKayit;
use App\Models\MakaleYaz;
use Core\Cookie;

class HakemPanel extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
      

    }

    public  function giris_tamamla(){
   
        $warnings = [];
        if(!isset($_POST['eposta']) || $_POST['eposta'] == null) {
            array_push($warnings, "E Posta Adresi Girilmedi!");
        }
        if(!isset($_POST['sifre']) || $_POST['sifre'] == null) {
            array_push($warnings, "Şifre Girilmedi!");
        }

        if(empty($warnings)) {
            $hakemKayitModel = new HakemKayit();
            $user = $hakemKayitModel->getHakemByEmail($_POST['eposta']);
            if(!$user) {
                array_push($warnings, "E Posta Adresi Yanlış Girildi!");
            }else{
                //hakem varsa...
                if($user[0]['kayit_sifre'] !== $_POST['sifre']) { //girilen şifre ile VT deki aynı mı?
                    array_push($warnings, "Şifre Yanlış Girildi!");
                }else{
                    //Her şeyi dğru girdi...
                    Cookie::set('hakem_email', $user[0]['kayit_email']);
                    Cookie::set('hakemTc', $user[0]['kayit_tc']);
                    Cookie::delete("editorTc");
                    Cookie::delete("editor_email");
                    Cookie::delete("yazarTc");
                    Cookie::delete("yazar_email");

                    go(URL_ROOT . '/HakemPanel/form');
                    //Böylece oturum başlatılacak.
                    //Giriş controller ında da oturum varsa hiç giriş formuna göndermiyeceksin.
                
                    array_push($warnings, "Giriş Başarılı");
                }
            }
        }

        $data['warnings'] = $warnings;
        $this->view->render("kayitlar/mesaj", $data);
    }

    public function makaleler() {
        $makaleModel = new MakaleYaz();
        $data["makaleler"] = $makaleModel->hakemBekleyenler();

        $this->view->render("paneller/makaleler", $data);
    }

    public function form(){
        if(Cookie::exists('hakem_email')) { 
            $this->view->render("paneller/Hakem"); 
        }else{
            $this->view->render("formlar/formhakem"); //giriş yapılmamışsa. Giriş formuna..
        }
    }

    public function kayitformu(){
        $this->view->render("kayitlar/hakemkayit");
    }

    public function kayit_ekle(){ 
        
        $warnings = [];
        if(!isset($_POST['tc']) || $_POST['tc'] == null) {
            array_push($warnings, "TC Kimlik No girilmedi!");
        }
        if(!isset($_POST['adi']) || $_POST['adi'] == null || $_POST['soyadi'] == null || !isset($_POST['soyadi'])) {
            array_push($warnings, "Adı veya Soyadı girilmedi!");
        }
        if(!isset($_POST['kullanici']) || $_POST['kullanici'] == null) {
            array_push($warnings, "Kullanıcı Adı girilmedi!");
        }
        if(!isset($_POST['email']) || $_POST['email'] == null) {
            array_push($warnings, "E Posta adresi girilmedi!");
        }
        if(!isset($_POST['password']) || $_POST['password'] == null) {
            array_push($warnings, "Şifre Girilmedi");
        }
        if(!isset($_POST['uzman']) || $_POST['uzman'] == null) {
            array_push($warnings, "Uzmanlık alanı girilmedi!");
        }

        if(empty($warnings)) {

            $tc =  $_POST['tc'];
            $adi =  $_POST['adi'];
            $soyadi =  $_POST['soyadi'];
            $kullanici = $_POST['kullanici'];
            $email = $_POST['email'];
            $sifre = $_POST['password'];
            $uzmanlik = $_POST['uzman'];

            $data = [
                "kayit_tc"=>$tc,
                "kayit_ad" => $adi,
                "kayit_soyad" => $soyadi,
                "kayit_kullanici" => $kullanici,
                "kayit_email" => $email,
                "kayit_sifre" => $sifre,
                "kayit_uzmanlik" => $uzmanlik
            ];
    
            $hakemkayit = new HakemKayit(); 

            $kayitProcess = $hakemkayit->addHakem($data); 

            if($kayitProcess) {
                array_push($warnings, "Tebrikler! Kayıt Başarılı.");
            }else{
                array_push($warnings, "Üzgünüz! Kayıt Başarısız.");
            }
        }

        $data["warnings"] = $warnings;
        $this->view->render("paneller/Hakem", $data);
    }


    public function cikis() {
        Cookie::delete('hakem_email');
        go(URL_ROOT . "/HakemPanel/form"); //Burdan giriş formuna da yönlendirebilirsini...
    }
}


?>