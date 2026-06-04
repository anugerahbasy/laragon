<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grafikmhs = DB::select("SELECT prodis.nama_prodi, 
                                COUNT(*) as jumlah_mhs 
                                FROM mahasiswas
                                JOIN prodis 
                                ON mahasiswas.prodi_id = prodis.id
                                GROUP BY prodis.nama_prodi");

        $grafikmhspertahun = DB::select("SELECT LEFT(mahasiswas.npm,2) as tahun_angkatan, 
                                COUNT(*) as jumlah_mhs 
                                FROM mahasiswas
                                JOIN prodis ON mahasiswas.prodi_id = prodis.id
                                GROUP BY LEFT(mahasiswas.npm,2)");
        
        $grafiktrenmahasiswa = DB::select('SELECT prodis.nama_prodi, 
            SUM(CASE WHEN LEFT(mahasiswas.npm,2) = 23 THEN 1 ELSE 0 END) as jmhs_2023, 
            SUM(CASE WHEN LEFT(mahasiswas.npm,2) = 24 THEN 1 ELSE 0 END) as jmhs_2024,
            SUM(CASE WHEN LEFT(mahasiswas.npm,2) = 25 THEN 1 ELSE 0 END) as jmhs_2025
            FROM mahasiswas
            JOIN prodis ON mahasiswas.prodi_id = prodis.id
            GROUP BY prodis.nama_prodi');

        return view('dashboard', compact('grafikmhs','grafikmhspertahun', 'grafiktrenmahasiswa'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
