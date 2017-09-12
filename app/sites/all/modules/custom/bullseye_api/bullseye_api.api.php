<?php
/**
 * Bullseye API file.
 */

class Bullseye {
  /**
   * Initialize properties for the class.
   *
   * @param object $user
   *   An object containing the data of the current logged in user.
   */
  function __construct($user) {
    if ($user) {
      $this->user = $user;
      $this->uid = $user->uid;
    }
  }

  /**
   * Return the user id.
   */
  function getUserId() {
    return $this->uid;
  }

  /**
   * Access account info.
   */
  function userData() {
    return $this->user;
  }

  /**
   * Get first name.
   */
  function getAccountFirstName() {
    return $this->userData()->name;
  }

  /**
   * Get last name.
   */
  function getAccountLastName() {
    return $this->userData()->name;
  }

  /**
   * Get email.
   */
  function getAccountEmail() {
    return $this->userData()->mail;
  }

  /**
   * Get role.
   */
  function getAccountRole() {
    return $this->userData()->role;
  }

  /**
   * Get the state tid by name.
   *
   * @param string $state
   *   The state name.
   */
  function getTermId($voc, $term) {
    $tid = db_select('taxonomy_term_data', 'td');
    $tid->join('taxonomy_vocabulary', 'tv', 'td.vid = tv.vid');
    $tid = $tid->fields('td',array('tid'))
     ->condition('tv.machine_name', $voc, '=')
     ->condition('td.name', $term, '=')
     ->execute()
     ->fetchField();

    return $tid;
  }

  /**
   * Check if the account already exist.
   *
   * @param string $email
   *   The email address of the account.
   */
  function accountExist($email) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_email', 'email', 'email.entity_id = n.nid');
    $email = $query
      ->fields('email', array('field_email_value'))
      ->condition('email.field_email_value', $email, '=')
      ->execute()
      ->fetchField();

