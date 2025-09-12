<?php

namespace App\Http\Requests\Admin\Param;

use App\Enums\Param\ParamFilterTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'filter_type' => 'required|integer|in:' . ParamFilterTypeEnum::valuesAsString(),
        ];
    }
}
