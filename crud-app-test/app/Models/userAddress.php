<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userAddress extends Model
{   
    protected $fillable = ['country','state','adressLine','zipCode','user_id'];
    use HasFactory;

    public function user() {
    
        return $this->belongsTo(User::class);
   
        }
}
