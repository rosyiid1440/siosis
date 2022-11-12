<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kandidat';

    protected $guarded = ['id','created_at','updated_at','deleted_at'];
}