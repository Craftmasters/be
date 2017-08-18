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
   * Get producers account.
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
    return $win_ratio;
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
   * Get carriers.
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
        ->groupBy('n.nid')
        ->execute()
        ->fetchAll();

      cache_set('carriers_listing', $carriers, 'cache');
    }

    return $carriers;
  }

  /**
   * Count carriers.
   */
  function countCarriers() {
    return db_query("SELECT COUNT(nid) AS 'total' FROM {node} WHERE type = :type", array(':type' => 'carrier'))->fetchObject();
  }

  /**
   * Get carriers.
   */
  function getAllAccounts() {
    if ($cache = cache_get('accounts_listing')) {
      $accounts = $cache->data;
    }
    else {
      $query = db_select('node', 'n');
      $query->join('field_data_field_firstname', 'fname', 'n.nid = fname.entity_id');
      $query->join('field_data_field_middle_name', 'mname', 'n.nid = mname.entity_id');
      $query->join('field_data_field_lastname', 'lname', 'n.nid = lname.entity_id');
      $query->join('field_data_field_prefix', 'pfix', 'n.nid = pfix.entity_id');
      $query->join('field_data_field_title', 'pos', 'n.nid = pos.entity_id');
      $query->join('field_data_field_company', 'comp', 'n.nid = comp.entity_id');
      $query->join('field_data_field_email', 'mail', 'n.nid = mail.entity_id');
      $query->join('field_data_field_source', 'source', 'n.nid = source.entity_id');
      $query->join('field_data_field_type_of_business', 'btype', 'n.nid = btype.entity_id');
      $accounts = $query
        ->distinct()
        ->fields('fname', array('field_firstname_value'))
        ->fields('mname', array('field_middle_name_value'))
        ->fields('lname', array('field_lastname_value'))
        ->fields('comp', array('field_company_value'))
        ->fields('mail', array('field_email_value'))
        ->fields('source', array('field_source_value'))
        ->fields('btype', array('field_type_of_business'))
        ->condition('n.type', 'accounts', '=')
        ->condition('n.status', 1, '=')
        ->groupBy('n.nid')
        ->execute()
        ->fetchAll();

      cache_set('accounts_listing', $accounts, 'cache');
    }

    return $accounts;
  }
}
