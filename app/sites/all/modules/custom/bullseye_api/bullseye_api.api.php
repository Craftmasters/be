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
      $this->roles = $user->roles;
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
   *
   * @param int $uid
   *   The user id. Null by default.
   */
  function getAccountFirstName($uid = NULL) {
    if (is_null($uid)) {
      if ($this->hasRole('administrator', $this->roles) || $this->hasRole('admin', $this->roles)) {
        $profile = profile2_load_by_user($this->uid, 'admin');
      }
      elseif ($this->hasRole('producer', $this->roles)) {
        $profile = profile2_load_by_user($this->uid, 'producer');
      }
    }
    else {
      $user = user_load($uid);
      if ($this->hasRole('administrator', $user->roles) || $this->hasRole('admin', $user->roles)) {
        $profile = profile2_load_by_user($user->uid, 'admin');
      }
      elseif ($this->hasRole('producer', $user->roles)) {
        $profile = profile2_load_by_user($user->uid, 'producer');
      }
    }

    return $profile->field_first_name[LANGUAGE_NONE][0]['value'];
  }

  /**
   * Get last name.
   *
   * @param int $uid
   *   The user id. Null by default.
   */
  function getAccountLastName($uid = NULL) {
    if (is_null($uid)) {
      if ($this->hasRole('administrator', $this->roles) || $this->hasRole('admin', $this->roles)) {
        $profile = profile2_load_by_user($this->uid, 'admin');
      }
      elseif ($this->hasRole('producer', $this->roles)) {
        $profile = profile2_load_by_user($this->uid, 'producer');
      }
    }
    else {
      $user = user_load($uid);
      if ($this->hasRole('administrator', $user->roles) || $this->hasRole('admin', $user->roles)) {
        $profile = profile2_load_by_user($user->uid, 'admin');
      }
      elseif ($this->hasRole('producer', $user->roles)) {
        $profile = profile2_load_by_user($user->uid, 'producer');
      }
    }

    return $profile->field_last_name[LANGUAGE_NONE][0]['value'];
  }

  /**
   * Get email.
   */
  function getAccountEmail() {
    return $this->mail;
  }

  /**
   * Get role.
   */
  function getAccountRole() {
    return $this->userData()->role;
  }

  /**
   * Get account status by nid.
   */
  static function getAccountStatusByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_account_status', 'status', 'n.nid = status.entity_id');
    $account_status = $query
      ->fields('status', array('field_account_status_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $account_status;
  }

  /**
   * Get Company name by nid.
   */
  static function getCompanyNameByNid($nid) {
    $query = db_select('node', 'n');
    $company_name = $query
      ->fields('n', array('title'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $company_name;
  }

  /**
   * Get Primary email address by nid.
   */
  static function getPrimaryEmailByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_email', 'email', 'n.nid = email.entity_id');
    $email = $query
      ->fields('email', array('field_email_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $email;
  }

  /**
   * Get Account type by nid.
   */
  static function getAccountTypeByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_type', 't', 'n.nid = t.entity_id');
    $owner = $query
      ->fields('t', array('field_type_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $owner;
  }

  /**
   * Get Visibility by nid.
   */
  static function getVisibilityByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_visibility', 'v', 'n.nid = v.entity_id');
    $owner = $query
      ->fields('v', array('field_visibility_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $owner;
  }

  /**
   * Get Owner by nid.
   */
  static function getOwnerByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_owned_by', 'ob', 'n.nid = ob.entity_id');
    $owner = $query
      ->fields('ob', array('field_owned_by_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $owner;
  }

  /**
   * Get Phone Number by nid.
   */
  static function getPhoneNumberByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_work_phone', 'phone', 'n.nid = phone.entity_id');
    $phone = $query
      ->fields('phone', array('field_work_phone_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $phone;
  }

  /**
   * Get Website by nid.
   */
  static function getWebsiteByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_work_website', 'website', 'n.nid = website.entity_id');
    $website = $query
      ->fields('website', array('field_work_website_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $website;
  }

  /**
   * Get Street Address by nid.
   */
  static function getStreetAddressByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_street', 'street', 'n.nid = street.entity_id');
    $street = $query
      ->fields('street', array('field_street_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $street;
  }

  /**
   * Get City by nid.
   */
  static function getCityByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_city', 'city', 'n.nid = city.entity_id');
    $city = $query
      ->fields('city', array('field_city_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $city;
  }

  /**
   * Get State by nid.
   */
  static function getStateByNid($nid) {
    $state = '';
    $query = db_select('node', 'n');
    $query->join('field_data_field_states', 'states', 'n.nid = states.entity_id');
    $states = $query
      ->fields('states', array('field_states_tid'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    if ($states != '') {
      $state = taxonomy_term_load($states);
      $state = $state->name;
    }

    return $state;
  }

  /**
   * Get Zip Code by nid.
   */
  static function getZipCodeByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_postal_code', 'zip_code', 'n.nid = zip_code.entity_id');
    $zip_code = $query
      ->fields('zip_code', array('field_postal_code_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $zip_code;
  }

  /**
   * Get Business type by nid.
   */
  static function getBusinessTypeByNid($nid) {
    $query = db_select('node', 'n');
    $query->join('field_data_field_type_of_business', 'bt', 'n.nid = bt.entity_id');
    $bt = $query
      ->fields('bt', array('field_type_of_business_value'))
      ->condition('n.nid', $nid, '=')
      ->execute()
      ->fetchField();

    return $bt;
  }

  /**
   * Get tags by nid.
   */
  static function getTagsByNid($nid) {
    $query = db_select('field_data_field_tags', 'tags');
    $query->join('taxonomy_term_data', 'tx', 'tags.field_tags_tid = tx.tid');
    $tags = $query
      ->fields('tx', array('name', 'tid'))
      ->condition('tags.entity_id', $nid, '=')
      ->execute()
      ->fetchAll();

    return $tags;
  }

  /**
   * Get the state tid by name.
   *
   * @param string $state
   *   The state name.
   */
  static function getTermId($voc, $term) {
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
   * @param string $company
   *   The email address of the account.
   */
  static function accountExist($company) {
    $query = db_select('node', 'n');
    $nid = $query
      ->fields('n', array('nid'))
      ->condition('n.title', $company, '=')
      ->execute()
      ->fetchField();

    return $nid;
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
   *
   * @param int $status
   *   The user account status.
   */
  public static function getProducers($status = 1) {
    if ($cache = cache_get('producers_listings_' . $status)) {
      $producers = $cache->data;
    }
    else {
      $query = db_select('users' , 'u');
      $query->join('users_roles', 'ur', 'u.uid = ur.uid');
      $query->join('role', 'r', 'r.rid = ur.rid');
      $query->join('profile', 'p', 'p.uid = u.uid');
      $query->join('field_data_field_producer_name', 'producer', 'producer.entity_id = p.pid');
      $query->join('field_data_field_first_name', 'fname', 'fname.entity_id = p.pid');
      $query->join('field_data_field_last_name', 'lname', 'lname.entity_id = p.pid');
      $query->join('field_data_field_producer_type', 'ptype', 'ptype.entity_id = p.pid');
      $query->join('field_data_field_primary_contact', 'contact', 'contact.entity_id = p.pid');
      $query->join('field_data_field_phone_number', 'phone', 'phone.entity_id = p.pid');
      $query->join('field_data_field_producer_website', 'site', 'site.entity_id = p.pid');
      $query->join('field_data_field_health_and_life', 'hl', 'hl.entity_id = p.pid');
      $query->join('field_data_field_errors_omission_insurance', 'eoi', 'eoi.entity_id = p.pid');
      $producers = $query
        ->fields('u', array('mail', 'uid'))
        ->fields('ptype', array('field_producer_type_value'))
        ->fields('producer', array('field_producer_name_value'))
        ->fields('fname', array('field_first_name_value'))
        ->fields('lname', array('field_last_name_value'))
        ->fields('contact', array('field_primary_contact_value'))
        ->fields('phone', array('field_phone_number_value'))
        ->fields('site', array('field_producer_website_value'))
        ->fields('hl', array('field_health_and_life_fid'))
        ->fields('eoi', array('field_errors_omission_insurance_fid'))
        ->condition('r.name', 'producer', '=')
        ->condition('u.status', $status, '=')
        ->execute()
        ->fetchAll();

      cache_set('producers_listings_' . $status, $producers, 'cache');
    }

    return $producers;
  }

  /**
   * Get the visibility field options.
   */
  static function getVisibilityOptions() {
    if ($cache = cache_get('visibility_options')) {
      $visibility_options = $cache->data;
    }
    else {
      $producers = Bullseye::getProducers();
      $visibility_options = array();
      $visibility_options['visible_to_all'] = t('Visible to All');
      foreach ($producers as $key => $value) {
        $producer_name = $value->field_first_name_value . ' ' . $value->field_last_name_value;
        $visibility_options[$value->uid] = $producer_name;
      }
      cache_set('visibility_options', $visibility_options, 'cache');
    }

    return $visibility_options;
  }

  /**
   * Get the producers details.
   */
  function getProducerDetails($uid) {
    if ($cache = cache_get('producer_detail_' . $uid)) {
      $producer = $cache->data;
    }
    else {
      $producer = profile2_load_by_user($uid, 'producer');
      $producer = (array) $producer;
      $user = user_load($uid);
      $producer['mail'] = $user->mail;

      cache_set('producer_detail_' . $uid, $producer, 'cache');
    }

    return (array) $producer;
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

    $query = db_select('node', 'n');
    $company_name = $query
      ->fields('n', array('title'))
      ->condition('n.nid', $nid, '=')
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
      $query->join('field_data_field_priority', 'priority', 'n.nid = priority.entity_id');
      $carriers = $query
        ->distinct()
        ->fields('n', array('nid', 'title'))
        ->fields('contact', array('field_primary_contact_value'))
        ->fields('email', array('field_email_value'))
        ->fields('benefits', array('field_benefits_value'))
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
  static function countCarriers() {
    return db_query("SELECT COUNT(nid) AS 'total' FROM {node} WHERE type = :type", array(':type' => 'carrier'))->fetchObject();
  }

  /**
   * Get all the accounts.
   */
  static function getAllAccounts() {
    if ($cache = cache_get('accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'astatus', 'n.nid = astatus.entity_id');
      $query->leftJoin('field_data_field_contacts', 'contact', 'n.nid = contact.entity_id');
      $query->leftJoin('field_data_field_firstname', 'fname', 'contact.field_contacts_value = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'contact.field_contacts_value = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'contact.field_contacts_value = lname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'contact.field_contacts_value = lname.entity_id');
      $query->leftJoin('field_data_field_position', 'pos', 'contact.field_contacts_value = pos.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'contact.field_contacts_value = mail.entity_id');
      $query->leftJoin('field_data_field_profile_picture', 'pp', 'contact.field_contacts_value = pp.entity_id');
      $accounts = $query
        ->distinct()
        ->fields('n', array('nid', 'title'))
        ->fields('astatus', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('pos', array('field_position_value'))
        ->fields('pp', array('field_profile_picture_fid'))
        ->fields('contact', array('field_contacts_value'))
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
  static function countAllAccnt() {
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
  static function getLeadsAccounts() {
    if ($cache = cache_get('leads_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_contacts', 'contact', 'n.nid = contact.entity_id');
      $query->leftJoin('field_data_field_firstname', 'fname', 'contact.field_contacts_value = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'contact.field_contacts_value = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'contact.field_contacts_value = lname.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'contact.field_contacts_value = mail.entity_id');
      $query->leftJoin('field_data_field_position', 'pos', 'contact.field_contacts_value = pos.entity_id');
      $query->leftJoin('field_data_field_profile_picture', 'pp', 'contact.field_contacts_value = pp.entity_id');
      $accounts = $query
        ->fields('n', array('nid', 'title'))
        ->fields('contact', array('field_contacts_value'))
        ->fields('type', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('pos', array('field_position_value'))
        ->fields('pp', array('field_profile_picture_fid'))
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
  static function countLeadsAccnt() {
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
  static function getProspectsAccounts() {
    if ($cache = cache_get('prospect_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $query->leftJoin('field_data_field_contacts', 'contact', 'n.nid = contact.entity_id');
      $query->leftJoin('field_data_field_firstname', 'fname', 'contact.field_contacts_value = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'contact.field_contacts_value = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'contact.field_contacts_value = lname.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'contact.field_contacts_value = mail.entity_id');
      $query->leftJoin('field_data_field_position', 'pos', 'contact.field_contacts_value = pos.entity_id');
      $query->leftJoin('field_data_field_profile_picture', 'pp', 'contact.field_contacts_value = pp.entity_id');
      $accounts = $query
        ->fields('n', array('nid', 'title'))
        ->fields('contact', array('field_contacts_value'))
        ->fields('type', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('pos', array('field_position_value'))
        ->fields('pp', array('field_profile_picture_fid'))
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
  static function countProspectsAccnt() {
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
  static function getOpportunityAccounts() {
    if ($cache = cache_get('opportunity_accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $query->leftJoin('field_data_field_workflow_status', 'w', 'n.nid = w.entity_id');
      $query->leftJoin('field_data_field_contacts', 'contact', 'n.nid = contact.entity_id');
      $query->leftJoin('field_data_field_firstname', 'fname', 'contact.field_contacts_value = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'contact.field_contacts_value = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'contact.field_contacts_value = lname.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'contact.field_contacts_value = mail.entity_id');
      $query->leftJoin('field_data_field_position', 'pos', 'contact.field_contacts_value = pos.entity_id');
      $query->leftJoin('field_data_field_profile_picture', 'pp', 'contact.field_contacts_value = pp.entity_id');
      $accounts = $query
        ->fields('n', array('nid', 'title'))
        ->fields('contact', array('field_contacts_value'))
        ->fields('type', array('field_account_status_value'))
        ->fields('w', array('field_workflow_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('pos', array('field_position_value'))
        ->fields('pp', array('field_profile_picture_fid'))
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
  static function countOpportunityAccnt() {
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
      $query->leftJoin('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->leftJoin('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $query->leftJoin('field_data_field_contacts', 'contact', 'n.nid = contact.entity_id');
      $query->leftJoin('field_data_field_firstname', 'fname', 'contact.field_contacts_value = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'contact.field_contacts_value = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'contact.field_contacts_value = lname.entity_id');
      $query->leftJoin('field_data_field_email', 'mail', 'contact.field_contacts_value = mail.entity_id');
      $query->leftJoin('field_data_field_position', 'pos', 'contact.field_contacts_value = pos.entity_id');
      $query->leftJoin('field_data_field_profile_picture', 'pp', 'contact.field_contacts_value = pp.entity_id');
      $accounts = $query
        ->fields('n', array('nid', 'title'))
        ->fields('contact', array('field_contacts_value'))
        ->fields('type', array('field_account_status_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business_value'))
        ->fields('pos', array('field_position_value'))
        ->fields('pp', array('field_profile_picture_fid'))
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
  static function countDealsAccnt() {
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
        ->fields('n', array('nid', 'title'))
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
  static function countClosedDeals() {
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
   * Get all prospects account.
   */
  static function getProposals($status = 'sent') {
    if ($cache = cache_get('proposals_listing_' . $status)) {
      $proposals = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->join('field_data_field_account', 'account', 'n.nid = account.entity_id');
      $query->join('field_data_field_proposal_status', 'status', 'n.nid = status.entity_id');
      $proposals = $query
        ->fields('n', array('nid', 'uid'))
        ->fields('account', array('field_account_nid'))
        ->condition('n.type', 'proposal', '=')
        ->condition('n.status', 1, '=')
        ->condition('status.field_proposal_status_value', $status, '=')
        ->execute()
        ->fetchAll();

      cache_set('proposals_listing_' . $status, $proposals, 'cache');
    }

    return $proposals;
  }


  /**
   * Get the workflow status of an account.
   */
  static function getWorkflowStatusByNid($nid) {
    if ($cache = cache_get('workflow_status_' . $nid)) {
      $status = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->leftJoin('field_data_field_account_status', 'type', 'n.nid = type.entity_id');
      $query->leftJoin('field_data_field_workflow_status', 'w', 'n.nid = w.entity_id');
      $status = $query
        ->fields('w', array('field_workflow_status_value'))
        ->condition('n.nid', $nid, '=')
        ->execute()
        ->fetchField();

      cache_set('workflow_status_' . $nid, $status, 'cache');
    }

    return $status;
  }

  /**
   * Get RFPs.
   */
  static function getRfps() {
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
      $query->leftJoin('field_data_field_due_date', 'due', 'n.nid = due.entity_id');
      $rfps = $query
        ->fields('n', array('nid', 'title', 'uid'))
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
        ->fields('due', array('field_due_date_value'))
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
  static function randChars($length = 4) {
    $chars = (string) time();
    $chars_length = strlen($chars);
    $rand_string = '';
    for ($i = 0; $i < $length; $i++) {
      $rand_string .= $chars[rand(0, $chars_length - 1)];
    }
    return $rand_string;
  }

  /**
   * Send email.
   *
   * @param string $to
   *   The recipient email.
   * @param string $from
   *   The sender email.
   * @param string $subject
   *   The email subject.
   * @param string $body
   *   The email body.
   * @param array $attachments
   *   An array containing attachment file name and path.
   *   array(
   *    'filename' => 'attachment.pdf',
   *    'uri' => '/tmp/attachment.pdf',
   *   )
   */
  static function sendEmail($to, $from, $params) {
    drupal_mail('bullseye_proposals', 'bullseye', $to, LANGUAGE_NONE, $params, $from);
  }

  /**
   * Determine if benefits in RFP is active.
   *
   * Classes for RFP account by row on listing page.
   */
  static function isActive($param) {
    if (!empty($param)) {
      print "dot-priority green";
    }
    else {
      print "dot-priority gray";
    }
  }

  /**
   * Determine if benefits in Proposal is active.
   *
   * Classes for Proposal account by row on listing page.
   */
  static function isBenefitActive($data) {
    $class_n = "dot-priority gray";
    $class_p = "dot-priority green";

    $benefits = array();

    $benefits['mm'] = $class_n;
    $benefits['lm'] = $class_n;
    $benefits['td'] = $class_n;
    $benefits['lf'] = $class_n;
    $benefits['vs'] = $class_n;
    $benefits['dt'] = $class_n;
    $benefits['mc'] = $class_n;
    $benefits['sd'] = $class_n;
    $benefits['sb'] = $class_n;
    $benefits['rt'] = $class_n;

    if (Bullseye::recursive_array_search('major_medical', $data)) {
      $benefits['mm'] = $class_p;
    }
    if (Bullseye::recursive_array_search('limited_medical', $data)) {
      $benefits['lm'] = $class_p;
    }
    if (Bullseye::recursive_array_search('teledoc', $data)) {
      $benefits['td'] = $class_p;
    }
    if (Bullseye::recursive_array_search('mec', $data)) {
      $benefits['mc'] = $class_p;
    }
    if (Bullseye::recursive_array_search('dental', $data)) {
      $benefits['dt'] = $class_p;
    }
    if (Bullseye::recursive_array_search('vision', $data)) {
      $benefits['vs'] = $class_p;
    }
    if (Bullseye::recursive_array_search('life', $data)) {
      $benefits['lf'] = $class_p;
    }
    if (Bullseye::recursive_array_search('short_term_disability', $data)) {
      $benefits['sd'] = $class_p;
    }
    if (Bullseye::recursive_array_search('special_benefits', $data)) {
      $benefits['sb'] = $class_p;
    }
    if (Bullseye::recursive_array_search('retirement', $data)) {
      $benefits['rt'] = $class_p;
    }

    return $benefits;
  }

  /**
   * Build account name.
   */
  static function buildAccountName($fname, $mname, $lname) {
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
  public static function totalProducers($status = 1) {
    if ($cache = cache_get('total_producers_' . $status)) {
      $total = $cache->data;
    }
    else {
      $query = db_select('users' , 'u');
      $query->join('users_roles', 'ur', 'u.uid = ur.uid');
      $query->join('role', 'r', 'r.rid = ur.rid');
      $total = $query
        ->fields('u', array('mail'))
        ->condition('r.name', 'producer', '=')
        ->condition('u.status', $status, '=')
        ->countQuery()
        ->execute()
        ->fetchField();

      cache_set('total_producers_' . $status, $total, 'cache');
    }

    return $total;
  }

  /**
   * Get the total number of open RFPs.
   */
  static function totalRfps() {
    if ($cache = cache_get('total_rfps')) {
      $total = $cache->data;
    }
    else {
      $query = db_select('node' , 'n');
      $total = $query
        ->fields('n', array('nid'))
        ->condition('n.type', 'rfp', '=')
        ->condition('n.status', 1, '=')
        ->countQuery()
        ->execute()
        ->fetchField();

      cache_set('total_rfps', $total, 'cache');
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

    $node->type = "plan_specs";
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
    if ($data['benefits_in']['major_medical'] != '0') {
      $node->field_benefits[$lang][][$val] = 'major_medical';
    }
    if ($data['benefits_in']['limited_medical'] != '0') {
      $node->field_benefits[$lang][][$val] = 'limited_medical';
    }
    if ($data['benefits_in']['teledoc'] != '0') {
      $node->field_benefits[$lang][][$val] = 'teledoc';
    }
    if ($data['benefits_in']['mec'] != '0') {
      $node->field_benefits[$lang][][$val] = 'mec';
    }
    if ($data['benefits_in']['dental'] != '0') {
      $node->field_benefits[$lang][][$val] = 'dental';
    }
    if ($data['benefits_in']['vision'] != '0') {
      $node->field_benefits[$lang][][$val] = 'vision';
    }
    if ($data['benefits_in']['life'] != '0') {
      $node->field_benefits[$lang][][$val] = 'life';
    }
    if ($data['benefits_in']['short_term_disability'] != '0') {
      $node->field_benefits[$lang][][$val] = 'short_term_disability';
    }
    if ($data['benefits_in']['special_benefits'] != '0') {
      $node->field_benefits[$lang][][$val] = 'special_benefits';
    }
    if ($data['benefits_in']['retirement'] != '0') {
      $node->field_benefits[$lang][][$val] = 'retirement';
    }

    // Check if plan specs is for exisiting company.
    if ($data['nid'] != '') {
      $node->field_account[$lang][]['nid'] = $data['nid'];
      $param = array(
        'query' => array(
          'company_nid' => $data['nid'],
        )
      );
    }
    else {
      $param = array();
    }

    // Other benefit
    $node->field_others[$lang][0]['value'] = $data['benefits_in_others'];

    // Save the carrier in the storage.
    $node = node_submit($node);
    node_save($node);

    // Notify the user that the registration is successfull.
    drupal_set_message(t('Plan specification submitted.'), 'status');

    // Refresh the page.
    drupal_goto('plan_specs', $param);

  }

  /**
   * Update existing plan specs.
   *
   * @param array $data
   *   The data from plan specs form.
   */
  function updatePlanSpecs($data) {
    global $user;

    $plan_specs_nid = $data['plan_specs_nid'];

    $benefits = array();

    foreach ($data['benefits_in'] as $key => $value) {
      if ($value) {
        $benefits[] = $value;
      }
    }

    $wrapper = entity_metadata_wrapper('node', $plan_specs_nid);
    $wrapper->title->set($data['contact_company']);
    $wrapper->field_primary_contact->set($data['contact']);
    $wrapper->field_title->set($data['contact_title']);
    $wrapper->field_contact_number->set($data['contact_number']);
    $wrapper->field_industry->set($data['contact_industry']);
    $wrapper->field_complete_address->set($data['contact_address']);
    $wrapper->field_fringe_rate->set($data['plan_fringe_rates']);
    $wrapper->field_proposed_effective_date->set(strtotime($data['plan_proposed_date']));
    $wrapper->field_other_work_locations->set($data['plan_other_location']);
    $wrapper->field_number_of_employees->set($data['plan_num_employees']);
    $wrapper->field_number_of_dependents->set($data['plan_num_dependents']);
    $wrapper->field_nature_of_business_sic->set($data['plan_nature_business']);
    $wrapper->field_years_in_business->set($data['plan_years_business']);
    $wrapper->field_tax_id->set($data['plan_tax_id']);
    $wrapper->field_renewal_date->set(strtotime($data['plan_renewal_date']));
    $wrapper->field_others->set($data['benefits_in_others']);
    $wrapper->field_benefits->set($benefits);

    $wrapper->save();

    // Check if plan specs is for exisiting company.
    if ($data['nid'] != '') {
      $param = array(
        'query' => array(
          'company_nid' => $data['nid'],
        )
      );
    }
    else {
      $param = array();
    }

    // Notify the user that the registration is successfull.
    drupal_set_message(t('Plan specification submitted.'), 'status');

    // Refresh the page.
    drupal_goto('plan_specs', $param);

  }

  /**
   * Get node id from path alias.
   */
  static function getNidFromPath($alias) {

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
  static function getAccountPeople($nid) {

    if ($cache = cache_get('contacts_' . $nid)) {
      $contacts = $cache->data;
    }
    else {
      $query = db_select('field_data_field_contacts', 'con');
      $query->leftJoin('field_data_field_firstname', 'fname', 'con.field_contacts_value = fname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'con.field_contacts_value = lname.entity_id');
      $query->leftJoin('field_data_field_position', 'pos', 'con.field_contacts_value = pos.entity_id');
      $query->leftJoin('field_data_field_mobile_phone', 'mphone', 'con.field_contacts_value = mphone.entity_id');
      $query->leftJoin('field_data_field_email', 'email', 'con.field_contacts_value = email.entity_id');
      $query->leftJoin('field_data_field_if_primary_contact', 'pc', 'con.field_contacts_value = pc.entity_id');
      $query->leftJoin('field_data_field_profile_picture', 'pp', 'con.field_contacts_value = pp.entity_id');
      $contacts = $query
        ->fields('con', array('field_contacts_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('pos', array('field_position_value'))
        ->fields('mphone', array('field_mobile_phone_value'))
        ->fields('email', array('field_email_value'))
        ->fields('pc', array('field_if_primary_contact_value'))
        ->fields('pp', array('field_profile_picture_fid'))
        ->condition('con.entity_id', $nid, '=')
        ->execute()
        ->fetchAll();

      cache_set('contacts_' . $nid, $contacts, 'cache');
    }

    return $contacts;
  }

  /**
   * Get details of a contact person.
   */
  static function getContactDetailsById($cid) {

    if ($cache = cache_get('contact_details_' . $cid)) {
      $contact = $cache->data;
    }
    else {
      $query = db_select('field_data_field_contacts', 'con');
      $query->leftJoin('field_data_field_firstname', 'fname', 'con.field_contacts_value = fname.entity_id');
      $query->leftJoin('field_data_field_middle_name', 'mname', 'con.field_contacts_value = mname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'con.field_contacts_value = lname.entity_id');
      $query->leftJoin('field_data_field_position', 'pos', 'con.field_contacts_value = pos.entity_id');
      $query->leftJoin('field_data_field_mobile_phone', 'mphone', 'con.field_contacts_value = mphone.entity_id');
      $query->leftJoin('field_data_field_email', 'email', 'con.field_contacts_value = email.entity_id');
      $query->leftJoin('field_data_field_if_primary_contact', 'pc', 'con.field_contacts_value = pc.entity_id');
      $query->leftJoin('field_data_field_profile_picture', 'pp', 'con.field_contacts_value = pp.entity_id');
      $query->leftJoin('field_data_field_facebook_personal', 'fb', 'con.field_contacts_value = fb.entity_id');
      $query->leftJoin('field_data_field_linkedin_personal', 'li', 'con.field_contacts_value = li.entity_id');
      $query->leftJoin('field_data_field_details', 'de', 'con.field_contacts_value = de.entity_id');
      $contact = $query
        ->fields('con', array('field_contacts_value'))
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('pos', array('field_position_value'))
        ->fields('mphone', array('field_mobile_phone_value'))
        ->fields('email', array('field_email_value'))
        ->fields('pc', array('field_if_primary_contact_value'))
        ->fields('pp', array('field_profile_picture_fid'))
        ->fields('fb', array('field_facebook_personal_value'))
        ->fields('li', array('field_linkedin_personal_value'))
        ->fields('de', array('field_details_value'))
        ->condition('con.field_contacts_value', $cid, '=')
        ->execute()
        ->fetchAssoc();

      cache_set('contact_details_' . $cid, $contact, 'cache');
    }

    return $contact;
  }

  /**
   * Get the primary contact of an account.
   */
  static function getAccountPrimaryContact($nid) {

    if ($cache = cache_get('primary_contact_' . $nid)) {
      $contact = $cache->data;
    }
    else {
      $query = db_select('field_data_field_contacts', 'con');
      $query->leftJoin('field_data_field_firstname', 'fname', 'con.field_contacts_value = fname.entity_id');
      $query->leftJoin('field_data_field_lastname', 'lname', 'con.field_contacts_value = lname.entity_id');
      $query->leftJoin('field_data_field_position', 'pos', 'con.field_contacts_value = pos.entity_id');
      $query->leftJoin('field_data_field_mobile_phone', 'mphone', 'con.field_contacts_value = mphone.entity_id');
      $query->leftJoin('field_data_field_email', 'email', 'con.field_contacts_value = email.entity_id');
      $query->leftJoin('field_data_field_if_primary_contact', 'pc', 'con.field_contacts_value = pc.entity_id');
      $contact = $query
        ->fields('fname', array('field_firstname_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('pos', array('field_position_value'))
        ->fields('mphone', array('field_mobile_phone_value'))
        ->fields('email', array('field_email_value'))
        ->condition('con.entity_id', $nid, '=')
        ->condition('pc.field_if_primary_contact_value', 'yes', '=')
        ->execute()
        ->fetchAssoc();

      cache_set('primary_contact_' . $nid, $contact, 'cache');
    }

    return $contact;
  }

  /**
   * Get the latest submitted plan specs
   * of an existing company by nid.
   */
  function getLatestPlanSpecsByNid($nid) {

    $query = db_select('node', 'n');
    $query->leftJoin('field_data_field_fringe_rate', 'fr', 'n.nid = fr.entity_id');
    $query->leftJoin('field_data_field_proposed_effective_date', 'ped', 'n.nid = ped.entity_id');
    $query->leftJoin('field_data_field_other_work_locations', 'owl', 'n.nid = owl.entity_id');
    $query->leftJoin('field_data_field_number_of_employees', 'noe', 'n.nid = noe.entity_id');
    $query->leftJoin('field_data_field_number_of_dependents', 'nod', 'n.nid = nod.entity_id');
    $query->leftJoin('field_data_field_nature_of_business_sic', 'nob', 'n.nid = nob.entity_id');
    $query->leftJoin('field_data_field_years_in_business', 'yib', 'n.nid = yib.entity_id');
    $query->leftJoin('field_data_field_tax_id', 'ti', 'n.nid = ti.entity_id');
    $query->leftJoin('field_data_field_renewal_date', 'rd', 'n.nid = rd.entity_id');
    $query->leftJoin('field_data_field_account', 'a', 'n.nid = a.entity_id');
    $query->leftJoin('field_data_field_others', 'o', 'n.nid = o.entity_id');
    $accounts = $query
      ->fields('n', array('nid', 'type', 'created'))
      ->fields('fr', array('field_fringe_rate_value'))
      ->fields('ped', array('field_proposed_effective_date_value'))
      ->fields('owl', array('field_other_work_locations_value'))
      ->fields('noe', array('field_number_of_employees_value'))
      ->fields('nod', array('field_number_of_dependents_value'))
      ->fields('nob', array('field_nature_of_business_sic_value'))
      ->fields('yib', array('field_years_in_business_value'))
      ->fields('ti', array('field_tax_id_value'))
      ->fields('rd', array('field_renewal_date_value'))
      ->fields('a', array('field_account_nid'))
      ->fields('o', array('field_others_value'))
      ->condition('n.type', 'plan_specs', '=')
      ->condition('a.field_account_nid', $nid, '=')
      ->orderBy('n.created', 'DESC')
      ->range(0, 1)
      ->execute()
      ->fetchAssoc();

    if (!empty($accounts)) {
      $query = db_select('field_data_field_benefits', 'b');
      $benefits = $query
        ->fields('b', array('field_benefits_value'))
        ->condition('b.entity_id', $accounts['nid'], '=')
        ->execute()
        ->fetchCol();

      $accounts['benefits'] = $benefits;
    }

    return $accounts;

  }

  /**
   * Create proposal.
   */
  function createProposal($data) {
    global $user;

    $account = node_load($data['account']['entity_id']);
    $company = $account->title;

    // Map the data to plan specs storage entity.
    $node = new stdClass();

    $node->title = $company;

    $node->type = "proposal";
    node_object_prepare($node);
    $node->language = LANGUAGE_NONE;
    $node->uid = $user->uid;
    $node->status = 1;
    $node->promote = 0;
    $node->comment = 0;

    $lang = $node->language;

    // Due date.
    $node->field_due_date[$lang][0]['value'] = $data['due_date'];

    // Priority field.
    $node->field_priority[$lang][0]['value'] = $data['priority'];

    // Account field.
    $node->field_account[$lang][0]['nid'] = $data['account']['entity_id'];
    $node->field_account[$lang][0]['target_type'] = 'node';

    // Benefits field.
    if ($data['major_medical'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'major_medical';
    }
    if ($data['limited_medical'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'limited_medical';
    }
    if ($data['teledoc'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'teledoc';
    }
    if ($data['mec'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'mec';
    }
    if ($data['dental'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'dental';
    }
    if ($data['vision'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'vision';
    }
    if ($data['life'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'life';
    }
    if ($data['short_term_disability'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'short_term_disability';
    }
    if ($data['retirement'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'retirement';
    }
    if ($data['special_benefits'] == 1) {
      $node->field_benefits[$lang][]['value'] = 'special_benefits';
    }
    // Other benefit.
    if (!empty($data['special_benefits_text'])) {
      $node->field_others[$lang][0]['value'] = $data['special_benefits_text'];
    }

    // Attched proposal.
    if ($data['attach_proposal'] != 0) {
      $proposal_file = file_load($data['attach_proposal']);
      $proposal_file->display = 1;
      $proposal_file = file_copy($proposal_file, 'public://');
      $node->field_attached_proposal[$lang][0] = (array) $proposal_file;
    }

    // Due date.
    $node->field_due_date[$lang][0]['value'] = $data['due_date'];

    // Status.
    $node->field_proposal_status[$lang][0]['value'] = 'sent';

    // Save the carrier in the storage.
    $node = node_submit($node);
    node_save($node);

    // Clear listing page items.
    cache_clear_all('proposals_listing_sent', 'cache');

    return $node->nid;
  }

  /**
   * Send proposal.
   */
  function sendProposal($data) {
    global $user;

    $attachment = file_load($_SESSION['proposal_recipient']['attachments'][0]['fid']);

    $params = array(
      'key' => 'bullseye',
      'to' => $data['to'],
      'from' => $user->mail,
      'subject' => $data['subject'],
      'body' => $data['message'],
      'attachment' => $attachment,
    );

    $this->sendEmail($data['to'], $user->mail, $params);
  }

  /**
   * Get author name.
   */
  static function getAuthor($uid) {
    $account = user_load($uid);
    $lang = LANGUAGE_NONE;

    if (in_array('admin', $account->roles) || in_array('administrator', $account->roles)) {
      $profile = profile2_load_by_user($uid, 'admin');
      if (isset($profile->field_first_name[$lang][0]) || isset($profile->field_last_name[$lang][0]['value'])) {
        print $profile->field_first_name[$lang][0]['value'] . ' ' . $profile->field_last_name[$lang][0]['value'];
      }
      else {
        print "";
      }
    }
    else {
      print "";
    }
  }

  /**
   * Recursive in_array function.
   */
  function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
      if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
        return true;
      }
    }
    return false;
  }

  /**
   * Class for priority.
   *
   * @param string $account
   *   The account node id.
   */
  static function priorityClass($param = NULL) {
    switch ($param) {
      case 'high':
        print 'red';
        break;
      case 'normal':
      case 'medium':
        print 'green';
        break;
      case 'low':
        print "blue";
        break;
      default:
        print 'green';
    }
  }

  /**
   * Get the RFP subject.
   */
  static function getRfpSubject() {
    if ($cache = cache_get('rfp_subject')) {
      $data = $cache->data;
    }
    else {
      $data = variable_get('rfp_subject');
      cache_set('rfp_subject', $data, 'cache');
    }

    return $data;
  }

  /**
   * Get RFP email body.
   */
  function getRfpBody() {
    if ($cache = cache_get('rfp_body')) {
      $data = $cache->data;
    }
    else {
      $body = variable_get('rfp_body');
      $data = str_replace('[Lastname]', $this->getAccountLastName(), $body['value']);
      $data = str_replace('[Firstname]', $this->getAccountFirstName(), $data);
      cache_set('rfp_body', $data, 'cache');
    }

    return $data;
  }

  /**
   * Determine the roles of the current logged in user.
   */
  function hasRole($role, $roles) {
    if (in_array($role, $roles)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Search in array recursively.
   */
  public static function recursive_array_search($needle, $haystack, $currentKey = '') {
    foreach ($haystack as $key => $value) {
      if (is_array($value)) {
        $nextKey = Bullseye::recursive_array_search($needle,$value, $currentKey . '[' . $key . ']');
        if ($nextKey) {
          return $nextKey;
        }
      }
      elseif ($value == $needle) {
        return is_numeric($key) ? $currentKey . '[' . $key . ']' : $currentKey;
      }
    }
    return false;
  }

  /**
   * Approve pending producer account.
   *
   * @param string $uid
   *   The user id.
   */
  public static function approvedUser($uid) {
    $update = array(
      'status' => 1,
    );
    $user = user_load($uid);
    $user = user_save($user, $update);

    drupal_json_output($user->status);
  }

  /**
   * Approve pending producer account.
   *
   * @param string $uid
   *   The user id.
   */
  public static function deleteUser($uid) {
    user_delete($uid);

    drupal_json_output($user->status);
  }

  /**
   * Get the nid of account content.
   */
  public static function getAccountNidByName($name) {
    $query = db_select('node', 'n');
    $nid = $query
      ->distinct()
      ->fields('n', array('nid'))
      ->condition('n.type', 'accounts', '=')
      ->condition('n.title', $name, '=')
      ->orderBy('n.status', 1, '=')
      ->execute()
      ->fetchField();

    return $nid;
  }
}
