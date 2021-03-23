<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProduitsVisite Entity
 *
 * @property int $id
 * @property int|null $visite_id
 * @property int|null $produit_id
 * @property int|null $quantite
 *
 * @property \App\Model\Entity\Visite $visite
 * @property \App\Model\Entity\Produit $produit
 */
class ProduitsVisite extends Entity
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
        'visite_id' => true,
        'produit_id' => true,
        'quantite' => true,
        'visite' => true,
        'produit' => true
    ];
}
