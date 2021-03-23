<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Praticiens Model
 *
 * @property \App\Model\Table\MetiersTable&\Cake\ORM\Association\BelongsTo $Metiers
 * @property \App\Model\Table\VisitesTable&\Cake\ORM\Association\HasMany $Visites
 * @property \App\Model\Table\SpecialitesTable&\Cake\ORM\Association\BelongsToMany $Specialites
 *
 * @method \App\Model\Entity\Praticien get($primaryKey, $options = [])
 * @method \App\Model\Entity\Praticien newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Praticien[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Praticien|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Praticien saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Praticien patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Praticien[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Praticien findOrCreate($search, callable $callback = null, $options = [])
 */
class PraticiensTable extends Table
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

        $this->setTable('praticiens');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');

        $this->belongsTo('Metiers', [
            'foreignKey' => 'metier_id'
        ]);
        $this->hasMany('Visites', [
            'foreignKey' => 'praticien_id'
        ]);
        $this->belongsToMany('Specialites', [
            'foreignKey' => 'praticien_id',
            'targetForeignKey' => 'specialite_id',
            'joinTable' => 'praticiens_specialites'
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
            ->scalar('nom')
            ->maxLength('nom', 50)
            ->allowEmptyString('nom');

        $validator
            ->scalar('prenom')
            ->maxLength('prenom', 50)
            ->allowEmptyString('prenom');

        $validator
            ->scalar('tel')
            ->maxLength('tel', 20)
            ->allowEmptyString('tel');

        $validator
            ->scalar('mail')
            ->maxLength('mail', 50)
            ->allowEmptyString('mail');

        $validator
            ->scalar('rue')
            ->maxLength('rue', 50)
            ->allowEmptyString('rue');

        $validator
            ->scalar('codePostal')
            ->maxLength('codePostal', 10)
            ->allowEmptyString('codePostal');

        $validator
            ->scalar('ville')
            ->maxLength('ville', 50)
            ->allowEmptyString('ville');

        $validator
            ->integer('coefNotoriete')
            ->allowEmptyString('coefNotoriete');

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
        $rules->add($rules->existsIn(['metier_id'], 'Metiers'));

        return $rules;
    }
}
