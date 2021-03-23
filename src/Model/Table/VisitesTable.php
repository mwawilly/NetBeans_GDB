<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Visites Model
 *
 * @property \App\Model\Table\PraticiensTable&\Cake\ORM\Association\BelongsTo $Praticiens
 * @property \App\Model\Table\VisiteursTable&\Cake\ORM\Association\BelongsTo $Visiteurs
 * @property \App\Model\Table\MotifsTable&\Cake\ORM\Association\BelongsTo $Motifs
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\BelongsToMany $Produits
 *
 * @method \App\Model\Entity\Visite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Visite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Visite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Visite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Visite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Visite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Visite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Visite findOrCreate($search, callable $callback = null, $options = [])
 */
class VisitesTable extends Table
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

        $this->setTable('visites');
        $this->setDisplayField('commentaire');
        $this->setPrimaryKey('id');

        $this->belongsTo('Praticiens', [
            'foreignKey' => 'praticien_id'
        ]);
        $this->belongsTo('Visiteurs', [
            'foreignKey' => 'visiteur_id'
        ]);
        $this->belongsTo('Motifs', [
            'foreignKey' => 'motif_id'
        ]);
        $this->belongsToMany('Produits', [
            'foreignKey' => 'visite_id',
            'targetForeignKey' => 'produit_id',
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
            ->date('dateVisite')
            ->allowEmptyDate('dateVisite');

        $validator
            ->scalar('commentaire')
            ->maxLength('commentaire', 50)
            ->allowEmptyString('commentaire');

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
        $rules->add($rules->existsIn(['visiteur_id'], 'Visiteurs'));
        $rules->add($rules->existsIn(['motif_id'], 'Motifs'));

        return $rules;
    }
}
