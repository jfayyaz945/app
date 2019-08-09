<?php

namespace App\Exports;

use App\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccountExport implements FromCollection, WithHeadings
{
    public $paginator;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $accounts = $this->paginator->getCollection();
        return $accounts;
    }

    public function headings(): array
    {
        return Account::labels();
    }
}