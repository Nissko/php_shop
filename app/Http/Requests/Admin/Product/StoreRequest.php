<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product.title' => 'required|string',
            'product.description' => 'required|string',
            'product.content' => 'required|string',
            'product.price' => 'required|numeric',
            'product.old_price' => 'required|numeric',
            'product.qty' => 'required|integer',
            'product.category_id' => 'required|integer:|exists:categories,id',
            'product.product_group_id' => 'required|integer|exists:product_groups,id',
        ];
    }
}
