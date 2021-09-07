<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiturPaket extends Model
{
    use HasFactory;
    protected $table = 'fitur_paket';
    protected $fillable = ['fitur', 'paket_id'];
}
