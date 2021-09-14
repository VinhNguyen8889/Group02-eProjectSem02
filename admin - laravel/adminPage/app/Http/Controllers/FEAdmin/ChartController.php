<?php

namespace App\Http\Controllers\FEAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chart;

class ChartController extends Controller
{
    public function allSelect(){
        $result = Chart::all();
        return $result;
    } //end method


    public function AllChart(){
        $result = Chart::all();

        return view('backend/chart/all_chart', compact('result'));
    }

    public function AddChart(){
        return view('backend/chart/add_chart');
    }

    
    public function StoreChart(Request $request){

        $request->validate(
            ['y_data'=>'required|unique:charts',
            'x_data' => 'required',
        ]
        );


        Chart::insert([
            'x_data'=>$request->x_data,
            'y_data'=>$request->y_data,

        ]); 

        $notification = array(
            'message' => 'Chart created succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.chart')->with($notification);
    }


    public function EditChart($id){
        $result=Chart::findOrFail($id);

        return view('backend/chart/edit_chart', compact('result'));
    }

    public function UpdateChart(Request $request, $id){

        $request->validate(
            ['y_data'=>'required|unique:charts',
            'x_data' => 'required',
        ]
        );


        $data = Chart::findOrFail($id);
        $data->x_data = $request->x_data;
        $data->y_data = $request->y_data;



        $data->save();

        $notification = array(
            'message' => 'Chart updated succesfully',
            'alert-type'=> 'success',
        );

        return redirect()->route('all.chart')->with($notification);
    }

    public function DeleteChart($id){
        $deleteData = Chart::findOrFail($id);
        $deleteData->delete();

        $notification = array(
            'message' => 'Chart deleted succesfully',
            'alert-type'=> 'warning',
        );
        return redirect()->route('all.chart')->with($notification);
    }


    
}
