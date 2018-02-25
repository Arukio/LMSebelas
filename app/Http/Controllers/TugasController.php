<?php

namespace App\Http\Controllers;

use Auth;
use App\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request){
        $data = $request->all();
        $data['creator_id'] = Auth::user()->id;

        $tugas = Tugas::create($data);

        return redirect()->route('show.kelas', $tugas->materi->kelas_id);
    }

    public function show($id){
        $tugas = Tugas::findOrFail($id);

        return view('tugas.do', compact('tugas'));
    }
}
