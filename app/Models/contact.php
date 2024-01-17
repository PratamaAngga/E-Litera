<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_contact';
    protected $fillable = [
        'id_user',
        'deskripsi'
    ];
}
