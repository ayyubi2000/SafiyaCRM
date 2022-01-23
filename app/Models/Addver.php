<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addver extends Model
{
    use HasFactory;

    protected $table = 'addver';

    protected $guarded = ['updated_at', 'created_at'];
}
