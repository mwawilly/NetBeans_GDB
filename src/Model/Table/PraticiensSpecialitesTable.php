<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PraticiensSpecialites Model
 *
 * @property \App\Model\Table\PraticiensTable&\Cake\ORM\Association\BelongsTo $Praticiens
 * @property \App\Model\Table\SpecialitesTable&\Cake\ORM\Association\BelongsTo $Specialites
 *
 * @method \App\Model\Entity\PraticiensSpecialite get($primaryKey, $options = [])
 * @method \App\Model\Entity\PraticiensSpecialite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PraticiensSpecialite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PraticiensSpecialite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PraticiensSpecialite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PraticiensSpecialite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PraticiensSpecialite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PraticiensSpecialite findOrCreate($search, callable $callback = null, $options = [])
 */
class PraticiensSpecialitesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('praticiens_specialites');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->belongsTo('Praticiens', [
            'foreignKey' => 'praticien_id'
        ]);
        $this->belongsTo('Specialites', [
            'foreignKey' => 'specialite_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('diplome')
            ->maxLength('diplome', 50)
            ->allowEmptyString('diplome');

        $validator
            ->decimal('coefPres')
            ->allowEmptyString('coefPres');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['praticien_id'], 'Praticiens'));
        $rules->add($rules->existsIn(['specialite_id'], 'Specialites'));

        return $rules;
    }
}
