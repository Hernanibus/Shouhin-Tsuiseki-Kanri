<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdmApplication Entity
 *
 * @property string $id
 * @property string $denomination
 * @property string $uses_range
 *
 * @property \App\Model\Entity\AdmRange[] $app_ranges
 *
 * @property \App\Model\Entity\AdmHierarchy[] $adm_hierarchies
 */
class AdmApplication extends Entity
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
        'denomination'      => true,
        'adm_hierarchies'   => true,
        'uses_range'        => true
    ];
//-----------------------   ADDED CODE ------------------------------
    /**
     * @var \App\Model\Entity\AdmRange[] Corresponding to property $app_ranges
     */
    private $_app_ranges = [];

    /**
     * @param \App\Model\Entity\AdmRange[] $user_apps
     * @return void
     */
    protected function _setAppRange( array $app_ranges ){ $this->_app_ranges = $app_ranges; }
    /**
     * @return AdmRange[]
     */
    protected function _getAppRange():array{ return $this->_app_ranges; }

}
