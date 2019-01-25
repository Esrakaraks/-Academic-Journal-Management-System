<?php
namespace App\Controllers;
use Core\Controller;
use App\Views\formlar\formeditor;
use Core\Cookie;
use Core\Model;
use App\Models\EditorKayit;
use App\Models\MakaleYaz;

class EditorPanel extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
      

    }
    public  function giris_tamamla(){
        $warnings=[];
        if(!isset($_POST['eposta']) || $_POST['eposta']==null){
            array_push($warnings,"Email adresinizi giriniz.");}
        if(!isset($_POST['sifre']) ||$_POST['sifre']==null){
            array_push($warnings,"Şifrenizi Giriniz.");
        }
        if(empty($warnings)) {
            $editorKayitModel = new EditorKayit();
            $user = $editorKayitModel->getEditorByEmail($_POST['eposta']);
            if(!$user) {
                array_push($warnings, "E Posta Adresi Yanlış Girildi!");
            }else{
               
                if($user[0]['kayit_sifre'] !== $_POST['sifre']) { //girilen şifre ile VT deki aynı mı?
                    array_push($warnings, "Şifre Yanlış Girildi!");
                }else{
                    //Her şeyi dğru girdi...c
                    
                    Cookie::set('editor_email', $user[0]['kayit_email']);
                    Cookie::set('editorTc', $user[0]['kayit_tc']);
                    Cookie::delete("yazarc");
                    Cookie::delete("yazar_email");
                    Cookie::delete("hakemTc");
                    Cookie::delete("hakem_email");
                    //kanka değişken isimlerini yanlış girdiğinden dolayı kafam allak bullak.
                    go(URL_ROOT . '/EditorPanel/form');
                    //Böylece oturum başlatılacak.
                    //Giriş controller ında da oturum varsa hiç giriş formuna göndermiyeceksin.
                
                    array_push($warnings, "Giriş Başarılı");
                }
            }
        }

        $data['warnings'] = $warnings;
        
        $this->view->render("kayitlar/mesaj", $data);
    }

    public function form(){
        if(Cookie::exists('editor_email')) { //zaten giriş yapılmışsa
            $this->view->render("paneller/Editor"); 
        }else{
            $this->view->render("formlar/formeditor"); //giriş yapılmamışsa. Giriş formuna..
        }
    }

    public function makaleler() {
        $makaleModel = new MakaleYaz();
        $data["makaleler"] = $makaleModel->editorBekleyenler();

        $this->view->render("paneller/makaleler", $data);
    }
 
    public function kayitformu(){
        $this->view->render("kayitlar/editorkayit");
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
        Cookie::delete('editor_email');
        go(URL_ROOT . "/EditorPanel/form"); //Burdan giriş formuna da yönlendirebilirsini...
    }
     public  function Editor(){
        pr("eggff");
    }}


?>