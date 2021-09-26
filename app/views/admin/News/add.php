<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= ADMIN?>">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавление новости</li>
        </ol>
    </nav>
</div>
<hr>
<div class="container">
    <form action="<?php echo ADMIN;?>/news/add" method="post" data-toggle="validator" id="add">
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
                    'prepend' => '<option>Выберите категорию</option>',
                ]) ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Заголовок новости</span>
                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок новости" value="<?php isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : null; ?>" required>
            </div>

            <div class="mb-3">
                <span class="input-group-text" id="basic-addon2">Текст новостей</span>
                <textarea class="form-control" name="text" id="editor1" cols="50" rows="10" required><?php isset($_SESSION['form_data']['text']) ? h($_SESSION['form_data']['text']) : null; ?></textarea>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Описание</span>
                <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="<?php isset($_SESSION['form_data']['description']) ? h($_SESSION['form_data']['description']) : null; ?>" required>
            </div>

            <div class="input-group mb-3">
                <label>
                    <input type="checkbox" name="status"> Статус
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
                            <p><small>Рекомендуемые размеры: 3000x4000</small></p>
                            <div class="single"></div>
                        </div>
                        <div class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <label>
                    <input type="checkbox" name="hit"> Хит
                </label>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form>
    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
</div>

<hr>
