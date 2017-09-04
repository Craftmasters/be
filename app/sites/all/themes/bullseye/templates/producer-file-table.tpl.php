<?php
/**
 * template file for file browser
 */
?>
<?php
function producer_file_process_files($directory_name = ''){
  ?>
<?php foreach($name as $file_name => $data):
  $col_id = str_replace(' ', '-', strtolower($file_name));
  ?>
  <tr>
    <td><input type="checkbox" id="<?php echo $col_id ?>" /></td>
    <?php foreach($data as $column_name => $value):
      $col_name = str_replace(' ', '-', strtolower($file_name));
      ?>
    <td class="<?php echo $col_name ?>"><?php echo $value ?></td>
    <?php endforeach; ?>
  </tr>
<?php endforeach; ?>
<?php
}

?>
<table class="file-browser-tree-container">
  <thead>
    <tr>
      <th>Check All</th>
      <th>Filename -- Sort Button</th>
      <th>Type -- Sort Button</th>
      <th>Account -- Sort Button</th>
      <th>Uploaded By -- Sort Button</th>
      <th>Last Accessed -- Sort Button</th>
    </tr>
  </thead>
  <tbody>
    <?php producer_file_process_directory($files); ?>
  </tbody>
</table>