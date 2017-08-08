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
    $this->user = $user;
    $this->uid = $user->uid;
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
    // Check the cache table if the cache do exist.
    if ($cache = cache_get($voc . '_' . strtolower($term))) {
      $tid = $cache->data;
    }
    else {
      $tid = db_select('taxonomy_term_data', 'td');
      $tid->join('taxonomy_vocabulary', 'tv', 'td.vid = tv.vid');
      $tid = $tid->fields('td',array('tid'))
       ->condition('tv.machine_name', $voc, '=')
       ->condition('td.name', $term, '=')
       ->execute()
       ->fetchField();

      cache_set($voc . '_' . strtolower($term), $tid, 'cache');
    }

    return $tid;
  }
}
