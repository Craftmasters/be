<div class="top-header-inner">
  <ul class="top-header-icons horizontal-list">
    <li class="top-header-li">
      <a href="#">
        <span class="user-name"><?php print $fname; ?><i class="fa fa-sort-desc" aria-hidden="true"></i></span>
        <img class="user-pic" src="/sites/all/themes/bullseye/images/default-user.png">
      </a>
      <ul class="top-header-ul-children hide">
        <li><a href="/user/logout"><?php print t('Logout'); ?></a></li>
      </ul>
    </li>
    <li>
      <a href="/gmail-connector/other"><img class="be-icon" src="<?php print $envelope_icon; ?>"></a>
    </li>
    <li class="top-header-li">
      <a href="#"><img class="be-icon" src="<?php print $plus_icon; ?>"></a>
      <ul class="top-header-ul-children hide">
        <li><a href="/accounts/new/lead" rel="lightframe"><?php print t('Add New Account'); ?></a></li>
        <!--<li><a href="#"><?php //print t('Add New Task'); ?></a></li>
        <li><a href="#"><?php //print t('Add New Activity'); ?></a></li>-->
        <li><a href="/producer/add" rel="lightframe"><?php print t('Add New Producer'); ?></a></li>
        <li><a href="/carriers/add" rel="lightframe"><?php print t('Add New Carrier'); ?></a></li>
        <li><a href="/rfps/initial-add" rel="lightframe"><?php print t('Add New RFP'); ?></a></li>
        <?php if (Bullseye::hasRole('administrator', $roles) || Bullseye::hasRole('admin', $roles)): ?>
          <li><a href="/mailchimp"><?php print t('Add Campaign'); ?></a></li>
        <?php endif; ?>
      </ul>
    </li>
  </ul>

</div>


