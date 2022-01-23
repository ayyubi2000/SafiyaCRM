<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Permission extends Model
{
    use HasFactory;
    protected $with = ['roles']; 
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    //  $arrays = ['CREATE','UPDATE','DELETE','CHANGE_PERMISSIONS','MANAGE_REPORTS','SEE_MANAGMENT','SEND_SMS','SEE_SELLING','SEE_DASHBOARD','BASIC_ACCESS'];
    // 	foreach ($variable => $value) {
    // 		DB::table('permission')->insert([
    //         'name' => $value,
    //     ]);	
    // }
    
}
