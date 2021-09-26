<main>
    <div class="container px-4 py-5" id="hanging-icons">
        <div class="row">
            <div class="col d-flex align-items-start">
                <div>
                    <h2>Новостей опубликовано: <?=$number;?></h2>
                    <p>Опубликованные новости, можно отредактировать либо удалить.</p>
                    <a href="<?php echo ADMIN;?>/news" class="btn btn-primary">
                        Перейти
                    </a>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div>
                    <h2>Добавить новость</h2>
                    <p>Здесь можно добавить новость в определенный раздел.</p>
                    <a href="<?php echo ADMIN;?>/news/add" class="btn btn-primary">
                        Перейти
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>