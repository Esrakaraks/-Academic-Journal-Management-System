<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\YazarKayit;
use App\Models\MakaleYaz;
use Core\Cookie;
class YazarPanel extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
      

    }

    public function editoreGonder($makale_id) {
        $this->makaleuncelle($makale_id, 1);
    }

    public function hakemeGonder($makale_id) {
        $this->makaleuncelle($makale_id, 2);
    }

    public function hakemOnayladi($makale_id) {
        $this->makaleuncelle($makale_id, 3);
    }
    public function hakemReddetti($makale_id) {
        $this->makaleuncelle($makale_id, 4);
    }

    public function yayinla($makale_id) {
        $this->makaleuncelle($makale_id, 5);
    }
   
    private function makaleuncelle($makale_id, $durum) {
        $makaleModel = new MakaleYaz();
        $data = [
            'makale_durum' => $durum
        ];
        $updateProcess = $makaleModel->makaleGuncelle($makale_id, $data);
        if($updateProcess) {
            $warnings = ["Dergi başarıyla güncellendi :)"];
            $data['warnings'] = $warnings;
            $this->view->render("kayitlar/mesaj", $data);
        }else{
            $warnings = ["Dergi güncellenirken hata oluştu!"];
            $data['warnings'] = $warnings;
            $this->view->render("kayitlar/mesaj", $data);
        }
    }

    public function giris_tamamla(){
        $warnings=[];
        if(!isset($_POST['eposta']) || $_POST['eposta']==null){
            array_push($warnings,"Email adresinizi giriniz.");}
        if(!isset($_POST['sifre']) ||$_POST['sifre']==null){
            array_push($warnings,"Şifrenizi Giriniz.");
        }
        if(empty($warnings)) {
            $yazarKayitModel = new YazarKayit();
            $user = $yazarKayitModel->getYazarByEmail($_POST['eposta']);
            if(!$user) {
                array_push($warnings, "E Posta Adresi Yanlış Girildi!");
            }else{
               
                if($user[0]['kayit_sifre'] !== $_POST['sifre']) { //girilen şifre ile VT deki aynı mı?
                    array_push($warnings, "Şifre Yanlış Girildi!");
                }else{
                    //Her şeyi dğru girdi...c
                    
                    Cookie::set('yazar_email', $user[0]['kayit_email']);
                    Cookie::set('yazarTc', $user[0]['kayit_tc']);
                    Cookie::delete("editorTc");
                    Cookie::delete("editor_email");
                    Cookie::delete("hakemTc");
                    Cookie::delete("hakem_email");
                    go(URL_ROOT . '/YazarPanel/form');
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
        if(Cookie::exists('yazar_email')) { //zaten giriş yapılmışsa
            $this->view->render("paneller/Yazar"); 
        }else{
            $this->view->render("formlar/formyazar"); //giriş yapılmamışsa. Giriş formuna..
        }
    }

    public function kayitformu(){
        $this->view->render("kayitlar/yazarkayit");
    }
    public function kayit_ekle(){
        $warning=[];
        if(!isset($_POST['tc']) || $_POST['tc'] == null) {
            array_push($warnings, "TC Kimlik No girilmedi!");
        }
        if(!isset($_POST['adi']) || $_POST['adi'] == null) {
            array_push($warnings, "Ad girilmedi girilmedi!");
        }
        if(!isset($_POST['soyadi']) || $_POST['soyadi'] == null) {
            array_push($warnings, "Soyad  girilmedi!");
        }if(!isset($_POST['kullanici']) || $_POST['kullanici'] == null) {
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

        $ad = $_POST['adi'];
        $soyad = $_POST['soyadi'];
        $kullanici = $_POST['kullanici'];
        $email = $_POST['email'];
        $sifre = $_POST['password'];
        $uzmanlik = $_POST['uzman'];


        $data = [
            "kayit_ad" => $ad,
            "kayit_soyad" => $soyad,
            "kayit_kullanici" => $kullanici,
            "kayit_email" => $email,
            "kayit_sifre" => $sifre,
            "kayit_uzmanlik" => $uzmanlik

        ];
       

    $yazarkayit = new YazarKayit(); 

    $kayitProcess = $yazarkayit->addYazar($data); 

    if($kayitProcess) {
        array_push($warnings, "Tebrikler! Kayıt Başarılı.");
    }else{
        array_push($warnings, "Üzgünüz! Kayıt Başarısız.");
    }
    

    $data["warnings"] = $warnings;
    $this->view->render("paneller/Yazar", $data);
    }}
    public function cikis() {
        Cookie::delete('yazar_email');
        Cookie::delete('yazarTc');
        go(URL_ROOT . "/YazarPanel/form"); //Burdan giriş formuna da yönlendirebilirsini...
    }
    
    
    public  function Yazar(){
      $this->view->render("paneller/Yazar");
    }
   
    
    public function MakaleYaz(){
       
        $this->view->render("paneller/makaleyaz");
    }

    public function MakaleEkle() {
        $warnings = [];
        
        $fileName = "";
        if($_FILES['dosya']['size'] > 0 ) {
            $fileName = basename($_FILES['dosya']['name']);
            if(!move_uploaded_file($_FILES['dosya']['tmp_name'], DIR_UPLOADS . DS . $fileName)) {
                array_push($warnings, "Dosya Yüklenemedi!");
            }
        }
        if(!isset($_POST['makalebasligi']) || $_POST['makalebasligi'] == null) {
            array_push($warnings, "Makale Başlığı Girilmedi");
        }
        if(!isset($_POST['anahtar']) || $_POST['anahtar'] == null) {
            array_push($warnings, "Anahtar Kelime Girilmedi");
        }
        if(!isset($_POST['konu']) || $_POST['konu'] == null) {
            array_push($warnings, "Konu  Girilmedi!");
        }
        if(!isset($_POST['ozet']) || $_POST['ozet'] == null) {
            array_push($warnings, "Özet  Girilmedi!");
        }
        
        if(empty($warnings)) {
            $anahtar =  $_POST['anahtar'];
            $makalebasligi =  $_POST['makalebasligi'];
            $konu =  $_POST['konu'];
            $ozet = $_POST['ozet'];
          
            $data = [
                "yazar_tc" => Cookie::get("yazarTc"),
                "makale_anahtar" => $anahtar,
                "makale_basligi"=>$makalebasligi,
                "makale_konu" => $konu,
                "makale_ozet" => $ozet,
                "makale"=>$fileName
            ];
    
            $makaleyaz = new MakaleYaz(); 

            $kayitProcess = $makaleyaz->addMakaleYaz($data); 

            if($kayitProcess) {
                array_push($warnings, "Makale Eklendi.");
                go(URL_ROOT . "/YazarPanel/Yazar");
            }else{
                array_push($warnings, "Makale Eklenirken Hata Oluştu.");

            }
        }
    }

    public function makaleler(){
        $makaleyazModel = new MakaleYaz();
        $yazarTc = Cookie::get("yazarTc");
        // biliyorum işte.  Soruyorumnapcaz diye hatanı anla diye. neyse yapıyorum.
        $data["makaleler"] = $makaleyazModel->makaleleriGetir($yazarTc);

        $this->view->render("paneller/makaleler", $data);
       
        
    }
    public function yayınlanan(){

    }
    public function kabuledilen(){

    }
    public function reddedilen(){
        
    }
}


?>