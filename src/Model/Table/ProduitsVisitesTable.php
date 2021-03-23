<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProduitsVisites Model
 *
 * @property \App\Model\Table\VisitesTable&\Cake\ORM\Association\BelongsTo $Visites
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\BelongsTo $Produits
 *
 * @method \App\Model\Entity\ProduitsVisite get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProduitsVisite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProduitsVisite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProduitsVisite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProduitsVisite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProduitsVisite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProduitsVisite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProduitsVisite findOrCreate($search, callable $callback = null, $options = [])
 */
class ProduitsVisitesTable extends Table
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

        $this->setTable('produits_visites');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->belongsTo('Visites', [
            'foreignKey' => 'visite_id'
        ]);
        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id'
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
            ->integer('quantite')
            ->allowEmptyString('quantite');

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
        $rules->add($rules->existsIn(['visite_id'], 'Visites'));
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));

        return $rules;
    }
}
