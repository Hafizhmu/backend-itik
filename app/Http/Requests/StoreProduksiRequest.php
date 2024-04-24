<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduksiRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'tanggal_produksi' => 'required|string',
                'jumlah_telur' => 'required|numeric',
                'berat_total' => 'required|numeric',
                'harga_telur' => 'required|numeric',
            ];
        } else {
            return [
                'tanggal_produksi' => 'required|string',
                'jumlah_telur' => 'required|numeric',
                'berat_total' => 'required|numeric',
                'harga_telur' => 'required|numeric',
            ];
        }
    }
}
