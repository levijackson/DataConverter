<?php

namespace DataConverter\Tests;

use PHPUnit\Framework\TestCase;
use DataConverter\CsvToArray;

class CsvToArrayTest extends TestCase {

    public function testTransform() {
        $filePath = __DIR__ . '/TestCsv.csv';
        $transform = new CsvToArray($filePath);
        $data = $transform->transform();
        
        $this->assertCount(3, $data);
        foreach ($data as $item) {
            $this->assertArrayHasKey('StartDate', $item);
            $this->assertArrayHasKey('EndDate', $item);
            $this->assertArrayHasKey('Cost', $item);
            $this->assertArrayHasKey('DeliveryCost', $item);
            $this->assertArrayHasKey('SupplyCost', $item);
            $this->assertArrayHasKey('Volume', $item);
        }
    }

}
