<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Peminjaman;
use App\Models\AsalSekolah;
use App\Models\User;
use App\Models\Bank;



class AdminController extends Controller
{
    public function indexStudent(){
       
        $data = Student::all();

        return view('admin.data-student', compact('data'));
    }

    public function indexDataSekolah(){
       
        $data = AsalSekolah::all();

        return view('admin.data-sekolah', compact('data'));
    }

    public function indexDataBank(){
       
        $data = Bank::all();

        return view('admin.data-bank', compact('data'));
    }

    public function createDataBank() {
        return view('admin.create-data-bank');
    }

    public function storeDataBank(Request $request) {
        Bank::create([
            'nama_bank' =>$request->nama_bank,
        ]);

        return redirect(route('indexBank'));
    }
    
    public function deleteDataBank($id){
        Bank::where('id', $id)->Delete();
        return redirect(route('indexBank'));
    }

    public function indexDataLaboran(){
       
        $data = User::all();

        return view('admin.data-laboran', compact('data'));
    }
    public function createDataLaboran(){
        return view('admin.create-account-laboran');
    }

    public function storeDataLaboran(Request $request){

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => 0,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('account'));   
    }


    public function editLaboranData($id){
        $data = User::get();
        $data = User::where('id', $id)->first();
        return view('admin.edit-laboran', ['data' => $data]);
    }

    public function updateLaboranData(Request $request, $id){

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => 0,
            'password' => Hash::make($request->password),
           
        ]);
        return redirect(route('account'));
    }

    public function deleteLaboranData($id){
        User::where('id', $id)->Delete();
        return redirect(route('account'));
    }
    

    public function createDataSekolah(){
        return view('admin.create-data-sekolah');
    }

    public function storeDataSekolah(Request $request){

        AsalSekolah::create([
            'nama_sekolah' => $request->nama_sekolah
           
        ]);
        return redirect(route('dataSekolah'));   
    }

    public function deleteDataSekolah($id){
        AsalSekolah::where('id', $id)->Delete();
        return redirect(route('dataSekolah'));
    }

}
