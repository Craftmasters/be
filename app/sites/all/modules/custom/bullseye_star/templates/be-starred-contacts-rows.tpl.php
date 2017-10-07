<?php foreach ($starred_contacts as $key => $c) : ?>
  <tr>
    <td class="td-35 padding-left-25">
      <i class="fa fa-star yellow" aria-hidden="true"></i>
      <a href="<?php print $c->edit_link; ?>" rel="lightframe">
        <span class="gray-font"><?php print $c->field_firstname_value . ' ' . $c->field_lastname_value; ?></span>
      </a>
    </td>
    <td class="td-35">
      <span class="light-gray-font"><?php print $c->field_position_value; ?></span>
    </td>
    <td class="td-30 padding-right-25">
      <a href="<?php print $c->company_link; ?>"><span class="orange-font"><?php print $c->company_name; ?></span></a>
    </td>
  </tr>
<?php endforeach; ?>