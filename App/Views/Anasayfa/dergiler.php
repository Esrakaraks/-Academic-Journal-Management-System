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
    
    <style type="text/css">
         body { background-color:gray; color:white; }
         p { font-family: Tahoma, Verdana; font-size: 12px; }
         a.btn btn-danger {
        -webkit-appearance: btn btn-danger;
        -moz-appearance:btn btn-danger;
        appearance: btn btn-danger;

        text-decoration: none;
        color: initial;
}
      </style>
    </head>

    <body>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
        <div class="container">
        <a class="navbar-brand" href="<?= URL_ROOT ?>/Home/index">FÜDERGİ</a>
        
        </a>
        </div>
        <li class="nav-item">
        <a class="nav-link" href="<?= URL_ROOT ?>/Home/hakkinda">HAKKINDA</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= URL_ROOT ?>/Home/dergiler">DERGİLER</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="<?= URL_ROOT ?>/Home/konular">KONULAR</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="<?= URL_ROOT ?>/Home/yayıncılar">YAYINCILAR</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="<?= URL_ROOT ?>/Home/iletisim">İLETİŞİM</a>
        </li>

        </ul>
      
     
        <a href="<?= URL_ROOT ?>/secenek/index" class="btn btn-outline-secondary">GİRİŞ</a>
       
        </nav>
        
        </div><br>
        <div class="container">
        <img src="/AkademikDer/uploads/images/tip.jpg"   width="170" height="236">
       <strong> <p><a href="<?= URL_ROOT ?>/Dergiturleri/TıpDergisi" class="text-dark">FIRAT TIP DERGİSİ</a></p></strong>
       <img src="/AkademikDer/uploads/images/mühendis.jpg"   class="rounded" alt="Cinque Terre" width="170" height="236">
       <strong> <p><a href="<?= URL_ROOT ?>/Dergiturleri/MühendislikBilimleriDergisi" class="text-dark">FIRAT ÜNİVERSİTESİ MÜHENDİSLİK BİLİMLERİ DERGİSİ</a></p></strong>
       <img src="/AkademikDer/uploads/images/arastrma.png"   class="rounded" alt="Cinque Terre" width="170" height="236">
       <strong> <p><a href="<?= URL_ROOT ?>/Dergiturleri/DoguArastırmaDergisi" class="text-dark">FIRAT ÜNİVERSİTESİ DOĞU ARAŞTIRMA DERGİSİ</a></p></strong>
       <img src="/AkademikDer/uploads/images/sosyal.png"   class="rounded" alt="Cinque Terre" width="170" height="236">
       <strong> <p><a href="<?= URL_ROOT ?>/Dergiturleri/SosyalBilimlerDergisi" class="text-dark">FIRAT ÜNİVERSİTESİ SOSYAL BİLİMLER DERGİSİ</a></p></strong>
      <img src="/AkademikDer/uploads/images/fen.jpg"   class="rounded" alt="Cinque Terre" width="170" height="236"><br>
      <strong> <p><a href="<?= URL_ROOT ?>/Dergiturleri/FenBilimlerDergisi" class="text-dark">FIRAT ÜNİVERSİTESİ FEN BİLİMLERİ DERGİSİ</a></p></strong>
      <br><img src="/AkademikDer/uploads/images/iktisadi.jpg"   class="rounded" alt="Cinque Terre" width="170" height="236"><br>
      <strong> <p><a href="<?= URL_ROOT ?>/Dergiturleri/İktisadidariBilimlerDergisi" class="text-dark">FIRAT ÜNİVERSİTESİ ULUSLARARASI İKTİSADİ VE İDARİ BİLİMLER DERGİSİ</a></p></strong>
       
     </div>


    </body>
</html>
