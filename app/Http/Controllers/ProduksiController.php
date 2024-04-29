<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Http\Resources\ProduksiResource;
use App\Http\Requests\StoreProduksiRequest;
use App\Http\Requests\UpdateProduksiRequest;
use App\Models\Transaksi;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produksi = Produksi::all();
        return ProduksiResource::collection($produksi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduksiRequest $request)
    {
        try {
            Produksi::create([
                'jumlah_telur' => $request->jumlah_telur,
                'berat_total' => $request->berat_total,
                'harga_telur' => $request->harga_telur,
                'tanggal_produksi' => $request->tanggal_produksi
            ]);

            //return response json
            return response()->json([
                'message' => 'Data Berhasil ditambahkan'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Terjadi Kesalahan" . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produksi $produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produksi $produksi)
    {
        //
    }
    public function stok()
    {
        $produksi = Produksi::sum('jumlah_telur');

        $transaksi = Transaksi::sum('jumlah_telur');

        $stok = $produksi - $transaksi;

        return response()->json($stok, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduksiRequest $request, $id)
    {
        try {
            $update = Produksi::find($id);
            if (!$update) {
                return response()->json([
                    'message' => "Data dengan ID $id tidak ditemukan"
                ], 404);
            }

            $update->jumlah_telur = $request->jumlah_telur;
            $update->berat_total = $request->berat_total;
            $update->harga_telur = $request->harga_telur;
            $update->tanggal_produksi = $request->tanggal_produksi;

            $update->save();

            // Return success response
            return response()->json([
                'message' => 'Data berhasil diperbarui'
            ], 200);
        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui data', $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $delete = Produksi::find($id);
            if (!$delete) {
                return response()->json([
                    'message' => "Data dengan ID $id tidak ditemukan"
                ], 404);
            }

            $delete->delete();

            // Return success response
            return response()->json([
                'message' => 'Data berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus data', $e->getMessage()
            ], 500);
        }
    }
}
