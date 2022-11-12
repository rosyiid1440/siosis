<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'periode';

    protected $guarded = ['id','created_at','updated_at','deleted_at'];
}