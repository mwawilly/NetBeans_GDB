<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VisitesFixture
 */
class VisitesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'dateVisite' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'commentaire' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'French_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'praticien_id' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'visiteur_id' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'motif_id' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_Visites_Motifs' => ['type' => 'foreign', 'columns' => ['motif_id'], 'references' => ['motifs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_Visites_Visiteurs' => ['type' => 'foreign', 'columns' => ['visiteur_id'], 'references' => ['visiteurs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_Visites_Praticiens' => ['type' => 'foreign', 'columns' => ['praticien_id'], 'references' => ['praticiens', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'dateVisite' => '2021-03-23',
                'commentaire' => 'Lorem ipsum dolor sit amet',
                'praticien_id' => 1,
                'visiteur_id' => 1,
                'motif_id' => 1
            ],
        ];
        parent::init();
    }
}
