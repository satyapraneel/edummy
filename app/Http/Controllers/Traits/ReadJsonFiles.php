<?php

namespace App\Http\Controllers\Traits;

trait ReadJsonFiles {
    function readJsonFile($fileName, $jsonEncode = true) {
        $data = file_get_contents(storage_path('epsilon'). "/". $fileName);
        if($jsonEncode) {
            return response()->json(json_decode($data, true), 200);
        }
        return json_decode($data, true);
    }
}