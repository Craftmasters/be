<div class="be-regular-block">
  <h2 class="be-regular-h2"><?php print t('Activities'); ?></h2>
  <select class="select-link recent-activities-select">
  	<option><?php print t('All Activity'); ?></option>
  </select>
  <div class="be-block-main">

  	<?php for ($i = 0; $i < 2; $i++) : ?>
  		<div class="be-calendar-act-row row">
	  		<div class="col-xs-1 center"><div class="circle"></div></div>
	  		<div class="col-xs-5">
	  			<span class="orange-font">Meeting with Sarah Jones</span>
	  		</div>
	  		<div class="col-xs-4">
	  			<span class="gray-font">by James Jordan</span>
	  		</div>
	  		<div class="col-xs-2 act-date">
	  			<span class="blue-gray-font">July 18</span>
	  		</div>
	  	</div>
  	<?php endfor; ?>

  	<?php for ($i = 0; $i < 5; $i++) : ?>
  		<div class="be-calendar-act-row row">
	  		<div class="col-xs-1 center"><div class="circle"></div></div>
	  		<div class="col-xs-5">
	  			<span class="orange-font">Call with Albert Adams</span>
	  		</div>
	  		<div class="col-xs-4">
	  			<span class="gray-font">by James Jordan</span>
	  		</div>
	  		<div class="col-xs-2 act-date">
	  			<span class="blue-gray-font">July 18</span>
	  		</div>
	  	</div>
  	<?php endfor; ?>

  </div>
</div>