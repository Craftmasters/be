<?php print render($form['form_title']); ?>

<div class="row">
  <div class="col-md-6 container-company">
    <h2 class="heading-company-information"><?php print t('Company information'); ?></h2>

    <div class="col-md-12">
      <?php print render($form['company_container']['contact_company']); ?>
    </div>
    <div class="col-md-12">
      <?php print render($form['company_container']['contact']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['company_container']['contact_title']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['company_container']['contact_number']); ?>
    </div>
    <div class="col-md-12">
      <?php print render($form['company_container']['contact_industry']); ?>
    </div>
    <div class="col-md-12">
      <?php print render($form['company_container']['contact_address']); ?>
    </div>

  </div>
  <div class="col-md-6 container-plan-specs">
    <h2 class="heading-plan-sepcs"><?php print t('Plan Specification'); ?></h2>

    <div class="col-md-6">
      <?php print render($form['plan_specs']['plan_fringe_rates']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['plan_specs']['plan_proposed_date']); ?>
    </div>
    <div class="col-md-12">
      <?php print render($form['plan_specs']['plan_other_location']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['plan_specs']['plan_num_employees']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['plan_specs']['plan_num_dependents']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['plan_specs']['plan_nature_business']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['plan_specs']['plan_years_business']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['plan_specs']['plan_tax_id']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['plan_specs']['plan_renewal_date']); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 container-benefits">
    <h2 class="heading-benefits"><?php print t('Benefits Interested In'); ?></h2>

    <div class="row">
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['mm']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['tm']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['ladd']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['d']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['lm']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['mec']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['std']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['v']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['r']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($form['benefits']['benefits_in']['0']); ?>
      </div>
      <div class="col-md-6">
        <?php print render($form['benefits']['benefits_in_others']); ?>
      </div>
    </div>
    <?php //@todo add dynamic script when specialty Benefits is click/active auto check text?>
<script type="text/javascript">
jQuery(document).ready(function($) {
var dates = $('.plan-specs-date-picker');

var benefits = $('#edit-benefits-in-0');
var benefitsOthers = $('#edit-benefits-in-others');

benefits.click(function(e){
if($(this).is(':checked')){
  benefitsOthers.focus();
}
else{
  benefitsOthers.val('');
}
})
benefitsOthers.focus(function(e){
  benefits.prop('checked', true);
})  
});
</script>
  </div>
</div>

<?php print render($form['submit_container']); ?>

<div class="hidden-container">
  <?php print drupal_render_children($form); ?>
</div>

