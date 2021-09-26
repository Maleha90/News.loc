<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= ADMIN?>">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Список новостей</li>
        </ol>
    </nav>
</div>
<div class="container">
    <table class="table table-striped table-hover">
        <?php if(!empty($news)):?>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Категория статьи</th>
                <th scope="col">Название статьи</th>
                <th scope="col">Описание статьи</th>
                <th scope="col">Дата публикации</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($news as $value):?>
                <tr>
                    <th scope="row"><?=$value['id'];?></th>
                    <td><?=$value['news']?></td>
                    <td><?=$value['title']?></td>
                    <td><?=$value['description']?></td>
                    <td><?=$value['data']?></td>
                    <td>
                        <a style="color: green;" href="<?=ADMIN;?>/news/edit?id=<?=$value['id'];?>"><i class="bi bi-eye"></i></a>
                        <a style="color: darkred;" class="delete" href="<?=ADMIN;?>/news/delete?id=<?=$value['id'];?>"><i class="bi bi-x-circle"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        <?php endif;?>
    </table>
    <div class="text-center">
        <p>(<?php echo count($news);?> товаров из <?php echo $count;?>)</p>
        <?php if($pagination->countPages > 1): ?>
            <?php echo $pagination;?>
        <?php endif; ?>
    </div>
</div>