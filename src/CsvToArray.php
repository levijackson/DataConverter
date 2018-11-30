<?php

namespace DataConverter;

use DataConverter\Exception\FileDoesNotExist;

class CsvToArray implements Converter {

    private $FilePath;

    public function __construct ($filePath) {
        $this->FilePath = $filePath;

        if (!file_exists($this->FilePath)) {
            throw new FileDoesNotExist($filePath . ' does not exist', 404);
        }
    }

    public function transform () {
        $data = array_map('str_getcsv', file($this->FilePath));
        
        array_walk($data, function(&$item) use ($data) {
            // $data[0] is the first row in the csv file, which should be the column/key names
          $item = array_combine($data[0], $item);
        });

        // remove the first entry with the colum headings
        array_shift($data);

        return $data;
    }
}