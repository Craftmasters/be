<div class="be-regular-block">
  <h2 class="be-regular-h2"><?php print t('Performance'); ?></h2>
  <select class="select-link">
    <option><?php print t('This Month'); ?></option>
  </select>
  <div class="be-block-main">
    <div class="row performance-top">
      <div class="col-md-5 performace-chart-container">
        <div id="performance-chart"></div>
      </div>
      <div class="col-md-7 top-performers-wrapper">
        <div class="top-performers">
          <h3><?php print t('Top Performers'); ?></h3>
          <div class="row performer">
            <div class="col-xs-7 perf-name"><?php print t('ARCHER JORDAN'); ?></div>
            <div class="col-xs-5 perf-score">
              <span class="up-down"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
              <span class="score">0%</span>
            </div>
          </div>
          <div class="row performer">
            <div class="col-xs-7 perf-name">Szerlip Co.</div>
            <div class="col-xs-5 perf-score">
              <span class="up-down"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
              <span class="score">0%</span>
            </div>
          </div>
          <div class="row performer">
            <div class="col-xs-7 perf-name">Adam Smith</div>
            <div class="col-xs-5 perf-score">
              <span class="up-down"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
              <span class="score">0%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row performance-bottom">
      <div class="col-xs-4">
        <h2><?php print t('Deals Closed'); ?></h2>
        <h1><?php print Bullseye::getDealsClosed(); ?></h1>
      </div>
      <div class="col-xs-4">
        <h2><?php print t('AVE Deal Size Won'); ?></h2>
        <h1>$0</h1>
      </div>
      <div class="col-xs-4">
        <h2><?php print t('Sales Cycle Time'); ?></h2>
        <h1>0 Days</h1>
      </div>
    </div>
  </div>
</div>
