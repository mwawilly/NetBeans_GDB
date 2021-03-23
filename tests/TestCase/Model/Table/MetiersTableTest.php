<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MetiersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MetiersTable Test Case
 */
class MetiersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MetiersTable
     */
    public $Metiers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Metiers',
        'app.Praticiens'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Metiers') ? [] : ['className' => MetiersTable::class];
        $this->Metiers = TableRegistry::getTableLocator()->get('Metiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Metiers);

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
}
