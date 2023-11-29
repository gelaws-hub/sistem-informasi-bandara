<?php

namespace App\Http\Controllers;

use App\Models\Pilot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PilotController extends Controller
{
    public function index(Request $request) {
        $datas = DB::select('select * from pilot');
        
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $datas = DB::table('pilot')
                ->where('nama', 'like', "%$katakunci%")
                ->orWhere('jam_terbang', 'like', "%$katakunci%")
                ->paginate(5);
        } else {
            $datas = DB::select('select * from pilot where is_deleted = 0');
        }

        return view('pilot.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('pilot.add');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jam_terbang' => 'required',
            'id_pesawat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pilot(nama, jam_terbang, id_pesawat) VALUES (:nama, :jam_terbang, :id_pesawat)',
        [
            'nama' => $request->nama,
            'jam_terbang' => $request->jam_terbang,
            'id_pesawat' => $request->id_pesawat,
        ]
        );
        return redirect()->route('pilot.index')->with('success', 'Data Pilot berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pilot')->where('id_pilot', $id)->first();

        return view('pilot.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pilot' => 'required',
            'nama' => 'required',
            'jam_terbang' => 'required',
            'id_pesawat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pilot SET id_pilot = :id_pilot, nama = :nama, jam_terbang = :jam_terbang, id_pesawat = :id_pesawat WHERE id_pilot = :id',
        [
            'id' => $id,
            'id_pilot' => $request->id_pilot,
            'nama' => $request->nama,
            'jam_terbang' => $request->jam_terbang,
            'id_pesawat' => $request->id_pesawat,        
            ]
        );

        return redirect()->route('pilot.index')->with('success', 'Data Admin berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pilot WHERE id_pilot = :id_pilot', ['id_pilot' => $id]);
        return redirect()->route('pilot.index')->with('success', 'Data Pilot berhasil dihapus');
    }

    public function softDelete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pilot SET is_deleted = 1
        WHERE id_pilot = :id_pilot', ['id_pilot' => $id]);
        return redirect()->route('pilot.index')->with('success', 'Data Pilot berhasil dihapus sementara');
    }

    public function restore()
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('pilot')
        ->update(['is_deleted' => 0]);
        return redirect()->route('pilot.index')->with('success', 'Data Pilot berhasil direstore');
    }
}