<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdmHierarchiesAdmRanges Model
 *
 * @property \App\Model\Table\AdmRangesTable&\Cake\ORM\Association\BelongsTo $AdmRanges
 * @property \App\Model\Table\AdmHierarchiesTable&\Cake\ORM\Association\BelongsTo $AdmHierarchies
 *
 * @method \App\Model\Entity\AdmHierarchiesAdmRange newEmptyEntity()
 * @method \App\Model\Entity\AdmHierarchiesAdmRange newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmHierarchiesAdmRange[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AdmHierarchiesAdmRangesTable extends Table
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

        $this->setTable('adm_hierarchies_adm_ranges');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AdmRanges', [
            'foreignKey' => 'adm_range_id',
        ]);
        $this->belongsTo('AdmHierarchies', [
            'foreignKey' => 'adm_hierarchy_id',
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
        $rules->add($rules->existsIn('adm_range_id', 'AdmRanges'), ['errorField' => 'adm_range_id']);
        $rules->add($rules->existsIn('adm_hierarchy_id', 'AdmHierarchies'), ['errorField' => 'adm_hierarchy_id']);

        return $rules;
    }
}
