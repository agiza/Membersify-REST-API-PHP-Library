<?php

/**
 * Membersify_HistoryItem class
 */
class Membersify_HistoryItem extends Membersify_ApiResource {
  protected static $object = 'history';

  public $id = "";
  public $membership_id = '';
  public $type = '';
  public $txn_id = '';
  public $amount = 0;
  public $currency = '';
  public $created = 0;
  public $livemode = FALSE;

  /**
   * Returns the translated type of an invoice item.
   *
   * @return string
   *   The translated type.
   */
  public function getType() {
    $types = self::getTypes();

    return isset($types[$this->type]) ? $types[$this->type] : $this->type;
  }

  /**
   * Gets all of the types possible for history items.
   *
   * @return array
   *   An array of types possible for history items.
   */
  public static function getTypes() {
    return array(
      'signup' => t('Signup'),
      'payment' => t('Payment'),
      'upgrade' => t('Upgrade'),
      'downgrade' => t('Downgrade'),
      'pending_downgrade' => t('Pending downgrade'),
      'cancellation' => t('Cancellation'),
      'renewal' => t('Reactivation'),
      'expiring_soon' => t('Expiring soon'),
      'expiration' => t('Expiration'),
      'failure' => t('Failed payment'),
      'refund' => t('Refund'),
      'changed_billing' => t('Billing info changed'),
    );
  }
}
