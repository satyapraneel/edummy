<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberLookupController extends Controller
{
    public function lookup()
    {
        return $this->readJsonFile('memberLookupData.json');
    }
}
