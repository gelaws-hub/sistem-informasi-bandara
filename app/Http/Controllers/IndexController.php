<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $joins = DB::table('pilot')
            ->join('pesawat', 'pilot.id_pesawat', '=', 'pesawat.id_pesawat')
            ->join('hangar','pesawat.id_hangar','=','hangar.id_hangar')
            ->select('pesawat.*', 'hangar.*', 'pilot.nama','pilot.jam_terbang')
            ->where('pilot.is_deleted', '0')
            ->get();

        return view('index')
        ->with('joins', $joins);
    }
}
