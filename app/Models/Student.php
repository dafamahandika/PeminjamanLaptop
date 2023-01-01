<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class Student extends Authenticatable
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'nisn',
        'nama',
        'jenis_kelamin',
        'email',
        'asal_sekolah',
        'no_phone',
        'no_ibu',
        'no_ayah',
        'referensi',

    ];

    public function getCreatedAtAttribute() {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }
       
}
