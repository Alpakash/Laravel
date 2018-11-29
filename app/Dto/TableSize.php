<?php
/**
 * Created by PhpStorm.
 * User: ricjo
 * Date: 29-11-2018
 * Time: 12:02
 */

namespace App\Dto;


class TableSize
{
    /**
     * @var int $tableSize The amount of people on a table.
     */
    public $tableSize;
    /**
     * @var int $amountOfBaseTableSize The amount of tables with with the size.
     */
    public $amountOfTables;

    /**
     * TableSize constructor.
     * @param $tableSize int The amount of people on a table.
     * @param $amountOfTables int The amount of tables with with the size.
     */
    public function __construct($tableSize, $amountOfTables)
    {
        $this->tableSize = $tableSize;
        $this->amountOfTables = $amountOfTables;
    }
}