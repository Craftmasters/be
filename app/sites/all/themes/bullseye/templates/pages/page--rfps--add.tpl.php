<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>

<div class="container">
  <div class="bullseye-wrapper row">
    <div class="col-md-2 left-sidebar">
      <?php if ($logo): ?>
        <div class="logo-container">
          <a class="logo navbar-btn" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        </div>
      <?php endif; ?>
      <div class="sidebar-menu-container">
        <?php print render($page['left_sidebar']); ?>
      </div>
      <div class="left-sidebar-footer">
        <p><?php print t('Precision-built by'); ?></p>
        <img src="<?php print $archerjordan_logo; ?>">
      </div>
    </div>
    <div class="col-md-10 right-content">
      <div class="top-header">
        <?php print render($page['top_header']); ?>
      </div>
      <div class="bottom-header">
        <?php print render($page['bottom_header']); ?>
        <div class="be-custom-actions">
          <a href="#" class="green-btn rfp-next-summary"><?php print t('Next: Summary'); ?></a>
          <a href="#" class="gray-btn create-rfp-back"><?php print t('Back'); ?></a>
          <a href="#" class="orange-btn save-exit"><?php print t('Save and Exit'); ?></a>
        </div>
      </div>
      <div class="content-region">
        <?php print $messages; ?>
        <div class="row column-wrapper no-defined-columns">
          <div class="col-md-12">
            <?php print render($page['column_one']); ?>
            <?php print render($page['column_two']); ?>
            <?php print render($page['column_three']); ?>
            <?php print render($page['column_four']); ?>
            <?php print render($page['column_content']); ?>
            <?php print render($page['content']); ?>
          </div>
        </div>          
      </div>
      <div class="footer-wrapper">
        <?php print render($page['footer']); ?>
      </div>
    </div>
  </div>
</div>

<div class="suggestion-box-container">
    <a href="#" data-toggle="modal" data-target="#suggestion-box"><img src="<?php print $suggestion_box_img; ?>"></a>
  </div>

  <div id="suggestion-box" class="modal be-bs-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-inner">
          <div class="modal-header">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
          </div>
          <div class="modal-body">
            <div class="modal-body-wrap">
              <div class="modal-body-inner be-forms suggestion-form">
                <div class="form-title"><h2><?php print t('Suggestions'); ?></h2></div>
                <div class="be-form-single">
                  <label><?php print t('Subject'); ?></label>
                  <input type="text" class="form-control" id="suggestion-subject">
                </div>
                <div class="be-form-single">
                  <label><?php print t('Name'); ?></label>
                  <input type="text" class="form-control" id="suggestion-name">
                </div>
                <div class="be-form-single">
                  <label><?php print t('Details'); ?></label>
                  <textarea rows="4" class="form-control" id="suggestion-details"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="be-custom-actions">
              <button type="button" class="gray-btn" data-dismiss="modal"><?php print t('Cancel'); ?></button>
              <button id="btn-submit-suggestion" type="button" class="green-btn" data-dismiss="modal"><?php print t('Send'); ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="suggestion-box-success" class="modal be-bs-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-inner">
          <div class="modal-header">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
          </div>
          <div class="modal-body">
            <div class="modal-body-wrap">
              <div class="modal-body-inner">
                <h3><?php print t('Your message has been sent.'); ?></h3>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="be-custom-actions">
              <button type="button" class="gray-btn" data-dismiss="modal"><?php print t('Exit'); ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
