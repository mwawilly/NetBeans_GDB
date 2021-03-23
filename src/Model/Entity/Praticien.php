<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Praticien Entity
 *
 * @property int $id
 * @property string|null $nom
 * @property string|null $prenom
 * @property string|null $tel
 * @property string|null $mail
 * @property string|null $rue
 * @property string|null $codePostal
 * @property string|null $ville
 * @property int|null $coefNotoriete
 * @property int|null $metier_id
 *
 * @property \App\Model\Entity\Metier $metier
 * @property \App\Model\Entity\Visite[] $visites
 * @property \App\Model\Entity\Specialite[] $specialites
 */
class Praticien extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nom' => true,
        'prenom' => true,
        'tel' => true,
        'mail' => true,
        'rue' => true,
        'codePostal' => true,
        'ville' => true,
        'coefNotoriete' => true,
        'metier_id' => true,
        'metier' => true,
        'visites' => true,
        'specialites' => true
    ];
    
    protected function _getLabel() {
        return "{$this->nom} - {$this->prenom}";
    }
}
