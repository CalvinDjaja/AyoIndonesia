<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemainModel extends Model
{
    protected $table = 'pemain_detail';
    protected $primaryKey = 'id';
    use HasFactory, SoftDeletes;
}
