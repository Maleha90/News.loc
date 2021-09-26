<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH;?>">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$news->title?></li>
        </ol>
    </nav>
</div>
<article class="card mb-4">
    <div class="container">
    <div class="row">
        <div class="col-4">
            <img style=" width: 100%; padding-top: 10px" src="../public/image/<?=$news->img;?>" alt="">
        </div>
        <div class="col-8">
            <h1><?=$news->title;?></h1>
            <p><?=$news->text;?></p>
            <div>
                <p>Дата публикации: <?=$news->data;?>.</p>
                <p>Просмотров: <?=$news->counter;?></p>
            </div>
        </div>
    </div>
    </div>
    <?php if($n_viewed):?>
    <hr>
    <div class="container">
        <h2 style="padding-bottom: 10px">Недавно просмотренные новости.</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($n_viewed as $item):?>
            <div class="col">
                <div class="card h-100" style="background-color: #cfec80;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item->title?></h5>
                        <p class="card-text"><?= $item->description?></p>
                    </div>
                    <div class="card-footer">
                        <p>Просмотров: <?=$item->counter;?></p>
                        <a href="category/<?php echo $item->alias?>" class="btn btn-primary">Читать</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php endif;?>
</article>
<!-- /.card -->