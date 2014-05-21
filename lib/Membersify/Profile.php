<?php

/**
 * Membersify_Profile class
 */
class Membersify_Profile extends Membersify_ApiResource {
  protected static $object = 'profile';

  public $id = '';
  public $user_id = 0;
  public $display = '';
  public $status = '';
  public $livemode = FALSE;

  /**
   * Deletes the payment profile via the API.
   *
   * @return mixed
   */
  public function delete() {
    return $this->request('profile/delete', array('id' => $this->id));
  }

  /**
   * Returns the translated status of a payment profile.
   *
   * @return string
   *   The translated status.
   */
  public function getStatus() {
    $statuses = self::getStatuses();

    return isset($statuses[$this->status]) ? $statuses[$this->status] : $this->status;
  }

  /**
   * Gets all of the statuses possible for payment profiles.
   *
   * @return array
   *   An array of statuses possible for payment profiles.
   */
  public static function getStatuses() {
    return array(
      'active' => t('Active'),
      'expired' => t('Expired'),
      'error' => t('Error'),
      'disabled' => t('Disabled'),
    );
  }
}
