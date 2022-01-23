<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;
use App\Models\Customer;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['customer', 'product' , 'user'];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }  
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
