<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adm-ranges Model
 *
 * @property \App\Model\Table\RangeGroupsTable&\Cake\ORM\Association\BelongsTo $RangeGroups
 * @property \App\Model\Table\AdmHierarchiesTable&\Cake\ORM\Association\BelongsToMany $AdmHierarchies
 *
 * @method \App\Model\Entity\Adm-range newEmptyEntity()
 * @method \App\Model\Entity\Adm-range newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Adm-range[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adm-range get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adm-range findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Adm-range patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adm-range[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adm-range|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adm-range saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adm-range[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Adm-range[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Adm-range[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Adm-range[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AdmRangesTable extends Table
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

        $this->setTable('adm_ranges');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('RangeGroups', [
            'foreignKey' => 'range_group_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('AdmHierarchies', [
            'foreignKey' => 'adm_range_id',
            'targetForeignKey' => 'adm_hierarchy_id',
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
            ->scalar('denomination')
            ->maxLength('denomination', 100)
            ->requirePresence('denomination', 'create')
            ->notEmptyString('denomination');

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
        $rules->add($rules->existsIn('range_group_id', 'RangeGroups'), ['errorField' => 'range_group_id']);

        return $rules;
    }
}
