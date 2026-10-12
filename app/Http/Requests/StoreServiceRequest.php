<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

/**
 * @method \App\Models\User|null user($guard = null)
 */
class StoreServiceRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->role === 'farmer';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_type_id' => 'required|exists:service_types,id',
            'description' => 'required|string|max:2000|min:30',
            'is_calamity' => 'sometimes|boolean'
        ];
    }
}
