<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdmDomain Entity
 *
 * @property int $id
 * @property int $adm_hierarchy_id
 * @property string $denomination
 * @property string $company_name
 * @property string $postcode
 * @property string $country
 * @property string $city
 * @property string $primary_address
 * @property string|null $secondary_address
 * @property string $telephone
 * @property string|null $fax
 * @property string|null $web
 * @property string|null $email
 * @property string|null $contact
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\AdmHierarchy $adm_hierarchy
 */
class AdmDomain extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'adm_hierarchy_id' => true,
        'denomination' => true,
        'company_name' => true,
        'postcode' => true,
        'country' => true,
        'city' => true,
        'primary_address' => true,
        'secondary_address' => true,
        'telephone' => true,
        'fax' => true,
        'web' => true,
        'email' => true,
        'contact' => true,
        'created' => true,
        'modified' => true,
        'adm_hierarchy' => true,
    ];
}
