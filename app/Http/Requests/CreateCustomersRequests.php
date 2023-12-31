<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateCustomersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode'          => Rule::unique('customers', 'kode')->ignore($this->customer),
            'nama'          => 'required',
            'telepon'       => 'max:13'
        ];
    }

    public function messages()
    {
        return [
            'kode.unique'            => 'Kode customer sudah digunakan',
            'nama.required'          => 'Nama customer wajib diisi.',
            'telepon.max'            => 'Telepon maksimal 13 digit.',
        ];
    }
}