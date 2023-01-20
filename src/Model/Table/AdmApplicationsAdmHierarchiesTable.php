<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdmApplicationsAdmHierarchies Model
 *
 * @property \App\Model\Table\AdmApplicationsTable&\Cake\ORM\Association\BelongsTo $AdmApplications
 * @property \App\Model\Table\AdmHierarchiesTable&\Cake\ORM\Association\BelongsTo $AdmHierarchies
 *
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy newEmptyEntity()
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmApplicationsAdmHierarchy[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AdmApplicationsAdmHierarchiesTable extends Table
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

        $this->setTable('adm_applications_adm_hierarchies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AdmApplications', [
            'foreignKey' => 'adm_application_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AdmHierarchies', [
            'foreignKey' => 'adm_hierarchy_id',
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
        $rules->add($rules->existsIn('adm_application_id', 'AdmApplications'), ['errorField' => 'adm_application_id']);
        $rules->add($rules->existsIn('adm_hierarchy_id', 'AdmHierarchies'), ['errorField' => 'adm_hierarchy_id']);

        return $rules;
    }
}
