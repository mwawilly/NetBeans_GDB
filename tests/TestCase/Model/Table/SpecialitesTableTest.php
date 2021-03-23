<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecialitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecialitesTable Test Case
 */
class SpecialitesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecialitesTable
     */
    public $Specialites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Specialites',
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
        $config = TableRegistry::getTableLocator()->exists('Specialites') ? [] : ['className' => SpecialitesTable::class];
        $this->Specialites = TableRegistry::getTableLocator()->get('Specialites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Specialites);

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
