<?php
/**
 * template file for file browser
 */
?>
<?php
function producer_file_process_files($files = ''){
  ?>
<?php foreach($files as $file_name => $data):
  $col_id = str_replace(' ', '-', strtolower($file_name));
  ?>
  <tr>
    <td class="checkbox"><input type="checkbox" id="<?php echo $col_id ?>" /></td>
    <td class="file-name"><?php echo $file_name ?></td>
    <td class="file-type"><?php echo $data['type'] ?></td>
    <td class="account-name"><?php echo $data['account'] ?></td>
    <td class="upload-date"><?php echo $data['upload_date'] ?></td>
    <td class="upload-name"><?php echo $data['upload_name'] ?></td>
    <td class="last-access"><?php echo $data['last_access'] ?></td>
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
      <th>Uploaded On -- Sort Button</th>
      <th>Uploaded By -- Sort Button</th>
      <th>Last Accessed -- Sort Button</th>
    </tr>
  </thead>
  <tbody>
    <?php producer_file_process_files($files); ?>
  </tbody>
</table>