<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PraticiensSpecialitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PraticiensSpecialitesTable Test Case
 */
class PraticiensSpecialitesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PraticiensSpecialitesTable
     */
    public $PraticiensSpecialites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PraticiensSpecialites',
        'app.Praticiens',
        'app.Specialites'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PraticiensSpecialites') ? [] : ['className' => PraticiensSpecialitesTable::class];
        $this->PraticiensSpecialites = TableRegistry::getTableLocator()->get('PraticiensSpecialites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PraticiensSpecialites);

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
