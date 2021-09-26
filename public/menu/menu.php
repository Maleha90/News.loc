<?php $parent = isset($category['childs']); ?>
<li>
    <a style="color: #fff;" href="news/<?php echo $category['alias'];?>" class="nav-link px-2"><?php echo $category['title'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul>
            <?php echo $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>