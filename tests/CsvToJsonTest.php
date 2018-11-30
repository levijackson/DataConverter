<?php

namespace DataConverter\Tests\DataConversion;

use PHPUnit\Framework\TestCase;
use DataConverter\CsvToJson;

class CsvToJsonTest extends TestCase {

    public function testTransform() {
        $filePath = __DIR__ . '/TestCsv.csv';
        $transform = new CsvToJson($filePath);
        $data = $transform->transform();

        $this->assertGreaterThan(0, strlen($data));
        $data = json_decode($data, true);

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
