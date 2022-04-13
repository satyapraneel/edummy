<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MemberLookupController extends Controller
{
    public function lookup()
    {
        return $this->readJsonFile('memberLookupData.json');
    }

    public function memberEnrollment() {
        $content = $this->readJsonFile('memberEnrollment.json', false);
        $content['CardNumber'] = "180029392929".rand(1000, 9999);
        $content['ProfileId'] = "e7114135-4c55-4af6-bd91-fddf768a".rand(1000, 9999);
        return $content;
    }

    public function changeLinkStatus(Request $request) {
        return [
            "ProfileId" => $request->input('ProfileId'),
            "SuccessMsg" => "Member details are updated successfully"
        ];
            
    }
}
