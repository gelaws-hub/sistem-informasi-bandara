<?php

namespace App\Http\Controllers;

use App\Models\Hangar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HangarController extends Controller
{
    public function index(Request $request) {
        $datas = DB::select('select * from hangar');
        
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $datas = DB::table('hangar')
                ->where('bandara', 'like', "%$katakunci%")
                ->orWhere('terminal', 'like', "%$katakunci%")
                ->paginate(5);
        } else {
            $datas = DB::select('select * from hangar where is_deleted = 0');
        }

        return view('hangar.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('hangar.add');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_hangar' => 'required',
            'terminal' => 'required',
            'bandara' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO hangar(nama_hangar, terminal, bandara) VALUES (:nama_hangar, :terminal, :bandara)',
        [

            'nama_hangar' => $request->nama_hangar,
            'terminal' => $request->terminal,
            'bandara' => $request->bandara,

        ]
        );

        return redirect()->route('hangar.index')->with('success', 'Data Hangar berhasil disimpan');
    }
    public function edit($id) {
        $data = DB::table('hangar')->where('id_hangar', $id)->first();

        return view('hangar.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_hangar' => 'required',
            'nama_hangar' => 'required',
            'terminal' => 'required',
            'bandara' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE hangar SET id_hangar = :id_hangar, nama_hangar = :nama_hangar, terminal = :terminal, bandara = :bandara WHERE id_hangar = :id',
        [
            'id' => $id,
            'id_hangar' => $request->id_hangar,
            'nama_hangar' => $request->nama_hangar,
            'terminal' => $request->terminal,
            'bandara' => $request->bandara,
        ]
        );

        return redirect()->route('hangar.index')->with('success', 'Data Hangar berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM hangar WHERE id_hangar = :id_hangar', ['id_hangar' => $id]);

        return redirect()->route('hangar.index')->with('success', 'Data Hanger berhasil dihapus');
    }

    public function softDelete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE hangar SET is_deleted = 1
        WHERE id_hangar = :id_hangar', ['id_hangar' => $id]);
        return redirect()->route('hangar.index')->with('success', 'Data Hangar berhasil dihapus sementara');
    }

    public function restore()
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('hangar')
        ->update(['is_deleted' => 0]);
        return redirect()->route('hangar.index')->with('success', 'Data Hangar berhasil direstore');
    }
}
