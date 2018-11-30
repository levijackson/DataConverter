<?php

namespace DataConverter;

class CsvToJson extends CsvToArray {

    public function transform () {
        $data = parent::transform();
        if (is_array($data) and !empty($data)) {
            return json_encode($data);
        }

        return null;
    }
    
}