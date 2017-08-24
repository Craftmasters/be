<div class="row">
  <div class="col-md-4">
    <div class="be-regular-block group-information">
      <h2 class="be-regular-h2"><?php print t('Group Information'); ?></h2>
      <a href="#" class="edit-link edit-account-details"><img src="<?php print $edit_icon; ?>"></a>
      <div class="be-block-main">

        <div class="be-view-field">
          <div class="be-view-label"><?php print t('Company Name'); ?></div>
          <div class="be-view-value font-bold"><?php print $company; ?></div>
        </div>

        <div class="be-view-field">
          <div class="be-view-label"><?php print t('Primary Email Address'); ?></div>
          <div class="be-view-value">
            <a href="mailto:<?php print $email; ?>" class="orange-font"><?php print $email; ?></a>
          </div>
        </div>

        <div class="be-view-field">
          <div class="be-view-label"><?php print t('Phone Number'); ?></div>
          <div class="be-view-value"><a href="<?php print $phone; ?>"><?php print $phone; ?></a></div>
        </div>

        <div class="be-view-field">
          <div class="be-view-label"><?php print t('Website'); ?></div>
          <div class="be-view-value">
            <a href="#" class="orange-font"><?php print $website; ?></a>
            </div>
        </div>

        <div class="be-view-field">
          <div class="be-view-label"><?php print t('Company Street Address'); ?></div>
          <div class="be-view-value"><?php print $street; ?></div>
        </div>

        <div class="be-view-field-row row">

          <div class="col-xs-4">
            <div class="be-view-field">
              <div class="be-view-label"><?php print t('City'); ?></div>
              <div class="be-view-value"><?php print $city; ?></div>
            </div>
          </div>

          <div class="col-xs-4">
            <div class="be-view-field">
              <div class="be-view-label"><?php print t('State'); ?></div>
              <div class="be-view-value"><?php print $state; ?></div>
            </div>
          </div>

          <div class="col-xs-4">
            <div class="be-view-field">
              <div class="be-view-label"><?php print t('Zip Code'); ?></div>
              <div class="be-view-value"><?php print $code; ?></div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="be-regular-block plan-specification">
      <h2 class="be-regular-h2"><?php print t('Plan Specifications'); ?></h2>
      <a href="#" class="edit-link edit-account-details"><img src="<?php print $edit_icon; ?>"></a>
      <div class="be-block-main plan-specification-inner">
        <div class="be-form-section">
          <div class="row">
            <div class="col-xs-6"><?php print render($form['fringe_rates']); ?></div>
            <div class="col-xs-6"><?php print render($form['proposed_effective_date']); ?></div>
          </div>
        </div>
        <div class="be-form-single"><?php print render($form['other_work_locations']); ?></div>
        <div class="be-form-section">
          <div class="row">
            <div class="col-xs-6"><?php print render($form['number_of_employees']); ?></div>
            <div class="col-xs-6"><?php print render($form['number_of_dependents']); ?></div>
          </div>
        </div>
        <div class="be-form-section">
          <div class="row">
            <div class="col-xs-6"><?php print render($form['nature_of_business']); ?></div>
            <div class="col-xs-6"><?php print render($form['years_in_business']); ?></div>
          </div>
        </div>
        <div class="be-form-section">
          <div class="row">
            <div class="col-xs-6"><?php print render($form['tax_id']); ?></div>
            <div class="col-xs-6"><?php print render($form['renewal_date']); ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="be-regular-block benefits">
      <h2 class="be-regular-h2"><?php print t('Benefits'); ?></h2>
      <a href="#" class="edit-link edit-account-details"><img src="<?php print $edit_icon; ?>"></a>
      <div class="be-block-main">
        <div class="accordion-benefits-wrapper">
          <div class="accordion-benefits">

            <?php if (isset($_GET['benefits']['major_medical']) && $_GET['benefits']['major_medical'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">Major Medical</div>

                <div class="acc_content">
                  <div class="acc_head_copy">Major Medical</div>
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['major_medical_fields']['mm_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['major_medical_fields']['mm_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['major_medical_fields']['mm_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['major_medical_fields']['mm_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['major_medical_fields']['mm_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['major_medical_fields']['mm_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['major_medical_fields']['mm_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['major_medical_fields']['mm_waiting_period']); ?></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($_GET['benefits']['limited_medical']) && $_GET['benefits']['limited_medical'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">Limited Medical</div>

                <div class="acc_content">
                  <div class="acc_head_copy">Limited Medical</div>
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['limited_medical_fields']['lm_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['limited_medical_fields']['lm_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['limited_medical_fields']['lm_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['limited_medical_fields']['lm_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['limited_medical_fields']['lm_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['limited_medical_fields']['lm_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['limited_medical_fields']['lm_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['limited_medical_fields']['lm_waiting_period']); ?></div>

                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($_GET['benefits']['teledoc']) && $_GET['benefits']['teledoc'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">Telemedicine</div>

                <div class="acc_content">
                  <div class="acc_head_copy">Telemedicine</div>
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['telemedicine_fields']['tel_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['telemedicine_fields']['tel_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['telemedicine_fields']['tel_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['telemedicine_fields']['tel_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['telemedicine_fields']['tel_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['telemedicine_fields']['tel_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['telemedicine_fields']['tel_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['telemedicine_fields']['tel_waiting_period']); ?></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($_GET['benefits']['mec']) && $_GET['benefits']['mec'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">MEC</div>

                <div class="acc_content">
                  <div class="acc_head_copy">MEC</div>
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['mec_fields']['mec_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['mec_fields']['mec_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['mec_fields']['mec_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['mec_fields']['mec_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['mec_fields']['mec_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['mec_fields']['mec_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['mec_fields']['mec_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['mec_fields']['mec_waiting_period']); ?></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($_GET['benefits']['dental']) && $_GET['benefits']['dental'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">Dental</div>

                <div class="acc_content">
                  <div class="acc_head_copy">Dental</div>
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['dental_fields']['den_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['dental_fields']['den_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['dental_fields']['den_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['dental_fields']['den_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['dental_fields']['den_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['dental_fields']['den_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['dental_fields']['den_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['dental_fields']['den_waiting_period']); ?></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($_GET['benefits']['vision']) && $_GET['benefits']['vision'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">Vision</div>

                <div class="acc_content">
                  <div class="acc_head_copy">Vision</div>
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['vision_fields']['vs_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['vision_fields']['vs_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['vision_fields']['vs_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['vision_fields']['vs_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['vision_fields']['vs_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['vision_fields']['vs_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['vision_fields']['vs_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['vision_fields']['vs_waiting_period']); ?></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($_GET['benefits']['life']) && $_GET['benefits']['life'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">Life & AD&D</div>

                <div class="acc_content">
                  <div class="acc_head_copy">Life & AD&D</div>
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['life_fields']['lf_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['life_fields']['lf_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['life_fields']['lf_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['life_fields']['lf_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['life_fields']['lf_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['life_fields']['lf_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['life_fields']['lf_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['life_fields']['lf_waiting_period']); ?></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($_GET['benefits']['short_term_disability']) && $_GET['benefits']['short_term_disability'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">Short Term Disability</div>

                <div class="acc_content">
                  <div class="acc_head_copy">Short Term Disability</div>
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['short_term_disability_fields']['std_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['short_term_disability_fields']['std_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['short_term_disability_fields']['std_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['short_term_disability_fields']['std_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['short_term_disability_fields']['std_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['short_term_disability_fields']['std_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['short_term_disability_fields']['std_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['short_term_disability_fields']['std_waiting_period']); ?></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($_GET['benefits']['retirement']) && $_GET['benefits']['retirement'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">Retirement</div>

                <div class="acc_content">
                  <div class="acc_head_copy">Retirement</div>
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['retirement_fields']['ret_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['retirement_fields']['ret_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['retirement_fields']['ret_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['retirement_fields']['ret_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['retirement_fields']['ret_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['retirement_fields']['ret_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['retirement_fields']['ret_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['retirement_fields']['ret_waiting_period']); ?></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($_GET['benefits']['special_benefits']) && $_GET['benefits']['special_benefits'] == 1) : ?>
              <div class="accordion_in">

                <div class="acc_head">Special Benefits</div>

                <div class="acc_content">
                  <div class="be-form-section">
                    <div class="row">
                      <div class="col-xs-6 current-carrier"><?php print render($form['special_benefits_fields']['sb_current_carrier']); ?></div>
                      <div class="col-xs-6 years-with-current-carrier"><?php print render($form['special_benefits_fields']['sb_years_with_current_carrier']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-section">
                    <label><?php print t('Plan Year to Quote'); ?></label>
                    <div class="row">
                      <div class="col-xs-6 quote-start"><?php print render($form['special_benefits_fields']['sb_plan_year_to_quote_start']); ?></div>
                      <div class="col-xs-6 quote-end"><?php print render($form['special_benefits_fields']['sb_plan_year_to_quote_end']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single renewal-plan"><?php print render($form['special_benefits_fields']['sb_renewal_of_current_plan']); ?></div>

                  <div class="be-form-section">
                    <label><?php print t('Percentage of Employer Contribution'); ?></label>
                    <div class="row">
                      <div class="col-xs-6"><?php print render($form['special_benefits_fields']['sb_percentage_single']); ?></div>
                      <div class="col-xs-6"><?php print render($form['special_benefits_fields']['sb_percentage_family']); ?></div>
                    </div>
                  </div>

                  <div class="be-form-single waiting-period"><?php print render($form['special_benefits_fields']['sb_waiting_period']); ?></div>
                </div>
              </div>
            <?php endif; ?>
          </div>

          <div class="benefits-summary"></div>
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-4">
    <div class="be-regular-block attachments">
      <h2 class="be-regular-h2"><?php print t('Attachments'); ?></h2>
      <div class="be-block-main">
        <div class="attachment-main">
          <?php foreach ($form['attachments_container']['attachment'] as $key => $value) : ?>
            <?php if ($key[0] != '#') : ?>
              <div class="attachment-row">
                <?php print render($form['attachments_container']['attachment'][$key]); ?>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <div class="attachment-summary"></div>
      </div>
    </div>

    <div class="be-regular-block census">
      <h2 class="be-regular-h2"><?php print t('Census Must Include The Following:'); ?></h2>
      <div class="be-block-main">
        <?php foreach ($form['census_container']['census'] as $key => $value) : ?>
          <?php if ($key[0] != '#') : ?>
            <?php print render($form['census_container']['census'][$key]); ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<div class="hidden-container">
  <?php print drupal_render_children($form); ?>
</div>

