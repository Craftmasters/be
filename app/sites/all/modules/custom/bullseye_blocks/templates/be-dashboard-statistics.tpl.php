<div class="be-regular-block">
  <div class="be-block-main">
    <div class="statistics-dashboard">
      <div class="stat-item">
        <div class="stat-item-inner">
          <span id="stat-lead-num" class="stat-number"><?php print $leads_total; ?></span>
          <span class="stat-desc"><?php print t('Leads'); ?></span>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-item-inner">
          <span id="stat-prospect-num" class="stat-number"><?php print $prospects_total; ?></span>
          <span class="stat-desc"><?php print t('Prospects'); ?></span>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-item-inner">
          <span id="stat-opportunity-num" class="stat-number"><?php print $opportunities_total; ?></span>
          <span class="stat-desc"><?php print t('Opportunities'); ?></span>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-item-inner">
          <span  id="stat-deal-num" class="stat-number"><?php print $deals_total; ?></span>
          <span class="stat-desc"><?php print t('Deals in Progress'); ?></span>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-item-inner">
          <span id="stat-closed-num" class="stat-number">0</span>
          <span class="stat-desc"><?php print t('Closed Deals'); ?></span>
        </div>
      </div>
    </div>
  </div>
</div>