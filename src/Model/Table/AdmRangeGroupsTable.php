<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdmRangeGroups Model
 *
 * @method \App\Model\Entity\AdmRangeGroup newEmptyEntity()
 * @method \App\Model\Entity\AdmRangeGroup newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AdmRangeGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdmRangeGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdmRangeGroup findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AdmRangeGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdmRangeGroup[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdmRangeGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmRangeGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmRangeGroup[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmRangeGroup[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmRangeGroup[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmRangeGroup[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AdmRangeGroupsTable extends Table
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

        $this->setTable('adm_range_groups');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('denomination')
            ->maxLength('denomination', 100)
            ->requirePresence('denomination', 'create')
            ->notEmptyString('denomination');

        return $validator;
    }
}
