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
     * @var int $amountOfBaseTableSize The amount of tables with with the size.
     */
    public $amountOfTables;
    /**
     * @var int $tableSize The amount of people on a table.
     */
    public $tableSize;

    /**
     * TableSize constructor.
     * @param $amountOfTables int The amount of tables with with the size.
     * @param $tableSize int The amount of people on a table.
     */
    public function __construct($amountOfTables, $tableSize)
    {
        $this->tableSize = $tableSize;
        $this->amountOfTables = $amountOfTables;
    }
}