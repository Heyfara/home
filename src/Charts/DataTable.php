<?php
namespace App\Charts;

class DataTable
{
    public $cols = array();
    public $rows = array();

    /**
     * Add a row to the table
     *
     * The order and number of values must match 
     * the cols order and number
     */
    public function addRow(array $values)
    {
        $cell = array();
        foreach($values as $v) {
            $cell[] = array('v' => $v);
        }
        $this->rows[] = array('c' => $cell);
    }

    /**
     * Add a col to the table
     */
    public function addCol($type, $label = '', $id = '', $pattern = '')
    {
        $this->cols[] = array(
            'type' => $type,
            'label' => $label,
            'id' => $id,
            'pattern' => $pattern
        );
    }
}
