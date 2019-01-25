<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <title>FÜDERRGİ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
        <div class="container">
        <a class="navbar-brand" href="<?= URL_ROOT ?>/Home/index">FÜDERGİ</a>
        
        </a>
        
        </div>
        <li class="nav-item">
        <a class="nav-link" href="<?= URL_ROOT ?>/Home/hakkinda">Bildirimler</a>
        </li>
        <li class="nav-item">
       <bold> <a class="nav-link" href="<?= URL_ROOT ?>/Home/dergiler">Mesajlar</a></bold>
        </li>

        
        </ul>
       
        <a href="<?= URL_ROOT ?>/YazarPanel/cikis" class="btn btn-outline-secondary">Çıkış</a>
        </nav>
       <form name="yukleme" method="post" action="<?= URL_ROOT ?>/YazarPanel/MakaleEkle" enctype="multipart/form-data">
          Makale Başlığı : <br/> <input type = "text" name = "makalebasligi"> <br/>
          Anahtar Kelime: <br/> <input type = "text" name = "anahtar"> <br/>
           Konu: <br/> <input type = "text" name = "konu" "> <br/>
          Özet : <br/> <input type = "text" name = "ozet"> <br/>
          <table border="0">

         <tr>
            <td>Dosya Seçiniz:</td>
            <td><input type="file" name="dosya"></td>
         </tr>
         <tr>
        <td> <button class="btn btn-outline-secondary">YÜKLE</button></td>
           
         </tr>
      </table>
      </form>


    </body>
    </html>