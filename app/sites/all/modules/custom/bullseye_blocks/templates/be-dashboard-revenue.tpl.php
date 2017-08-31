<div class="be-regular-block">
	<h2 class="be-regular-h2"><?php print t('Revenue'); ?></h2>
	<select class="select-link">
  	<option><?php print t('Year to Date'); ?></option>
  </select>
  <div class="be-block-main">
    <div class="row revenue-top">
    	<div class="col-xs-6">
    		<span class="revenue-value">$100,012</span>
    	</div>
    	<div class="col-xs-6 revenue-chart-legend">
	    	<ul>
	    		<li><span class="square orange"></span><?php print t('Closed Deals'); ?></li>
	    		<li><span class="square yellow-orange"></span><?php print t('Deals in Progress'); ?></li>
	    	</ul>
	    </div>
    </div>
    <div class="chart-container">
    	<canvas id="dashboard-revenue" height="227"></canvas>
    </div>
  </div>
</div>