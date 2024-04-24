<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransaksiRequest extends FormRequest
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
                'tanggal_transaksi' => 'required|string',
                'nama_pembeli' => 'required|string',
                'alamat_pembeli' => 'required|string',
                'jumlah_telur' => 'required|integer',
                'harga_jual' => 'required|integer',
            ];
        } else {
            return [
                'tanggal_transaksi' => 'required|string',
                'nama_pembeli' => 'required|string',
                'alamat_pembeli' => 'required|string',
                'jumlah_telur' => 'required|integer',
                'harga_jual' => 'required|integer',
            ];
        }
    }
}
