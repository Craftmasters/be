<?php print render($form['form_title']); ?>

<div class="row">
  <h4 class="producer-title"><?php print t('Individual Account'); ?></h4>

  <div>
    <label>Name</label>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?php print render($form['producer_fname']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['producer_lname']); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?php print render($form['producer_email']); ?>
    </div>
    <div class="col-md-6">
      <?php print render($form['producer_phone']); ?>
    </div>
  </div>
</div>
<?php // @todo add if is company page add company fields ?>

<?php /* temporary static checkbox placeholder */ ?>
<div>
  <?php print render($form['read_sca_dba']); ?>
</div>
<div>
  <?php print render($form['agree_terms_privacy']); ?>
</div>

<?php print render($form['submit_container']); ?>

<div class="hidden-container">
  <?php print drupal_render_children($form); ?>
</div>
