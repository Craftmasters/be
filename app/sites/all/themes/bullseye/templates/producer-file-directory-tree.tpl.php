<?php
/**
 * template file for file directory tree looping
 */
?>
<?php if(!empty($directories) && is_array($directories)):?>
  <?php foreach($directories as $key => $value): ?>
    <?php if(is_string($value)): ?>
      <div class="directory-name"><?php echo $value ?></div>
    <?php else: ?>
      <div class="directory-name has-children tree-open"><?php echo $value ?></div>
    <?php endif;?>
  <?php endforeach; ?>
<?php endif;?>