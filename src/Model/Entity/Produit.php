<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produit Entity
 *
 * @property int $id
 * @property string|null $libelle
 * @property float|null $prixIndicatif
 * @property int|null $numeroDepot
 * @property int|null $famille_id
 *
 * @property \App\Model\Entity\Famille $famille
 * @property \App\Model\Entity\Visite[] $visites
 */
class Produit extends Entity
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
        'libelle' => true,
        'prixIndicatif' => true,
        'numeroDepot' => true,
        'famille_id' => true,
        'famille' => true,
        'visites' => true
    ];
    
    
}
