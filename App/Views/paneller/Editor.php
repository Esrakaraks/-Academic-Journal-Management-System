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
        <a class="nav-link" href="<?= URL_ROOT ?>/YazarPanel/MakaleYaz">MakaleEkle</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= URL_ROOT ?>/Yazarpanel/bildirimler">Bildirimler</a>
        </li>
        <li class="nav-item">
       <bold> <a class="nav-link" href="<?= URL_ROOT ?>/Yazarpanel/mesajlar">Mesajlar</a></bold>
        </li>

        
        </ul>
       
        <a href="<?= URL_ROOT ?>/YazarPanel/cikis" class="btn btn-outline-secondary">Çıkış</a>
        
       
        </nav>
        <center>
        <div class="container">
         <a href="<?= URL_ROOT ?>/EditorPanel/makaleler"class="btn btn-secondary btn-lg">Makaleler</a>
         <a href="<?= URL_ROOT ?>/YazarPanel/kabuledilen" class="btn btn-success btn-lg">Kabul Edilen</a>

        <a href="<?= URL_ROOT ?>/YazarPanel/yayınlanan"class="btn btn-info btn-lg">Yayınlanan</a>

        <a href="<?= URL_ROOT ?>/YazarPanel/reddedilen" class="btn btn-danger btn-lg">Reddedilen</a>

        </div>
        </center>
    </body>
    </html>