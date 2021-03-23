<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Familles Model
 *
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\HasMany $Produits
 *
 * @method \App\Model\Entity\Famille get($primaryKey, $options = [])
 * @method \App\Model\Entity\Famille newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Famille[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Famille|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Famille saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Famille patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Famille[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Famille findOrCreate($search, callable $callback = null, $options = [])
 */
class FamillesTable extends Table
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

        $this->setTable('familles');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->hasMany('Produits', [
            'foreignKey' => 'famille_id'
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
