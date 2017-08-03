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


}
