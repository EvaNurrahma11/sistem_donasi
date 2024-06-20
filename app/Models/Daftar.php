<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

     /**
     * fillable
     * 
     *  @var array
     */
    protected $fillable = [
        'title',
        'image',
        'name',
        'email',
        'telepon',
        'alamat',
        'jumlah'
        
    ];
}
