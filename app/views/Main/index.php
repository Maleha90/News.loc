<main>
<?php if($status):?>
 <div style="height: 500px" class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div style="height: 500px" id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
                $counter = 0;
                $slides = count($status) - 1;
                for($i = 0; $i <= $slides; $i++){
                    if($counter == 0){
                        $active = 'active';
                    }else{
                        $active = '';
                    }
                    ++$counter;
                }
            ?>
        </div>
        <div class="carousel-inner">
                <?php $i = 0;
                    foreach($status as $item):?>
                        <?php if($i == 0){
                            $active = 'active';
                        }else{
                            $active = '';
                        }
                        ++$i;
                ?>
                <div style="height: 500px" class="carousel-item <?=$active;?>">
                    <img style="height: 500px"  src="public/image/<?=$item->img?>" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?=$item->title;?></h5>
                        <p><?=$item->description;?></p>
                        <a style="margin-bottom: 25px;" href="category/<?php echo $item->alias?>" class="btn btn-primary">Читать</a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
 </div>
<?php endif;?>

<div class="container">
        <div class="col-md-12">
            <?php foreach ($hits as $hit):?>
                <div class="card" style="margin: 10px;">
                    <h5 class="card-header"><?php echo $hit->title;?></h5>
                    <div class="card-body">
                        <p class="card-text"><?php echo $hit->description;?></p>
                        <p>Просмотров: <?=$hit->counter;?></p>
                        <a href="category/<?php echo $hit->alias?>" class="btn btn-primary">Читать</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <hr>
        <div class="col-md-12">
            <h1>Поиск новостей по дате.</h1>
            <div class="card-body">
                <div id='calendar'></div>
                <script> let events = <?=$calendar?> </script>
            </div>
        </div>
</div>
</main>

