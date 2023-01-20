<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Core\Configure;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdmUsers Model
 *
 * @property \App\Model\Table\AdmHierarchiesTable&\Cake\ORM\Association\BelongsTo $AdmHierarchies
 * @property \App\Model\Table\AdmDomainsTable&\Cake\ORM\Association\BelongsTo $AdmDomains
 *
 * @method \App\Model\Entity\AdmUser newEmptyEntity()
 * @method \App\Model\Entity\AdmUser newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AdmUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdmUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdmUser findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AdmUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdmUser[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdmUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmUser[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmUser[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmUser[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmUser[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */


class AdmUsersTable extends Table
{
    use LocatorAwareTrait;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('adm_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AdmHierarchies', [
            'foreignKey' => 'adm_hierarchy_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AdmDomains', [
            'foreignKey' => 'adm_domain_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->notEmptyString('active');

        $validator
            ->scalar('real_family_name')
            ->maxLength('real_family_name', 100)
            ->requirePresence('real_family_name', 'create')
            ->notEmptyString('real_family_name');

        $validator
            ->scalar('real_name')
            ->maxLength('real_name', 100)
            ->requirePresence('real_name', 'create')
            ->notEmptyString('real_name');

        $validator
            ->scalar('denomination')
            ->maxLength('denomination', 100)
            ->requirePresence('denomination', 'create')
            ->notEmptyString('denomination')
            ;

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn('adm_hierarchy_id', 'AdmHierarchies'), ['errorField' => 'adm_hierarchy_id']);
        $rules->add($rules->existsIn('adm_domain_id', 'AdmDomains'), ['errorField' => 'adm_domain_id']);

        return $rules;
    }

    public function findFullUserInfo( array $options ):?\App\Model\Entity\AdmUser
    {
        $apps_table     = $this->getTableLocator()->get( Configure::read('DomainUserControl.applicationsModel' ) );
        $hier_table     = $this->getTableLocator()->get( Configure::read('DomainUserControl.hierarchiesModel' ) );
        $apps_axerray   = $this->getTableLocator()->get( Configure::read('DomainUserControl.appXhierModel' ) );

        define( 'TYPE_APPLICATION', Configure::read( 'DomainUserControl.TYPE_APPLICATION' )  );

        $user_id        = $options[ 'user_id' ];
        $user           = $this->find( 'all', $options )->where( [ 'AdmUsers.id' => $user_id ] )->first();
        if( empty( $user ) ){ return null; }//user not found

        $domain                     = $this->getTableLocator()->get( Configure::read('DomainUserControl.domModel' ) )->
                                        find()->where( [ 'id' => $user->adm_domain_id ] )->first();

        //---- User found; adding extra information
        $user->user_dom             = $domain;
        //---- Applications corresponding to user; There must be always at least one
        $h                          = $hier_table->find( 'children', [ 'for' => $user->adm_hierarchy_id ] )
                                                 ->where( [ 'type' => TYPE_APPLICATION ] );//will be an array of hierarchies
        $apps_array                 = [];
        foreach( $h as $hierarchy )
        {
            $hApps                      = $apps_axerray->find()->where( [ 'adm_hierarchy_id' => $hierarchy->id ] )->first();
            //Must be first even though there is only one
            $user_application           = $apps_table->find()->where( [ 'id' => $hApps->adm_application_id ] )->first();
            //----- Adding ranges to the corresponding applications if applicable
            if( Configure::read('DomainUserControl.useRange' ) && $user_application->uses_range )
            { $user_application = $apps_table->setApplicationRange( $user_application, $hierarchy ); }
            $apps_array[]               = $user_application;
        }
        $user->user_apps            = $apps_array;

        return $user;
    }

}
