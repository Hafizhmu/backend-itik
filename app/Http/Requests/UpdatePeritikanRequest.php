<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeritikanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('put')) {
            return [
                'tanggal' => 'nullable|string',
                'jumlah_penambahan' => 'nullable|integer',
                'jumlah_kematian' => 'nullable|integer',
                'jumlah_sakit' => 'nullable|integer',
                'jumlah_total' => 'nullable|integer'
            ];
        } else {
            return [
                'tanggal' => 'nullable|string',
                'jumlah_penambahan' => 'nullable|integer',
                'jumlah_kematian' => 'nullable|integer',
                'jumlah_sakit' => 'nullable|integer',
                'jumlah_total' => 'nullable|integer'
            ];
        }
    }
}
