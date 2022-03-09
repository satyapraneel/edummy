<?php

namespace App\Http\Controllers\Traits;

trait ReadJsonFiles {
    function readJsonFile($fileName) {
        $data = file_get_contents(storage_path('epsilon'). "/". $fileName);
        return response()->json(json_decode($data, true), 200);
    }
}