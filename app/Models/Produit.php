<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable=['nom','descr','prix','categorie','img','type'];
   
    public function OtherImages(){
 
     return $this->HasMany('App\Models\OtherImage');
    }
    public function produitContenu(){

     return $this->belongsToMany('App\Models\Task');

    }
}
