<!doctype html>
<html lang="en">
<head>
    <base href="<?=PATH?>">
    <meta charset="UTF-8">
    <?php if(!empty($canonical)):?>
        <link rel="canonical" href="<?=$canonical;?>">
    <?php endif;?>
    <link rel="shortcut icon" href="/public/image/news.png" type="image/png" />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="/public/fullcalendar/main.css">
    <link rel="stylesheet" href="/public/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/my.css">
    <?php echo $this->getMeta()?>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <?php new \app\views\Sample\MenuNews([
                'tpl' => PUB . '/menu/menu.php',
            ]);?>
            <div class="row">
                <h1><a style="color: #fff; text-decoration: none;" href="<?= PATH;?>">NEWS</a></h1>
            </div>
        </div>
    </div>
</header>
<?= $content;?>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="container">
        <div class="row">
            <?php
            $footer = new \app\controllers\FooterNews();
            $footer->footerNewsId();
            $footer = $footer->footers;
            ?>
            <h1>Последние актуальные новости.</h1>
            <div class="container">
                <?php if(!empty($footer)):?>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($footer as $value):?>
                        <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$value['title']?></h5>
                                    <p class="card-text"><?=$value['description']?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="category/<?php echo $value['alias'];?>" class="btn btn-primary">Читать</a>
                                </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <?php endif;?>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <span class="text-muted">&copy; 2021 Company, Inc</span>
            </div>
        </div>
    </div>
</footer>

<?php
$logs = \R::getDatabaseAdapter()
   ->getDatabase()
    ->getLogger();

debug( $logs->grep('SELECT') );
?>
<script src="/public/js/jquery-3.6.0.min.js"></script>
<script src="/public/bootstrap/dist/js/bootstrap.js"></script>
<script src="/public/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="/public/fullcalendar/main.js"></script>
<script src="/public/js/my.js"></script>
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>
</body>
</html>