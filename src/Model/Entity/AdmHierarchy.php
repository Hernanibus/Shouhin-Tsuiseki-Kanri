<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdmHierarchy Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rght
 * @property int $type
 *
 * @property \App\Model\Entity\ParentAdmHierarchy $parent_adm_hierarchy
 * @property \App\Model\Entity\ChildAdmHierarchy[] $child_adm_hierarchies
 * @property \App\Model\Entity\AdmApplication[] $adm_applications
 * @property \App\Model\Entity\AdmRange[] $adm_ranges
 */
class AdmHierarchy extends Entity
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
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'type' => true,
        'parent_adm_hierarchy' => true,
        'child_adm_hierarchies' => true,
        'adm_applications' => true,
        'adm_ranges' => true,
    ];
}
