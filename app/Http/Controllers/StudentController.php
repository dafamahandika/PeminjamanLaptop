<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\AsalSekolah;
use App\Models\Bank;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth; 
use Hash;
use Illuminate\Support\Str;
// use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
    public function indexStudent() {
        $user = User::all();
        $student = Student::where('nisn', Auth::user()->password)->first();

        return view('user.dashboard-user', compact('user', 'student'));
    }

    public function indexLanding() {
        return view('index');
    }

    public function createStudent(){
        $data = AsalSekolah::all();
        return view('user.create',compact('data'));
    }

    public function storeDaftar(Request $request) {
        $request->validate([
            'nisn' => 'required|min:10|max:10|unique:student,nisn',
            'nama' => 'required|unique:student,nama',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|unique:student,email|email',
            'no_phone'=> 'required|numeric',
            'no_ibu'=> 'required|numeric',
            'no_ayah'=> 'required|numeric',
            'referensi' => 'required',
        ]);
        
        Student::create([
            'nisn' =>$request->nisn,
            'nama' =>$request->nama,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'email' =>$request->email,
            'asal_sekolah' =>$request->asal_sekolah,
            'no_phone' =>$request->no_phone,
            'no_ibu' =>$request->no_ibu,
            'no_ayah' =>$request->no_ayah,
            'referensi' =>$request->referensi, 
        ]);

        User::create([
            'name'  =>$request->nama,
            'email' =>$request->email,
            'password' => Hash::make($request->nisn),
            'is_admin' => 0,
        ]);
 
        return redirect()->intended('print-pdf');

    }

    public function printPdf() {
        $data = Student::latest()->get()->first();

        return view('user.pdf')->with('data', $data);

        // $pdf = Pdf::loadview('user.pdf',['data' => $data])->setpaper('A4', 'potrait');
        
        // return $pdf->download('student()->name.pdf'); 
    }

    public function createPayment() {
        $data = Bank::all();

        return view('user.create-pembayaran', compact('data'));
    }

    public function storePayment(Request $request) {
        $student = Student::where('nama', auth()->user()->name)->get()->first();
        $request->validate([
            'nisn' => 'required|numeric|unique:payment',
            'bukti_payment' => 'required|mimes:jpg,png,jpeg,|image|max:2048',
            'pemilik_rekening' => 'required',
            'nominal' => 'required|numeric',
            'nama_bank' => 'required',
        ]);

        if ($request->hasFile('bukti_payment')) {
            $bukti = $request->bukti_payment;
            $name_bukti = time().'.'.$request->bukti_payment->extension();
            $bukti->move(public_path('payments'), $name_bukti);
        } else {
            return back()->with('fail', 'Sertakan Bukti Pembayaran');
        }
        
        $payment = new Payment;
        $payment->nisn= $request->nisn;
        $payment->student_id = $student->id;
        $payment->pemilik_rekening = $request->pemilik_rekening;
        $payment->nominal = $request->nominal;
        $payment->nama_bank = $request->nama_bank;
        $payment->bukti_payment = $name_bukti;
        $payment->save();
        
        $student_nisn = $request->nisn;
        Student::where('nisn', $student_nisn)->update([
            'status' => 'Pending'
        ]);

        

        return redirect(route('indexStudent'))
        ->with('success', 'Pembayaran berhasil, harap tunggu pembayaran sedang di verifikasi');
    }

}
