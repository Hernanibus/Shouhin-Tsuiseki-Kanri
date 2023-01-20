<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Core\Configure;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\ORM\Locator\LocatorAwareTrait;
use \App\Model\Entity\AdmApplication;
use \App\Model\Entity\AdmHierarchy;

/**
 * AdmApplications Model
 *
 * @property \App\Model\Table\AdmHierarchiesTable&\Cake\ORM\Association\BelongsToMany $AdmHierarchies
 *
 * @method \App\Model\Entity\AdmApplication newEmptyEntity()
 * @method \App\Model\Entity\AdmApplication newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AdmApplication[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdmApplication get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdmApplication findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AdmApplication patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdmApplication[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdmApplication|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmApplication saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmApplication[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmApplication[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmApplication[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmApplication[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */

define( 'TYPE_RANGE', Configure::read( 'DomainUserControl.TYPE_RANGE' ) );

class AdmApplicationsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('adm_applications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('AdmHierarchies', [
            'foreignKey'        => 'adm_application_id',
            'targetForeignKey'  => 'adm_hierarchy_id',
            'joinTable'         => 'adm_applications_adm_hierarchies',
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
            ->scalar('id')
            ->maxLength('id', 5)
            ->allowEmptyString('id', null, 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('denomination')
            ->maxLength('denomination', 200)
            ->requirePresence('denomination', 'create')
            ->notEmptyString('denomination');

        $validator
            ->scalar( 'uses_range' )
            ->boolean( 'uses_range' );

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

        return $rules;
    }

    //-----------------------   ADDED CODE ------------------------------

    use LocatorAwareTrait;

    public function setApplicationRange( AdmApplication $application, AdmHierarchy $hierarchy  ):AdmApplication
    {
        $hierarchy_model    = $this->getTableLocator()->get( Configure::read('DomainUserControl.hierarchiesModel' ) );
        $hier_axe           = $this->getTableLocator()->get( Configure::read('DomainUserControl.rangeXhierModel' ) );
        $ranges_model       = $this->getTableLocator()->get( Configure::read('DomainUserControl.rangesModel' ) );

        //Ranges in hierarchies table for given application
        $hierarchies        = $hierarchy_model->find( 'children', [ 'for' => $hierarchy->id ] )->where( [ 'type' => TYPE_RANGE ] )->all();
        $ranges             = [];
        foreach( $hierarchies as $hier_range )
        {
            $xrange     = $hier_axe->find()->where( [ 'adm_hierarchy_id' => $hier_range->id ] )->first();
            if( !empty( $xrange ) )
            {
                $r = $ranges_model->find()->where( [ 'id' => $xrange->adm_range_id ] )->first();
                $ranges[]   = $r;
            }
        }
        $application->app_ranges = $ranges;
        return $application;
    }
}
