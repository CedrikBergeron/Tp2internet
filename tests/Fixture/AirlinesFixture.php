<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AirlinesFixture
 */
class AirlinesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'booking' => 'ID obce', 'autoIncrement' => true, 'precision' => null],
        'region_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'booking' => 'region', 'precision' => null, 'autoIncrement' => null],
        'country_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'booking' => 'country', 'precision' => null, 'autoIncrement' => null],
        'code' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'collate' => 'utf8_czech_ci', 'booking' => 'Code obce', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'utf8_czech_ci', 'booking' => 'Name obce', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'region_id' => ['type' => 'index', 'columns' => ['region_id'], 'length' => []],
            'country_id' => ['type' => 'index', 'columns' => ['country_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'airline_ibfk_1' => ['type' => 'foreign', 'columns' => ['region_id'], 'references' => ['regions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'airline_ibfk_2' => ['type' => 'foreign', 'columns' => ['country_id'], 'references' => ['countries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_czech_ci'
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
                'region_id' => 1,
                'country_id' => 1,
                'code' => 'Lorem ips',
                'name' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
