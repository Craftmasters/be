<?php if (!empty($starred_contacts)) : ?>
  <div class="dashboard-table-wrapper">
    <table class="dashboard-tables">
      <tbody>
        <?php foreach ($starred_contacts as $key => $c) : ?>
          <tr>
            <td class="td-35 padding-left-25">
              <i class="fa fa-star yellow" aria-hidden="true"></i>
              <a href="<?php print $c->edit_link; ?>" rel="lightframe" class="new-loaded-contact">
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
      </tbody>
    </table>
  </div>
<?php else : ?>
  <div class="be-block-no-content">
    <span class="no-content"><?php print t('No content available at this moment.'); ?></span>
  </div>
<?php endif; ?>