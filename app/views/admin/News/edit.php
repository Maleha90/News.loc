<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= ADMIN?>">Главная</a></li>
            <li class="breadcrumb-item"><a href="<?= ADMIN?>/news">Список новостей</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$news->title;?></li>
        </ol>
    </nav>
</div>
<hr>
<div class="container">
    <form action="<?php echo ADMIN;?>/news/edit" method="post" data-toggle="validator" id="add">
        <div class="box-body">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Категория новости</span>
                <?php new \app\views\Sample\MenuNews([
                    'tpl' => PUB . '/menu/select.php',
                    'container' => 'select',
                    'cache' => 0,
                    'cacheKey' => 'select',
                    'table' => 'categorys',
                    'class' => 'form-select',
                    'attrs' => [
                        'name' => 'category_id',
                        'id' => 'category_id',
                    ],
                ]) ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Заголовок новости</span>
                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок новости" value="<?=$news->title?>" required>
            </div>

            <div class="mb-3">
                <span class="input-group-text" id="basic-addon2">Текст новостей</span>
                <textarea class="form-control" name="text" id="editor1" cols="50" rows="10"><?= $news->text;?></textarea>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Описание</span>
                <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="<?=$news->description?>">
            </div>

            <div class="input-group mb-3">
                <label>
                    <input type="checkbox" name="status" <?php echo $news->status ? ' checked' : null;?>> Статус
                </label>
            </div>

            <div class="mb-3">
                <div class="col-md-4">
                    <div class="card card-danger file-upload">
                        <div class="card-header">
                            <h3 class="card-title">Базовое изображение</h3>
                        </div>
                        <div class="card-body">
                            <div id="single" class="btn btn-success" data-url="news/add-image" data-name="single">Выбрать файл</div>
                            <div class="single">
                                <?php if(!empty($news)):?>
                                    <img src="/image/<?php echo $news->img;?>" alt="" style="max-height: 150px; cursor: pointer;">
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <label>
                    <input type="checkbox" name="hit" <?= $news->hit ? ' checked' : null;?>> Хит
                </label>
            </div>
        </div>
        <div class="box-footer">
            <input type="hidden" name="id" value="<?= $news->id;?>">
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form>
</div>

<hr>
