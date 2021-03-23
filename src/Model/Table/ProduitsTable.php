<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produits Model
 *
 * @property \App\Model\Table\FamillesTable&\Cake\ORM\Association\BelongsTo $Familles
 * @property \App\Model\Table\VisitesTable&\Cake\ORM\Association\BelongsToMany $Visites
 *
 * @method \App\Model\Entity\Produit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produit|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produit findOrCreate($search, callable $callback = null, $options = [])
 */
class ProduitsTable extends Table
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

        $this->setTable('produits');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->belongsTo('Familles', [
            'foreignKey' => 'famille_id'
        ]);
        $this->belongsToMany('Visites', [
            'foreignKey' => 'produit_id',
            'targetForeignKey' => 'visite_id',
            'joinTable' => 'produits_visites'
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

        $validator
            ->numeric('prixIndicatif')
            ->allowEmptyString('prixIndicatif');

        $validator
            ->integer('numeroDepot')
            ->allowEmptyString('numeroDepot');

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
        $rules->add($rules->existsIn(['famille_id'], 'Familles'));

        return $rules;
    }
}
