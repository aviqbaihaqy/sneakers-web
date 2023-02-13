<?php

namespace App\Http\Requests\Admin\Product;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreProduct extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.product.create');
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'brand' => ['required'],
            'color' => ['required'],
            'description' => ['required', 'string'],
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'shortName' => ['required', 'string'],
            'type' => ['required', 'string'],
            'assets' => ['nullable'],
            'sizes' => ['required'],
        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        $sanitized['brand_id'] = $sanitized['brand']['id'];
        $sanitized['color'] = $sanitized['color']['id'];
        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
