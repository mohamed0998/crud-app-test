<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','user_id'];
    use HasFactory;

    public function user() {
    
        return $this->belongsTo(User::class);
   
        }
}
