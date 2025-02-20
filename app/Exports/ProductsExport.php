<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    public function query()
    {
        return Product::query();
    }

    public function map($product): array {
        return [
            $product->id,
            $product->name,
            $product->category->name,
            $product->price,
            $product->stock,
            $product->min_stock,
        ];
    }

    public function headings(): array {
        return [
            "id",
            "name",
            "category",
            "price",
            "stock",
            "min_stock",
        ];
    }


}
