<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\OtherImages;
use Illuminate\Http\Request;

class OtherImageController extends Controller
{
    public function index($id){
        $produit=Produit::find($id);
        $alprod=$produit->OtherImages()->pluck('id');
        $aliprod=OtherImages::whereIn('id',$alprod)->get();
        return response()->json($aliprod);
    }
}
