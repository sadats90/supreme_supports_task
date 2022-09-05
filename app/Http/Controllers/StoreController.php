<?php

namespace App\Http\Controllers;
use App\Imports\StoresImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Store;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {

        $stores = Store::all();
        return view('store.index',['stores'=>$stores]);
    }

    public function import(Request $request) 


    {
        $file = $request->file('file');
        

        Excel::import(new StoresImport, $file);
        
        return redirect('/import')->with('success', 'All good!');
    }

    public function edit($id)
    {
        $stores = Store::find($id);
     
       
        return view('store.edit',['stores'=>$stores]);
    }



    public function update(Request $request,$id)
    {

        
        $stores = Store::find($id);

        $stores->store_id = $request->input('store_id');
        $stores->title = $request->input('title');
        $stores->address = $request->input('address');
        $stores->suburb = $request->input('suburb');
        $stores->state = $request->input('state');
        $stores->zip = $request->input('zip');
        $stores->lat = $request->input('lat');
        $stores->lng = $request->input('lng');

       
        
        $stores->update();
     
        return redirect('/import');
       
    }


    public function detail($id)
    {
       $store = Store::find($id);
       return response()->json(
        [
            'status' => 200,
            'store' => $store,
        ]
        );
    }
    
    function search_store(Request $request)
    {
        $query = $request->get('query');

        $store= Store::where('store_id','like','%'.$query.'%')
                ->orWhere('title','like','%'.$query.'%')
                ->get();

          
        
      

        return response()->json(
            [
                'status' => 200,
                'store' => $store,
            ]
            );
     
    }
    


}
