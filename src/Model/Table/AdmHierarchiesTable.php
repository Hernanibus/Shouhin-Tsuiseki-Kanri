<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdmHierarchies Model
 *
 * @property \App\Model\Table\AdmHierarchiesTable&\Cake\ORM\Association\BelongsTo $ParentAdmHierarchies
 * @property \App\Model\Table\AdmHierarchiesTable&\Cake\ORM\Association\HasMany $ChildAdmHierarchies
 * @property \App\Model\Table\AdmApplicationsTable&\Cake\ORM\Association\BelongsToMany $AdmApplications
 * @property \App\Model\Table\AdmRangesTable&\Cake\ORM\Association\BelongsToMany $AdmRanges
 *
 * @method \App\Model\Entity\AdmHierarchy newEmptyEntity()
 * @method \App\Model\Entity\AdmHierarchy newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AdmHierarchy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdmHierarchy get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdmHierarchy findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AdmHierarchy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdmHierarchy[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdmHierarchy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmHierarchy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmHierarchy[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmHierarchy[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmHierarchy[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmHierarchy[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class AdmHierarchiesTable extends Table
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

        $this->setTable('adm_hierarchies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Tree');

        $this->belongsTo('ParentAdmHierarchies', [
            'className' => 'AdmHierarchies',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildAdmHierarchies', [
            'className' => 'AdmHierarchies',
            'foreignKey' => 'parent_id',
        ]);
        $this->belongsToMany('AdmApplications', [
            'foreignKey' => 'adm_hierarchy_id',
            'targetForeignKey' => 'adm_application_id',
            'joinTable' => 'adm_applications_adm_hierarchies',
        ]);
        $this->belongsToMany('AdmRanges', [
            'foreignKey' => 'adm_hierarchy_id',
            'targetForeignKey' => 'adm_range_id',
            'joinTable' => 'adm_hierarchies_adm_ranges',
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
            ->nonNegativeInteger('type')
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

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
        $rules->add($rules->existsIn('parent_id', 'ParentAdmHierarchies'), ['errorField' => 'parent_id']);

        return $rules;
    }
}
