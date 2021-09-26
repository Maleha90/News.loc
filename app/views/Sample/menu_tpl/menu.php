<li>
    <a href="?id=<?php echo $id;?>" class="nav-link px-2" ><?php echo $category['title'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul>
            <?php echo $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>