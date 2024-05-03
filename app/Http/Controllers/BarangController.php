<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = DB::table('barang')
                         ->join('satuan', 'barang.satuan_barang_id', '=', 'satuan.id')
                         ->select('barang.*', 'satuan.nama_satuan')
                         ->get();
       
        return view('pages.tables',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $satuans     = DB::table('satuan')
        ->select('*')
        ->get();
        return view('pages.addBarang', compact('satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
// Controller BarangController.php
public function store(Request $request)
{
    $request->validate([
        'nama_barang' => 'required|string',
        'harga_barang' => 'required',
        'deskripsi_barang' => 'required|string',
        'satuan_barang_id' => 'required', // Pastikan bahwa satuan_barang_id ada dalam tabel 'satuan'
    ]);
    
    try {
        DB::beginTransaction();
    
        // Mendapatkan data dari request
        $nama_barang = $request->input('nama_barang');
        $harga_barang = $request->input('harga_barang');
        $deskripsi_barang = $request->input('deskripsi_barang');
        $satuan_barang_id = $request->input('satuan_barang_id');
    
        // Menjalankan kueri INSERT menggunakan metode DB::insert()
        DB::insert('INSERT INTO barang (nama_barang, harga_barang, deskripsi_barang, satuan_barang_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)', [$nama_barang, $harga_barang, $deskripsi_barang, $satuan_barang_id, now(), now()]);
    
        DB::commit();
    
        // Redirect ke halaman index barang
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    } catch (\Throwable $th) {
        DB::rollback();
        dd($th->getMessage());
    
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Barang: ' . $th->getMessage());
    }
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
    public function edit($id)
    {
        try {
            // Ambil data barang berdasarkan ID menggunakan model Eloquent
            $barang = Barang::findOrFail($id);
            
            // Ambil semua satuan untuk pilihan dropdown menggunakan model Eloquent
            $satuans = Satuan::all();
    
            return view('pages.editBarang', compact('barang', 'satuans'));
        } catch (\Throwable $th) {
            // Tangani kesalahan jika terjadi
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'harga_barang' => 'required',
            'deskripsi_barang' => 'required|string',
            'satuan_barang_id' => 'required',
        ]);
    
        try {
            DB::beginTransaction();
    
            // Ambil data barang berdasarkan ID
            $barang = Barang::findOrFail($id);
    
            // Update data barang
            $barang->nama_barang = $request->input('nama_barang');
            $barang->harga_barang = $request->input('harga_barang');
            $barang->deskripsi_barang = $request->input('deskripsi_barang');
            $barang->satuan_barang_id = $request->input('satuan_barang_id');
            $barang->save();
    
            DB::commit();
    
            return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui Barang: ' . $th->getMessage());
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
    
            // Ambil data barang berdasarkan ID
            $barang = Barang::findOrFail($id);
    
            // Hapus data barang
            $barang->delete();
    
            DB::commit();
    
            return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus Barang: ' . $th->getMessage());
        }
    }
    
}
