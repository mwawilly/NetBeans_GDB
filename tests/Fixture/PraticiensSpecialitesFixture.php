<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PraticiensSpecialitesFixture
 */
class PraticiensSpecialitesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'praticien_id' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'specialite_id' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'diplome' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'French_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'coefPres' => ['type' => 'decimal', 'length' => 18, 'precision' => 0, 'null' => true, 'default' => null, 'comment' => null, 'unsigned' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_Praticiens_Specialites_Praticiens' => ['type' => 'foreign', 'columns' => ['praticien_id'], 'references' => ['praticiens', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_Praticiens_Specialites_Specialites' => ['type' => 'foreign', 'columns' => ['specialite_id'], 'references' => ['specialites', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'praticien_id' => 1,
                'specialite_id' => 1,
                'diplome' => 'Lorem ipsum dolor sit amet',
                'coefPres' => 1.5
            ],
        ];
        parent::init();
    }
}
