<?php

namespace App\Http\Controllers;

use App\Models\Peritikan;
use App\Http\Resources\PeritikanResource;
use App\Http\Requests\StorePeritikanRequest;
use App\Http\Requests\UpdatePeritikanRequest;

class PeritikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peritikan = Peritikan::all();
        return PeritikanResource::collection($peritikan);
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
    public function store(StorePeritikanRequest $request)
    {
        try {
            Peritikan::create([
                'tanggal' => $request->tanggal,
                'jumlah_penambahan' => $request->jumlah_penambahan,
                'jumlah_kematian' => $request->jumlah_kematian,
                'jumlah_sakit' => $request->jumlah_sakit,
                'jumlah_total' => $request->jumlah_total
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
    public function show(Peritikan $peritikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peritikan $peritikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeritikanRequest $request, $id)
    {
        try {
            $update = Peritikan::find($id);
            if (!$update) {
                return response()->json([
                    'message' => "Data dengan ID $id tidak ditemukan"
                ], 404);
            }

            $update->tanggal = $request->tanggal;
            $update->jumlah_penambahan = $request->jumlah_penambahan;
            $update->jumlah_sakit = $request->jumlah_sakit;
            $update->jumlah_kematian = $request->jumlah_kematian;
            $update->jumlah_total = $request->jumlah_total;

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
            $delete = Peritikan::find($id);
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
