<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProduitsVisitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProduitsVisitesTable Test Case
 */
class ProduitsVisitesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProduitsVisitesTable
     */
    public $ProduitsVisites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProduitsVisites',
        'app.Visites',
        'app.Produits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProduitsVisites') ? [] : ['className' => ProduitsVisitesTable::class];
        $this->ProduitsVisites = TableRegistry::getTableLocator()->get('ProduitsVisites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProduitsVisites);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
