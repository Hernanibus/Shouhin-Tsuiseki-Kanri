<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdmApplicationsAdmHierarchy Entity
 *
 * @property int $id
 * @property string $adm_application_id
 * @property int $adm_hierarchy_id
 *
 * @property \App\Model\Entity\AdmApplication $adm_application
 * @property \App\Model\Entity\AdmHierarchy $adm_hierarchy
 */
class AdmApplicationsAdmHierarchy extends Entity
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
        'adm_application_id' => true,
        'adm_hierarchy_id' => true,
        'adm_application' => true,
        'adm_hierarchy' => true,
    ];
}
