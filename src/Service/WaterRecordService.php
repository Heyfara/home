<?php

namespace App\Service;

use Entity\WaterRecord;

class WaterRecordService
{

    public function addRecord($volume)
    {
        $record = new WaterRecord($volume);
        // Save to db
        // ...
    }
}
