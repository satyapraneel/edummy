<?php

namespace App\Http\Controllers;


class InvoiceController extends Controller
{
    public function getTransactionsByProfileId()
    {
        return $this->readJsonFile('getTransactionsList.json');
    }
}
