<?php 
namespace App\Exports;

use App\Models\ProductModel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportDemo implements FromCollection,WithHeadings
{
    public function collection()
    {
        return ProductModel::leftJoin('kho','product.product_code','kho.product_code')
        ->get();
    }
    public function headings(): array
    {
        return [

            'Code',

            'Description',

            'Pos',

            'Mod A',

            'Mod B',

            'Charge',
            'a',
            'b',
            'c'

        ];

    }
}
