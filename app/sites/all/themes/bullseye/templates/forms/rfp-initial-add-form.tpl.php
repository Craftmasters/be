<?php print render($form['form_title']); ?>
<?php print render($form['account']); ?>

<label class="select-benefit-label"><?php print t('Select Benefits'); ?></label>
<div class="row">
  <?php foreach ($form['benefits_container']['benefits'] as $key => $value) : ?>
    <?php if ($key[0] != '#') : ?>
      <div class="col-xs-6">
        <?php print render($form['benefits_container']['benefits'][$key]); ?>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<?php print render($form['submit_container']); ?>

<div class="hidden-container">
  <?php print drupal_render_children($form); ?>
</div>

