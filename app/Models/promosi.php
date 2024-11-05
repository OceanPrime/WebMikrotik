<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promosi extends Model
{
    use HasFactory;

    protected $table = 'promosi';
    protected $fillable = ['gambar_promosi', 'deskripsi'];
}
