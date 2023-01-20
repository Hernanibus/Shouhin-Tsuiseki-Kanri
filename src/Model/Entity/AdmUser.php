<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\IdentityInterface;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * AdmUser Entity
 *
 * @property int $id
 * @property int $active
 * @property int $adm_hierarchy_id
 * @property string $real_family_name
 * @property string $real_name
 * @property string $denomination
 * @property int $adm_domain_id
 * @property string $password
 * @property string $email
 *
 * @property \App\Model\Entity\AdmDomain $user_dom
 * @property \App\Model\Entity\AdmApplication[] $user_apps
 *
 * @property \App\Model\Entity\AdmHierarchy $adm_hierarchy
 * @property \App\Model\Entity\AdmDomain $adm_domain
 */
class AdmUser extends Entity implements IdentityInterface
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
        'active' => true,
        'adm_hierarchy_id' => true,
        'real_family_name' => true,
        'real_name' => true,
        'denomination' => true,
        'adm_domain_id' => true,
        'password' => true,
        'email' => true,
        'adm_hierarchy' => true,
        'adm_domain' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

//-----------------------   ADDED CODE ------------------------------
    /**
     * @var AdmDomain
     */
    private $_user_dom;
    /**
     * @var AdmApplication[] Corresponding to property $user_apps
     */
    private $_user_apps;

    /**
     * If the password is not empty, hash it
     *
     * @param string password The password to hash.
     *
     * @return ?string The password hashed or null.
     */
    protected function _setPassword( string $password ):?string
    {
        if( strlen( $password ) > 0 ){ return ( new DefaultPasswordHasher() )->hash( $password ); }
        return null;
    }

    public function getIdentifier(){ return $this->id; }
    public function getOriginalData(){ return $this; }

    /**
     * @param AdmDomain $user_dom
     * @return void
     */
    protected function _setUserDom( ?AdmDomain $user_dom ){ $this->_user_dom = $user_dom; }
    /**
     * @return AdmDomain
     */
    protected function _getUserDom():?AdmDomain{ return $this->_user_dom; }
    /**
     * @param AdmApplication[] $user_apps
     * @return void
     */
    protected function _setUserApps( array $user_apps ){ $this->_user_apps = $user_apps; }
    /**
     * @return AdmApplication[]
     */
    protected function _getUserApps():array{ return $this->_user_apps; }
}
