<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Metiers Model
 *
 * @property \App\Model\Table\PraticiensTable&\Cake\ORM\Association\HasMany $Praticiens
 *
 * @method \App\Model\Entity\Metier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Metier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Metier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Metier|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Metier saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Metier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Metier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Metier findOrCreate($search, callable $callback = null, $options = [])
 */
class MetiersTable extends Table
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

        $this->setTable('metiers');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->hasMany('Praticiens', [
            'foreignKey' => 'metier_id'
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
            ->scalar('libelle')
            ->maxLength('libelle', 50)
            ->allowEmptyString('libelle');

        return $validator;
    }
}
