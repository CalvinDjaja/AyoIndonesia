<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PertandinganDetailModel extends Model
{
    protected $table = 'pertandingan_detail';
    protected $primaryKey = 'id';
    use HasFactory, SoftDeletes;
}
