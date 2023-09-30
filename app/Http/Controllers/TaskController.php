<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Task;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Task as TaskResource;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\produit_task;

class TaskController extends Controller
{
    public function index()
    {
        // $user=Auth::user()->find($request->id);

        $user=Auth::user();
        $tab=[];
        $tab=$user->id;
        $task=($user->gettasks);
        $id=$task->produits->pluck('id');
        $panier=Produit::whereIn('id',$id)->get();
        
        return response()->json(['panier'=>$panier]);
    }

    
    public function store(Request $request)
    {
        $num_panier=Auth()->user()->gettasks;
         $produit=Produit::find($request->id);
            $tab=[];
        $tab=$request->id;


         $num_panier->produits()->attach($tab);
        // $task = Auth()->user()->tasks->produit->pluck('id');
        return response()->json(['panier'=>$num_panier]);
   
}

   
public function show($id)
{
   $produit=Task::find($id);

   return response()->json($produit);
}


public function update(Request $request, Task $task)
{
    // $input = $request->all();

    // $validator = $request->validate([
    //     'name' => 'required',
    //     'details' => 'required'
    // ]);

    // if($validator){
    //     return $this->handleError("error");       
    // }

    // $task->name = $input['name'];
    // $task->details = $input['details'];
    // $task->save();
    
    // return $this->handleResponse(new TaskResource($task), 'Task successfully updated!');
}

public function destroy(Request $request)
{
    $num_panier=Auth()->user()->gettasks;
        $produit=Produit::find($request->id);
        $produit->produitContenu()->Detach();
        // $produit->delete();
    // $produit=Produit::find($request->id);
    // $tab=[];
    // $tab=$request->id;
    // $num_panier->produitContenu()->Detach($tab);

}
}
