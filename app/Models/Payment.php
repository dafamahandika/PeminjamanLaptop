<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $table = 'payment';
    protected $fillable = [
        'nisn',
        'pemilik_rekening',
        'nominal',
        'nama_bank',
        'bukti_payment',
        'student_id',
        'status'
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
