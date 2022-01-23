<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;
use App\Models\Messages;
use App\Models\Note;
class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['messages'];


    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
