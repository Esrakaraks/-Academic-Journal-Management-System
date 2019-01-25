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
         body {background-image: url("blue2.jpeg");
         background-color: #cccccc;}
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
       
        
     

      <center>
       <ul class="navbar-nav">
         
       <a href="<?= URL_ROOT ?>/HakemPanel/form" class="btn btn-outline-secondary">HAKEM GİRİŞİ</a>
      
       
       <a href="<?= URL_ROOT ?>/EditorPanel/form" class="btn btn-outline-secondary">EDİTÖR GİRİŞİ</a>
      
       <a href="<?= URL_ROOT ?>/YazarPanel/form" class="btn btn-outline-secondary">YAZAR GİRİŞİ</a>
       
     </center>

    </body>
</html>
