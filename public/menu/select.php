<?php $parent_id = \core\App::$app->getProperty('parent_id'); ?>
    <option value="<?php echo $id;?>"<?php if($id == $parent_id) echo ' selected'; ?><?php if(isset($_GET['id']) && $id == $_GET['id']) echo ' disabled'; ?>>
        <?php echo $tab . $category['title'];?>
    </option>
<?php if(isset($category['childs'])): ?>
    <?php echo  $this->getMenuHtml($category['childs'], '&nbsp;' . $tab. '-') ?>
<?php endif; ?>