    return $email;
  }

  /**
   * Check if the producer account already exist.
   *
   * @param string $email
   *   The email address of the account.
   */
  function producerExist($email) {
    return user_load_by_mail($email);
  }

  /**
   * Get all the producers account.
   */
  function getProducers() {
    if ($cache = cache_get('producers_listing')) {
      $producers = $cache->data;
    }
    else {
      $query = db_select('users' , 'u');
      $query->join('users_roles', 'ur', 'u.uid = ur.uid');
      $query->join('role', 'r', 'r.rid = ur.rid');
      $query->join('profile', 'p', 'p.uid = u.uid');
      $query->join('field_data_field_producer_name', 'producer', 'producer.entity_id = p.pid');
      $query->join('field_data_field_primary_contact', 'contact', 'contact.entity_id = p.pid');
      $producers = $query
        ->fields('u', array('mail'))
        ->fields('producer', array('field_producer_name_value'))
        ->fields('contact', array('field_primary_contact_value'))
        ->condition('r.name', 'producer', '=')
        ->condition('u.status', 1, '=')
        ->execute()
        ->fetchAll();

      cache_set('producers_listing', $producers, 'cache');
    }

    return $producers;
  }

  /**
   * Calculate win ratio.
   *
   * @param string $producer
   *   The producer name.
   */
  function winRatio($producer) {
    $ratio = 4;
    return $ratio;
  }

  /**
   * Get producer primary contact.
   *
   * @param string $producer
   *   The producer name.
   */
  function producerContactName($producer) {
    return $contact;
  }

  /**
   * Get producer primary contact email.
   *
   * @param string $producer
   *   The producer name.
   */
  function producerEmailAddress($producer) {
    return $email;
  }

  /**
   * Total number of producer leads assigned.
   *
   * @param string $producer
   *   The producer name.
   */
  function producerLeadsAssigned($producer) {
    return $leads_assigned;
  }

  /**
   * Total number of producer opportunities covered.
   *
   * @param string $producer
   *   The producer name.
   */
  function producerOpportunitiesCovered($producer) {
    return $opportunities_covered;
  }

  /**
   * Total number of producer deals closed.
   *
   * @param string $producer
   *   The producer name.
   */
  function producerDealsClosed($producer) {
    return $deals_closed;
  }

  /**
   * Check if Carrier already exist.
   *
   * @param string $name
   *   Carrier name.
   */
  function carrierExist($name) {
    $query = db_select('node', 'n');
    $carrier = $query
      ->fields('n', array('title'))
      ->condition('n.title', $name, '=')
      ->condition('n.type', 'carrier', '=')
      ->execute()
      ->fetchField();

    return $carrier;
  }

  /**
   * Get company name by url_alias.
   *
   * @param string $alias
   *   the alias name of node.
   */
  function getCompanyNameByAlias($alias) {

    $query = db_select('url_alias', 'ua');
    $nid = $query
      ->fields('ua', array('source'))
      ->condition('ua.alias', $alias, '=')
      ->execute()
      ->fetchField();

    $nid = str_replace('node/', '', $nid);

    $query = db_select('field_data_field_company', 'c');
    $company_name = $query
      ->fields('c', array('field_company_value'))
      ->condition('c.entity_id', $nid, '=')
      ->execute()
      ->fetchField();

    return $company_name;
  }

  /**
   * Get all the carriers.
   */
  function getCarriers() {
    if ($cache = cache_get('carriers_listing')) {
      $carriers = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->join('field_data_field_primary_contact', 'contact', 'n.nid = contact.entity_id');
      $query->join('field_data_field_email', 'email', 'n.nid = email.entity_id');
      $query->join('field_data_field_benefits', 'benefits', 'n.nid = benefits.entity_id');
      $query->join('field_data_field_due_date', 'date', 'n.nid = date.entity_id');
      $query->join('field_data_field_priority', 'priority', 'n.nid = priority.entity_id');
      $carriers = $query
        ->distinct()
        ->fields('n', array('nid', 'title'))
        ->fields('contact', array('field_primary_contact_value'))
        ->fields('email', array('field_email_value'))
        ->fields('benefits', array('field_benefits_value'))
        ->fields('date', array('field_due_date_value'))
        ->fields('priority', array('field_priority_value'))
        ->condition('n.type', 'carrier', '=')
        ->condition('n.status', 1, '=')
        ->execute()
        ->fetchAll();

      cache_set('carriers_listing', $carriers, 'cache');
    }

    // We need to restructure the data to avoid duplicate items.
    $structured_carrier = array_map(function($item) {
      $data = array();

      return array(
        'nid' => $item->nid,
        'carrier_name' => $item->title,
        'contact_name' => $item->field_primary_contact_value,
        'contact_email' => $item->field_email_value,
        'benefits' => array(),
        'due_date' => $item->field_due_date_value,
        'priority' => $item->field_priority_value,
      );

    }, $carriers);

    // Filter the duplicate items.
    $new_items = $this->getUnique($structured_carrier);

    foreach($new_items as $key => $value) {
      $raw = array_values(array_filter($carriers, function($item) use ($value){
        return $item->nid == $value['nid'];
      }));

      $value['benefits'] = array_map(function($item) {
        return $item->field_benefits_value;
      }, $raw);
      $new_items[$key] = $value;
    }

    return $new_items;
  }

  /**
   * Count all the carriers.
   */
  function countCarriers() {
    return db_query("SELECT COUNT(nid) AS 'total' FROM {node} WHERE type = :type", array(':type' => 'carrier'))->fetchObject();
  }

  /**
   * Get all the accounts.
   */
  function getAllAccounts() {
    if ($cache = cache_get('accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_firstname', 'fname', 'n.nid = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'n.nid = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'n.nid = lname.entity_id');
      $query->leftJoin('field_data_field_prefix', 'pfix', 'n.nid = pfix.entity_id');
      $query->leftJoin('field_data_field_title', 'title', 'n.nid = title.entity_id');
      $query->leftJoin('field_data_field_company', 'comp', 'n.nid = comp.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'n.nid = mail.entity_id');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'astatus', 'n.nid = astatus.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->fields('astatus', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('comp', array('field_company_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('title', array('field_title_value'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->execute()
        ->fetchAll();

      cache_set('accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Count all accounts.
   */
  function countAllAccnt() {
    if ($cache = cache_get('count_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $accounts = $query
        ->fields('n', array('nid'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->countQuery()
        ->execute()
        ->fetchField();

      cache_set('count_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Get all leads account.
   */
  function getLeadsAccounts() {
    if ($cache = cache_get('leads_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_firstname', 'fname', 'n.nid = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'n.nid = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'n.nid = lname.entity_id');
      $query->leftJoin('field_data_field_prefix', 'pfix', 'n.nid = pfix.entity_id');
      $query->leftJoin('field_data_field_title', 'title', 'n.nid = title.entity_id');
      $query->leftJoin('field_data_field_company', 'comp', 'n.nid = comp.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'n.nid = mail.entity_id');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->fields('type', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('comp', array('field_company_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('title', array('field_title_value'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'lead', '=')
        ->execute()
        ->fetchAll();

      cache_set('leads_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Count all leads account.
   */
  function countLeadsAccnt() {
    if ($cache = cache_get('count_leads_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'lead', '=')
        ->countQuery()
        ->execute()
        ->fetchField();

      cache_set('count_leads_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Get all prospects account.
   */
  function getProspectsAccounts() {
    if ($cache = cache_get('prospect_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_firstname', 'fname', 'n.nid = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'n.nid = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'n.nid = lname.entity_id');
      $query->leftJoin('field_data_field_prefix', 'pfix', 'n.nid = pfix.entity_id');
      $query->leftJoin('field_data_field_title', 'title', 'n.nid = title.entity_id');
      $query->leftJoin('field_data_field_company', 'comp', 'n.nid = comp.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'n.nid = mail.entity_id');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->fields('type', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('comp', array('field_company_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('title', array('field_title_value'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'prospect', '=')
        ->execute()
        ->fetchAll();

      cache_set('prospect_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Count all prospects account.
   */
  function countProspectsAccnt() {
    if ($cache = cache_get('count_prospect_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'prospect', '=')
        ->countQuery()
        ->execute()
        ->fetchField();

      cache_set('count_prospect_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Get all opportunity account.
   */
  function getOpportunityAccounts() {
    if ($cache = cache_get('opportunity_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_firstname', 'fname', 'n.nid = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'n.nid = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'n.nid = lname.entity_id');
      $query->leftJoin('field_data_field_prefix', 'pfix', 'n.nid = pfix.entity_id');
      $query->leftJoin('field_data_field_title', 'title', 'n.nid = title.entity_id');
      $query->leftJoin('field_data_field_company', 'comp', 'n.nid = comp.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'n.nid = mail.entity_id');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->fields('type', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('comp', array('field_company_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('title', array('field_title_value'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'opportunity', '=')
        ->execute()
        ->fetchAll();

      cache_set('opportunity_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Count all opportunity account.
   */
  function countOpportunityAccnt() {
    if ($cache = cache_get('count_opportunity_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'opportunity', '=')
        ->countQuery()
        ->execute()
        ->fetchField();

      cache_set('count_opportunity_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Get all deals account.
   */
  function getDealsAccounts() {
    if ($cache = cache_get('deal_in_progress_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_firstname', 'fname', 'n.nid = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'n.nid = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'n.nid = lname.entity_id');
      $query->leftJoin('field_data_field_prefix', 'pfix', 'n.nid = pfix.entity_id');
      $query->leftJoin('field_data_field_title', 'title', 'n.nid = title.entity_id');
      $query->leftJoin('field_data_field_company', 'comp', 'n.nid = comp.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'n.nid = mail.entity_id');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->fields('type', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('comp', array('field_company_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('title', array('field_title_value'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'deal_in_progress', '=')
        ->execute()
        ->fetchAll();

      cache_set('deal_in_progress_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Count all deals account.
   */
  function countDealsAccnt() {
    if ($cache = cache_get('count_deals_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'deal_in_progress', '=')
        ->countQuery()
        ->execute()
        ->fetchField();

      cache_set('count_deals_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Get all closed deals account.
   */
  function getClosedDeals() {
    if ($cache = cache_get('closed_deals_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_firstname', 'fname', 'n.nid = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'n.nid = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'n.nid = lname.entity_id');
      $query->leftJoin('field_data_field_prefix', 'pfix', 'n.nid = pfix.entity_id');
      $query->leftJoin('field_data_field_title', 'title', 'n.nid = title.entity_id');
      $query->leftJoin('field_data_field_company', 'comp', 'n.nid = comp.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'n.nid = mail.entity_id');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->fields('type', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('comp', array('field_company_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('title', array('field_title_value'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'closed_deal', '=')
        ->execute()
        ->fetchAll();

      cache_set('closed_deals_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Count all closed deals account.
   */
  function countClosedDeals() {
    if ($cache = cache_get('count_closed_deals_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $accounts = $query
        ->fields('n', array('nid'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->condition('type.field_account_status_value', 'closed_deal', '=')
        ->countQuery()
        ->execute()
        ->fetchField();

      cache_set('count_closed_deals_accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }

  /**
   * Get RFPs.
   */
  function getRfps() {
    if ($cache = cache_get('rfp_listing')) {
      $rfps = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_company', 'cmp', 'n.nid = cmp.entity_id');
      $query->leftJoin('field_data_field_mm_current_carrier', 'mmcc', 'n.nid = mmcc.entity_id');
      $query->leftJoin('field_data_field_lm_current_carrier', 'lmcc', 'n.nid = lmcc.entity_id');
      $query->leftJoin('field_data_field_tl_current_carrier', 'tlcc', 'n.nid = tlcc.entity_id');
      $query->leftJoin('field_data_field_mec_current_carrier', 'mccc', 'n.nid = mccc.entity_id');
      $query->leftJoin('field_data_field_den_current_carrier', 'dncc', 'n.nid = dncc.entity_id');
      $query->leftJoin('field_data_field_vs_current_carrier', 'vscc', 'n.nid = vscc.entity_id');
      $query->leftJoin('field_data_field_lf_current_carrier', 'lfcc', 'n.nid = lfcc.entity_id');
      $query->leftJoin('field_data_field_std_current_carrier', 'sdcc', 'n.nid = sdcc.entity_id');
      $query->leftJoin('field_data_field_ret_current_carrier', 'rtcc', 'n.nid = rtcc.entity_id');
      $query->leftJoin('field_data_field_sb_current_carrier', 'sbcc', 'n.nid = sbcc.entity_id');
      $rfps = $query
        ->fields('n', array('nid', 'title'))
        ->fields('cmp', array('field_company_value'))
        ->fields('mmcc', array('field_mm_current_carrier_value'))
        ->fields('lmcc', array('field_lm_current_carrier_value'))
        ->fields('tlcc', array('field_tl_current_carrier_value'))
        ->fields('mccc', array('field_mec_current_carrier_value'))
        ->fields('dncc', array('field_den_current_carrier_value'))
        ->fields('vscc', array('field_vs_current_carrier_value'))
        ->fields('lfcc', array('field_lf_current_carrier_value'))
        ->fields('sdcc', array('field_std_current_carrier_value'))
        ->fields('rtcc', array('field_ret_current_carrier_value'))
        ->fields('sbcc', array('field_sb_current_carrier_value'))
        ->condition('n.type', 'rfp', '=')
        ->condition('n.status', 1, '=')
        ->execute()
        ->fetchAll();

      cache_set('rfp_listing', $rfps, 'cache');
    }

    return $rfps;
  }

  /**
   * Implement getUnique value.
   *
   * This function will filter the duplicate result in an array.
   */
  function getUnique($array, $preserveKeys = false) {
    // Unique Array for return
    $arrayRewrite = array();
    // Array with the md5 hashes
    $arrayHashes = array();
    foreach($array as $key => $item) {
      // Serialize the current element and create a md5 hash
      $hash = md5(serialize($item));
      // If the md5 didn't come up yet, add the element to
      // to arrayRewrite, otherwise drop it
      if (!isset($arrayHashes[$hash])) {
        // Save the current element hash
        $arrayHashes[$hash] = $hash;
        // Add element to the unique Array
        if ($preserveKeys) {
          $arrayRewrite[$key] = $item;
        }
        else {
          $arrayRewrite[] = $item;
        }
      }
    }
    return $arrayRewrite;
  }

  /**
   * Generate random strings.
   *
   * @param int $length
   *   The length of the generated string.
   *
   * @return string $rand_string
   *   The generated random string.
   */
  function randChars($length = 4) {
    $chars = (string) time();
    $chars_length = strlen($chars);
    $rand_string = '';
    for ($i = 0; $i < $length; $i++) {
      $rand_string .= $chars[rand(0, $chars_length - 1)];
    }
    return $rand_string;
  }

  /**
   * Email RFP.
   */
  function emailRfp($from, $to, $subject, $body, $attachments) {
    $email = new AttachmentEmail($to, $from, $subject, $body, $attachments);
    $email->send();
  }

  /**
   * Determine if benefits in RFP is active.
   *
   * Classes for RFP account by row on listing page.
   */
  function isActive($param) {
    if (!is_null($param)) {
      print "dot-priority green";
    }
    else {
      print "dot-priority gray";
    }
  }

  /**
   * Build account name.
   */
  function buildAccountName($fname, $mname, $lname) {
    if ($mname) {
      print ucfirst($fname) . ' ' . ucfirst($mname) . '. ' . ucfirst($lname);
    }
    else {
      print ucfirst($fname) . ' ' . ucfirst($lname);
    }
  }

  /**
   * Total revenue.
   */
  function revenue() {
    return $revenue;
  }

  /**
   * Average deal size won.
   */
  function averageDealsSizeWon() {
    return;
  }

  /**
   * Sales cycle time.
   */
  function salesCycleTime() {
    return;
  }

  /**
   * Top performers.
   */
  function topPerformers() {
    return;
  }

  /**
   * Total producers.
   */
  function totalProducers() {
    if ($cache = cache_get('total_producers')) {
      $total = $cache->data;
    }
    else {
      $query = db_select('users' , 'u');
      $query->join('users_roles', 'ur', 'u.uid = ur.uid');
      $query->join('role', 'r', 'r.rid = ur.rid');
      $total = $query
        ->fields('u', array('mail'))
        ->condition('r.name', 'producer', '=')
        ->condition('u.status', 1, '=')
        ->countQuery()
        ->execute()
        ->fetchField();

      cache_set('total_producers', $total, 'cache');
    }

    return $total;
  }

  /**
   * Get total number of deals closed by the producer.
   */
  function dealsClosed($producer) {
    $total = 1;
    return $total;
  }

  /**
   * Get the total number of opportunities covered by the producer.
   */
  function opportunitiesCovered($producer) {
    $total = 2;
    return $total;
  }

  /**
   * Get the total number of leads assigned to a producer.
   */
  function leadsAssigned($producer) {
    $total = 3;
    return $total;
  }

  /**
   * Total number of proposals.
   */
  function countProposals() {
    $total = 0;

    return $total;
  }

  /**
   * Sent proposals.
   */
  function proposalSent() {
    $proposals = array();

    return $proposals;
  }

  /**
   * Add producer.
   *
   * @param array $data
   */
  function addProducer($data) {
    $type = arg(2);
    // Run if the user doesn't exist.
    if (!$this->producerExist($data['producer_email'])) {
      $lang = LANGUAGE_NONE;

      // Producer.
      $fname = (!empty($data['producer_fname'])) ? $data['producer_fname'] : '';
      $lname = (!empty($data['producer_lname'])) ? $data['producer_lname'] : '';

      switch ($type) {
        case 'company':
          $new_user = array(
            'name' => $data['producer_email'],
            'mail' => $data['producer_email'],
            'pass' => 'ch@ng3m3',
            'status' => 0,
            'access' => REQUEST_TIME,
            'roles' => array(
              DRUPAL_AUTHENTICATED_RID => 'authenticated user',
              4 => 'producer',
            ),
          );

          // Save the user.
          $user = user_save(NULL, $new_user);

          // Create the profile data.
          $profile = profile2_create(array('type' => 'producer', 'uid' => $user->uid));

          // Producer name.
          $profile->field_producer_name[$lang][0]['value'] = $data['producer_company'];

          // Primary Contact.
          $profile->field_first_name[$lang][0]['value'] = ucfirst($fname);
          $profile->field_last_name[$lang][0]['value'] = ucfirst($lname);
          $profile->field_primary_contact[$lang][0]['value'] = ucfirst($fname) . ' ' . ucfirst($lname);

          // Producer type.
          $profile->field_producer_type[$lang][0]['value'] = 'company';

          // Phone number.
          $profile->field_phone_number[$lang][0]['value'] = $data['producer_phone'];

          // Producer website.
          $profile->field_producer_website[$lang][0]['value'] = $data['producer_website'];

          // Files.
          if ($data['file_health_life'] != 0) {
            $hl_file = file_load($data['file_health_life']);
            $hl_file->display = 1;
            $hl_file = file_copy($hl_file, 'public://');
            $profile->field_health_and_life[$lang][0] = (array) $hl_file;
          }
          if ($data['file_error_omission_insurance'] != 0) {
            $feoi_file = file_load($data['file_error_omission_insurance']);
            $feoi_file->display = 1;
            $feoi_file = file_copy($feoi_file, 'public://');
            $profile->field_health_and_life[$lang][0] = (array) $feoi_file;
          }

          // Save the profile2 to the user account.
          profile2_save($profile);

          $message = t('Your account was created successfully and is pending for admin approval.');
          drupal_set_message($message, 'message');
          break;

        case 'individual':
          $new_user = array(
            'name' => $data['producer_email'],
            'mail' => $data['producer_email'],
            'pass' => 'ch@ng3m3',
            'status' => 0,
            'access' => REQUEST_TIME,
            'roles' => array(
              DRUPAL_AUTHENTICATED_RID => 'authenticated user',
              4 => 'producer',
            ),
          );

          // Save the user.
          $user = user_save(NULL, $new_user);

          // Create the profile data.
          $profile = profile2_create(array('type' => 'producer', 'uid' => $user->uid));

          // Producer name.
          $profile->field_producer_name[$lang][0]['value'] = ucfirst($fname) . ' ' . ucfirst($lname);

          // Primary Contact.
          $profile->field_first_name[$lang][0]['value'] = ucfirst($fname);
          $profile->field_last_name[$lang][0]['value'] = ucfirst($lname);
          $profile->field_primary_contact[$lang][0]['value'] = ucfirst($fname) . ' ' . ucfirst($lname);

          // Producer type.
          $profile->field_producer_type[$lang][0]['value'] = 'individual';

          // Phone number.
          $profile->field_phone_number[$lang][0]['value'] = $data['producer_phone'];

          // Files.
          if ($data['file_health_life'] != 0) {
            $hl_file = file_load($data['file_health_life']);
            $hl_file->display = 1;
            $hl_file = file_copy($hl_file, 'public://');
            $profile->field_health_and_life[$lang][0] = (array) $hl_file;
          }
          if ($data['file_error_omission_insurance'] != 0) {
            $feoi_file = file_load($data['file_error_omission_insurance']);
            $feoi_file->display = 1;
            $feoi_file = file_copy($feoi_file, 'public://');
            $profile->field_health_and_life[$lang][0] = (array) $feoi_file;
          }

          // Save the profile2 to the user account.
          profile2_save($profile);

          $message = t('Your account was created successfully and is pending for admin approval.');
          drupal_set_message($message, 'message');
          break;
      }
    }
    else {
      $message = t('The email you are trying to use is already taken.');
      drupal_set_message($message, 'error');
    }
  }

  /**
   * Create new plan specs.
   *
   * @param array $data
   *   The data from plan specs form.
   */
  function createPlanSpecs($data) {
    global $user;

    // Map the data to plan specs storage entity.
    $node = new stdClass();

    $node->title = $data['contact_company'];

    $node->type = "plan-specs";
    node_object_prepare($node);
    $node->language = LANGUAGE_NONE;
    $node->uid = $user->uid;
    $node->status = 1;
    $node->promote = 0;
    $node->comment = 0;

    // Cons vars.
    $lang = $node->language;
    $val = 'value';

    /***************
     * Company Info
     ***************/
    $node->field_primary_contact[$lang][0][$val] = $data['contact'];
    $node->field_title[$lang][0][$val] = $data['contact_title'];
    $node->field_contact_number[$lang][0][$val] = $data['contact_number'];
    $node->field_industry[$lang][0][$val] = $data['contact_industry'];
    $node->field_complete_address[$lang][0][$val] = $data['contact_address'];

    /***************
     * Plan Specs
     ***************/
    $node->field_fringe_rate[$lang][0][$val] = $data['plan_fringe_rates'];
    $node->field_proposed_effective_date[$lang][0][$val] = $data['plan_proposed_date'];
    $node->field_other_work_locations[$lang][0][$val] = $data['plan_other_location'];
    $node->field_number_of_employees[$lang][0][$val] = $data['plan_num_employees'];
    $node->field_number_of_dependents[$lang][0][$val] = $data['plan_num_dependents'];
    $node->field_nature_of_business_sic[$lang][0][$val] = $data['plan_nature_business'];
    $node->field_years_in_business[$lang][0][$val] = $data['plan_years_business'];
    $node->field_tax_id[$lang][0][$val] = $data['plan_tax_id'];
    $node->field_renewal_date[$lang][0][$val] = $data['plan_renewal_date'];

    /***************
     * Benefits Interested In
     ***************/
    if ($data['mm'] != 0) {
      $node->field_benefits[$lang][][$val] = 'major_medical';
    }
    if ($data['lm'] != 0) {
      $node->field_benefits[$lang][][$val] = 'limited_medical';
    }
    if ($data['tm'] != 0) {
      $node->field_benefits[$lang][][$val] = 'teledoc';
    }
    if ($data['mec'] != 0) {
      $node->field_benefits[$lang][][$val] = 'mec';
    }
    if ($data['d'] != 0) {
      $node->field_benefits[$lang][][$val] = 'dental';
    }
    if ($data['v'] != 0) {
      $node->field_benefits[$lang][][$val] = 'vision';
    }
    if ($data['ladd'] != 0) {
      $node->field_benefits[$lang][][$val] = 'life';
    }
    if ($data['std'] != 0) {
      $node->field_benefits[$lang][][$val] = 'short_term_disability';
    }
    if ($data['0'] != 0) {
      $node->field_benefits[$lang][][$val] = 'special_benefits';
    }
    if ($data['r'] != 0) {
      $node->field_benefits[$lang][][$val] = 'retirement';
    }

    // Other benefit
    $node->field_others[$lang][0]['value'] = $data['benefits_in_others'];

    // Save the carrier in the storage.
    $node = node_submit($node);
    node_save($node);

    // Notify the user that the registration is successfull.
    drupal_set_message(t('Plan specification successfully created.'), 'message');

    // Redirect the user to homepage.
    drupal_goto('/');
  }

  /**
   * Get node id from path alias.
   */
  function getNidFromPath($alias) {

    if ($cache = cache_get('nid_from_' . $alias)) {
      $nid = $cache->data;
    }
    else {
      $alias_path  = 'content/' . $alias;
      $path = drupal_lookup_path('source', $alias_path);
      $node = menu_get_object('node', 1, $path);
      $nid = $node->nid;
      cache_set('nid_from_' . $alias, $nid, 'cache');
    }

    return $nid;
  }

  /**
   * Get all contacts from an account.
   */
  function getAccountPeople($nid) {

    if ($cache = cache_get('contacts_' . $nid)) {
      $contacts = $cache->data;
    }
    else {
      $query = db_select('field_data_field_contacts', 'con');
      $query->leftJoin('field_data_field_contact_name', 'name', 'con.field_contacts_value = name.entity_id');
      $query->leftJoin('field_data_field_position', 'pos', 'con.field_contacts_value = pos.entity_id');
      $query->leftJoin('field_data_field_phone_number', 'phone', 'con.field_contacts_value = phone.entity_id');
      $query->leftJoin('field_data_field_email', 'email', 'con.field_contacts_value = email.entity_id');
      $contacts = $query
        ->fields('name', array('field_contact_name_value'))
        ->fields('pos', array('field_position_value'))
        ->fields('phone', array('field_phone_number_value'))
        ->fields('email', array('field_email_value'))
        ->condition('con.entity_id', $nid, '=')
        ->execute()
        ->fetchAll();

      cache_set('contacts_' . $nid, $contacts, 'cache');
    }

    return $contacts;
  }

  /**
   * Create proposal.
   */
  function createProposal($data) {
    //
  }

  /**
   * Send proposal.
   */
  function sendProposal($data) {
    //
  }
}
