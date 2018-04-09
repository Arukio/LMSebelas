<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return redirect('admin/kelas');
    }
    
    public function allKelas(){
        $kelas = Kelas::withCount('Anggota_kelas')->get();
        
        return view('admin.kelas', compact('kelas'));
    }
    
    public function deleteKelas($id){
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->back();
    }
    
    public function allUser(){
        $user = User::all();
        
        return view('admin.user', compact('user'));
    }
    
    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
    
    public function getUserMenu($id){
        return view('admin.usermenu', compact('id'));
    }
}