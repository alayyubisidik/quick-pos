<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class ProductsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows) {
        foreach ($rows as $row) {
            $category = Category::where("name", $row["category"])->first();

            if ($category != null) {
                Product::create([
                    "name" => $row["name"],
                    "slug" => Str::slug($row["name"]),
                    "category_id" => $category["id"],
                    "price" => $row["price"],
                    "stock" => $row["stock"],
                    "min_stock" => $row["min_stock"],
                ]);
            }
        }
    }
}
