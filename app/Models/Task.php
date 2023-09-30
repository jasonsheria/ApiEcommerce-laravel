<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 
        'details',
        'user_id'
    ];  
    public function users(){
        return $this->belongsTo('User');
    }
    public function produits(){
        return $this->belongsToMany('App\Models\Produit');
    
}
}