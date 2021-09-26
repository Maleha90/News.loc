<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH;?>">Главная</a></li>
            <li class="breadcrumb-item"><?=$category->alias;?></li>
        </ol>
    </nav>
</div>
    <div class="container">
        <?php if(!empty($news)):?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($news as $value):?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="../public/image/<?=$value->img;?>" class="card-img-top" style="height: 280px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value->title;?></h5>
                        <p class="card-text"><?= $value->description;?></p>
                    </div>
                    <div class="card-footer">
                        <p style="margin-left: 130px">Просмотров: <?=$value->counter?></p>
                        <a href="category/<?php echo $value->alias;?>" class="btn btn-primary">Читать</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
        <?php endif;?>
    </div>

<div class="text-center">
    <p></p>
    <?php if($pagination->countPages > 1): ?>
        <?php echo $pagination;?>
    <?php endif; ?>
</div>
