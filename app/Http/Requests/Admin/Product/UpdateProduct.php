<?php

namespace App\Http\Requests\Admin\Product;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProduct extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.product.edit', $this->product);
    }

    /**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array
    {
        return [
            'brand' => ['sometimes'],
            'color' => ['sometimes'],
            'description' => ['sometimes', 'string'],
            'name' => ['sometimes', 'string'],
            'price' => ['sometimes', 'numeric'],
            'shortName' => ['sometimes', 'string'],
            'type' => ['sometimes', 'string'],
            'assets' => ['sometimes'],
            'sizes' => ['sometimes'],

        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array
    {
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
