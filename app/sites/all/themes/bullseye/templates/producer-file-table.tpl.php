<?php
/**
 * template file for file browser
 */
?>
<?php
function producer_file_process_files($files = ''){
  ?>
<?php 
  $x = 0;
  $total_rows = count($files);
  $last_row = '';
  foreach($files as $file_name => $data):
  $col_id = str_replace(' ', '-', strtolower($file_name));

  if($x == $total_rows-1){
    $last_row = ' file-row-last-row';
  }
  ?>
  <tr class="file-row-<?php echo $x; ?><?php echo $last_row ?>">
    <td>
      <div class="checkbox"><input type="checkbox" class="<?php echo $col_id ?> file-row-checkbox" /></div>
    </td>
    <td class="file-name"><?php echo $file_name ?></td>
    <td class="file-type"><?php echo $data['type'] ?></td>
    <td class="account-name"><?php echo $data['account'] ?></td>
    <td class="upload-date"><?php echo $data['upload_date'] ?></td>
    <td class="upload-name"><?php echo $data['upload_name'] ?></td>
    <td class="last-access"><?php echo $data['last_access'] ?></td>
  </tr>
<?php
  $x++;
  endforeach;
?>
<?php
}

?>
<table class="file-browser-files-table">
  <thead>
    <tr>
      <th>
        <div class="checkbox"><input type="checkbox" id="file-browser-check-all-files" class="file-row-checkbox"></div>
      </th>
      <th>Filename<div class="sort-btn asc"></div></th>
      <th>Type<div class="sort-btn asc"></div></th>
      <th>Account<div class="sort-btn asc"></div></th>
      <th>Uploaded On<div class="sort-btn asc"></div></th>
      <th>Uploaded By<div class="sort-btn asc"></div></th>
      <th>Last Accessed<div class="sort-btn asc"></div></th>
    </tr>
  </thead>
  <tbody>
    <?php producer_file_process_files($files); ?>
  </tbody>
</table>