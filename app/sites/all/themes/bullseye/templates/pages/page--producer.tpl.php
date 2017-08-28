<div class="producer-acct-wrapper">
  <div class="producer-acct-inner">
    <div id="producer-acct-container">
      <?php print $messages; ?>
      <?php print render($page['content']); ?>
    </div>
    <div class="producer-acct-footer">
      <p><?php print t('Precision-built by'); ?></p>
      <a target="_blank" href="https://www.archerjordan.com/"><img src="<?php print $archerjordan_logo; ?>"></a>
    </div>
  </div>
</div>