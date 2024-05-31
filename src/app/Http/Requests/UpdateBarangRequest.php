<?php

namespace App\Http\Requests;

use App\Models\Barang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBarangRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('barang_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'age' => [
                'nullable',
                'string',
            ],
            'email' => [
                'nullable',
                'string',
            ],
            'whatsapp' => [
                'nullable',
                'string',
            ],
            'barang' => [
                'nullable',
                'string',
            ],
        ];
    }
}
