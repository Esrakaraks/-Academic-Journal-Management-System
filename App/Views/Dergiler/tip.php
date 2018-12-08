<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <title>Bootstrap 4 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    <style type="text/css">
         body { background-color:gray; color:white; }
         p { font-family: Tahoma, Verdana; font-size: 12px; }
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
       <button type="input" class="btn btn-right" href="<?= URL_ROOT ?>/giris/index">GİRİŞ</button>
        </nav>
        <div class="container">
        <center>
       <strong> <h3>FIRAT TIP DERGİSİ</h3></strong>
        </center>
        <div class="container">
        <img src="/AkademikDer/uploads/images/tip.jpg"   width="200" height="259">
       </div>
    </body>
</html>
