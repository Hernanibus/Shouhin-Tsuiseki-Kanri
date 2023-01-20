<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdmHierarchiesAdmRange Entity
 *
 * @property int $id
 * @property int|null $adm_range_id
 * @property int|null $adm_hierarchy_id
 *
 * @property \App\Model\Entity\AdmRange $adm_range
 * @property \App\Model\Entity\AdmHierarchy $adm_hierarchy
 */
class AdmHierarchiesAdmRange extends Entity
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
        'adm_range_id' => true,
        'adm_hierarchy_id' => true,
        'adm_range' => true,
        'adm_hierarchy' => true,
    ];
}
