<?php
    use Core\Cookie;
?>

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
        //
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
       
        <div class="container">
            <div class="row">
                <?php foreach($makaleler as $makale): ?>
                <div class="col-sm-12 col-md-6 border">
                    <h2><?= $makale['makale_basligi'] ?></h2>
                    <p><?= $makale['makale_konu'] ?></p>
                    <p><a href = "<?= URL_UPLOADS ?>/<?= $makale['makale'] ?>"><?= $makale['makale'] ?></a></p>
                    <?php if(Cookie::exists("yazarTc") && $makale['makale_durum'] == 0): ?>
                    <p><a href="<?= URL_ROOT ?>/YazarPanel/editoreGonder/<?= $makale['makale_id'] ?>" class="btn btn-primary">Editöre yolla</a></p>
                    <?php endif ?>
                    <?php if(Cookie::exists("editorTc") && $makale['makale_durum'] == 1): ?>
                    <p><a href="<?= URL_ROOT ?>/YazarPanel/hakemeGonder/<?= $makale['makale_id'] ?>" class="btn btn-primary">Hakeme yolla</a></p>
                    <?php endif ?>
                    <?php if(Cookie::exists("editorTc") && $makale['makale_durum'] == 3): ?>
                    <p><a href="<?= URL_ROOT ?>/YazarPanel/yayinla/<?= $makale['makale_id'] ?>" class="btn btn-success">Yayınla</a></p>
                    <?php endif ?>
                    <?php if(Cookie::exists("hakemTc") && $makale['makale_durum'] == 2): ?>
                    <p>
                    <a href="<?= URL_ROOT ?>/YazarPanel/hakemOnayladi/<?= $makale['makale_id'] ?>" class="btn btn-primary">Onayla</a>
                    <a href="<?= URL_ROOT ?>/YazarPanel/hakemReddetti/<?= $makale['makale_id'] ?>" class="btn btn-danger">Reddet</a>
                    </p>
                    <?php endif ?>
                </div>
                <?php endforeach ?>
            </div>
        </div>


    </body>
</html>