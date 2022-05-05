<?php

namespace App\Http\Controllers;


class InvoiceController extends Controller
{
    public function getTransactionsByProfileId()
    {
        $data = $this->readJsonFile('getTransactionsList.json', false);
        foreach($data['Transactions'] as &$transactions) {
            $transactions['TransactionNumber'] = 'TXN-316'.rand(1000, 9999);
        }
        
        return $data;
    }

    public function getInvoiceDetails()
    {
        $data = $this->readJsonFile('getInvoiceDetails.json', false);
        $data['TransactionNumber'] = 'TXN-316'.rand(1000, 9999);
        return $data;
    }
}
