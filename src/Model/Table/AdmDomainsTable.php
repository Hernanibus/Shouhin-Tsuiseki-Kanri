<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdmDomains Model
 *
 * @property \App\Model\Table\AdmHierarchiesTable&\Cake\ORM\Association\BelongsTo $AdmHierarchies
 *
 * @method \App\Model\Entity\AdmDomain newEmptyEntity()
 * @method \App\Model\Entity\AdmDomain newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AdmDomain[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdmDomain get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdmDomain findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AdmDomain patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdmDomain[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdmDomain|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmDomain saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdmDomain[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmDomain[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmDomain[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdmDomain[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdmDomainsTable extends Table
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

        $this->setTable('adm_domains');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AdmHierarchies', [
            'foreignKey' => 'adm_hierarchy_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('AdmUsers', [
            'foreignKey' => 'adm_domain_id',
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
            ->maxLength('denomination', 255)
            ->requirePresence('denomination', 'create')
            ->notEmptyString('denomination');

        $validator
            ->scalar('company_name')
            ->maxLength('company_name', 255)
            ->requirePresence('company_name', 'create')
            ->notEmptyString('company_name');

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 10)
            ->requirePresence('postcode', 'create')
            ->notEmptyString('postcode');

        $validator
            ->scalar('country')
            ->maxLength('country', 100)
            ->notEmptyString('country');

        $validator
            ->scalar('city')
            ->maxLength('city', 100)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('primary_address')
            ->maxLength('primary_address', 300)
            ->requirePresence('primary_address', 'create')
            ->notEmptyString('primary_address');

        $validator
            ->scalar('secondary_address')
            ->maxLength('secondary_address', 300)
            ->allowEmptyString('secondary_address');

        $validator
            ->scalar('telephone')
            ->maxLength('telephone', 20)
            ->requirePresence('telephone', 'create')
            ->notEmptyString('telephone');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 20)
            ->allowEmptyString('fax');

        $validator
            ->scalar('web')
            ->maxLength('web', 200)
            ->allowEmptyString('web');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 30)
            ->allowEmptyString('contact');

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

        return $rules;
    }

    /**
     * @return \Cake\Datasource\ResultSetInterface With index for domain and its denomination as a list for select in forms
     */
    public function domainNames(): \Cake\Datasource\ResultSetInterface
    {
        $this->setDisplayField( 'denomination' );
        return $this->find( 'list' )->all();
    }
}
