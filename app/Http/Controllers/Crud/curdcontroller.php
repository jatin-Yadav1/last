<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\crud;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class curdcontroller extends Controller
{
    function index(){
        return view('portal.dashboard.crud');
    }


    function Add(Request $request){
        $detail = new crud;
        $detail->name = $request->name; 
        $detail->Institute = $request->Institute; 
        $detail->Degree = $request->Degree; 
        $detail->Start = $request->Start; 
        $detail->End = $request->End; 
        $detail->save();
        return redirect('portal/show');

    }
     function show() {
    $posts = crud::all();
    // dd($posts);
    return view('portal.dashboard.show',['name'=>$posts]);
    
    
}

  function update($id){
  $update = DB::table('cruds')->where('id', $id)->get();

return view('portal.dashboard.crud', ["name" => $update]);
    


  }
 
  public function delete($id){
    $device = crud::find($id);
    $result2 = $device->delete();
    if ($result2) {
        return redirect('portal/show');
    }
}
  
}
