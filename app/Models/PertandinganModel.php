<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PertandinganModel extends Model
{
    protected $table = 'pertandingan';
    protected $primaryKey = 'id';
    use HasFactory, SoftDeletes;
}
