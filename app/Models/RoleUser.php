<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;
class RoleUser extends Model
{
    use HasFactory;
    
    protected $table = 'role_user';
    protected $guarded = [];
    protected $with = ['user','role']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
