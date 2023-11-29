<?php

namespace App\Http\Controllers;

use App\Models\Pilot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PesawatController extends Controller
{
    public function index(Request $request) {
        $datas = DB::select('select * from pesawat');
        
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $datas = DB::table('pesawat')
                ->where('maskapai', 'like', "%$katakunci%")
                ->orWhere('tipe', 'like', "%$katakunci%")
                ->orWhere('id_pesawat', 'like', "%$katakunci%")
                ->paginate(5);
        } else {
            $datas = DB::select('select * from pesawat where is_deleted = 0');
        }

        return view('pesawat.index')
            ->with('datas', $datas);
    }

    
    public function create() {
        return view('pesawat.add');
    }

    public function store(Request $request) {
        $request->validate([
            'maskapai' => 'required',
            'tipe' => 'required',
            'id_hangar' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pesawat(maskapai, tipe, id_hangar) VALUES (:maskapai, :tipe, :id_hangar)',
        [
            'maskapai' => $request->maskapai,
            'tipe' => $request->tipe,
            'id_hangar' => $request->id_hangar,
        ]
        );

        return redirect()->route('pesawat.index')->with('success', 'Data Pesawat berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pesawat')->where('id_pesawat', $id)->first();
        return view('pesawat.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pesawat' => 'required',
            'maskapai' => 'required',
            'tipe' => 'required',
            'id_hangar' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pesawat SET id_pesawat = :id_pesawat, maskapai = :maskapai, tipe = :tipe, id_hangar = :id_hangar WHERE id_pesawat = :id',
        [
            'id' => $id,
            'id_pesawat' => $request->id_pesawat,
            'maskapai' => $request->maskapai,
            'tipe' => $request->tipe,
            'id_hangar' => $request->id_hangar,  
          ]
        );

        return redirect()->route('pesawat.index')->with('success', 'Data Pesawat berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pesawat WHERE id_pesawat = :id_pesawat', ['id_pesawat' => $id]);

        return redirect()->route('pesawat.index')->with('success', 'Data Pesawat berhasil dihapus');
    }

    public function softDelete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pesawat SET is_deleted = 1
        WHERE id_pesawat = :id_pesawat', ['id_pesawat' => $id]);
        return redirect()->route('pesawat.index')->with('success', 'Data Pesawat berhasil dihapus sementara');
    }

    public function restore()
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('pesawat')
        ->update(['is_deleted' => 0]);
        return redirect()->route('pesawat.index')->with('success', 'Data Pesawat berhasil direstore');
    }
}
