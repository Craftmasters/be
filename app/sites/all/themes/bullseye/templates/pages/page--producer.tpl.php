<div class="producer-acct-wrapper">
  <div class="producer-acct-inner">
    <div class="logo-container">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" target="_blank" rel="home" class="header__logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" />
        </a>
      <?php endif; ?>
    </div>
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