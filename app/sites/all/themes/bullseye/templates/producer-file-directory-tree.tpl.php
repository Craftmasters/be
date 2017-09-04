<?php
/**
 * template file for file directory tree looping
 */
?>
<?php
function producer_file_process_directory($name){
  ?>
<?php if(!empty($name) && is_array($name)):?>
  <?php foreach($name as $key => $value): ?>
    <?php if(is_string($value)): ?>
      <li class="directory-name"><?php echo $value ?></li>
    <?php elseif(is_array($value)): ?>
      <li class="directory-name has-children tree-open">
        <?php echo $key ?>
        <ul class="directory-name-tree-container">
          <?php producer_file_process_directory($value); ?>
        </ul>
      </li>
    <?php endif;?>
  <?php endforeach; ?>
<?php endif;?>
<?php
}

?>
<ul class="directory-name-tree-container">
  <li class="directory-name has-children tree-open">All Files
    <ul class="directory-name-tree-container">
  <?php producer_file_process_directory($directory); ?>
    </ul>
  </li>
</ul>