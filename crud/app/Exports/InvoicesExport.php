<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/10/2018
 * Time: 8:57 AM
 */
namespace App\Exports;

use App\Author;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection
{
    public function collection()
    {
        return Author::all();
    }
}
