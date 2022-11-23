<?php

namespace App\Models\AES;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'size', 'extention', 'path','status',
    ];
}
