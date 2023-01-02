<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Peminjaman;
use App\Models\AsalSekolah;
use App\Models\User;
use App\Models\Bank;
use App\Models\Payment;



class AdminController extends Controller
{
    public function indexAdmin(){
       
        $data = Student::latest()->get();

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

    public function indexPayment() {
        $payments = Payment::latest()->get();
        return view('admin.data-payments', compact('payments'));
    }

    public function validationPayment($nisn) {
        Student::where('nisn', $nisn)->update([
            'status' => 'Validasi',
            'validator' => "Admin", 
        ]); 
        Payment::where('nisn', $nisn)->update([
            'status' => 'validasi',
        ]);

        return redirect()->route('indexAdmin');
    }
    
    public function rejectPayment($nisn) {
        Student::where('nisn', $nisn)->update([
            'status' => 'Tolak',
            'validator' => "Admin",
        ]);
        
        Payment::where('nisn', $nisn)->update([
            'status' => 'tolak',
        ]);

        return redirect()->route('indexAdmin');
    }

    public function showStudent($nisn) {
        $student = Student::where('nisn', $nisn)->first();

        return view('admin.show-student', compact('student'));
    }

}