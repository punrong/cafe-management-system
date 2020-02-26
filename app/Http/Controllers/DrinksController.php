<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drinks;

use DB, Validator, Redirect, Response, File, Gate;

class DrinksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $drinks_request = Drinks::all();
        return view('drinks.display')->with('drinks_request', $drinks_request);
    }

    public function approved(){
        $drinks_request = Drinks::where('status','=','Approved')->get();
        if ($drinks_request != null) {
            return view('drinks.display')->with('drinks_request', $drinks_request);
        } 
            return redirect()->back();;
    }

    public function pending(){
        $drinks_request = Drinks::where('status','=','Pending')->get();
        if ($drinks_request != null) {
            return view('drinks.display')->with('drinks_request', $drinks_request);
        } 
            return redirect()->back();;
    }

    public function notapproved(){
        $drinks_request = Drinks::where('status','=','Not Approved')->get();
        if ($drinks_request != null) {
            return view('drinks.display')->with('drinks_request', $drinks_request);
        } 
            return redirect()->back();;
    }

    public function create()
    {
        return view('drinks.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       if ($files = $request->file('image')) {
            $drink = new Drinks;
            $drink->name = $request->input('name');
            $drink->unit_price = $request->input('unit_price');
            $drink->type = $request->input('type');
            $drink->temperature = $request->input('temperature');

            if(Gate::denies('approve-drinks')){
                $drink->status = 'Pending';
            }else{
                $drink->status = $request->input('status');
            }
    
            $destinationPath = 'image/'; // upload path
            $files->move($destinationPath, $files->getClientOriginalName());
            $drink->image = $files->getClientOriginalName();
            
            $drink->save();
                $request->session()->flash('success','This drink '.$request->get('name').' has been added');
        }
        else
            $request->session()->flash('error','Cannot add this drink '.$request->get('name'));
        return redirect()->back();;      
    }

    public function search(Request $request)
    {
        $drinks = Drinks::where('name', '=', $request->get('name'))->get();
        if ($drinks != null) {
            return view('drinks.search')->with('drinks', $drinks);
        } else {
            $request->session()->flash('error','Cannot find this drink '.$request->get('name'));
            return redirect()->back();;
        }
    }

    public function edit($id)
    {
        $drink = Drinks::findOrFail($id);
        return view('drinks.edit')->with('drink', $drink);
    }

    public function update(Request $request, $id)
    {
       $drink = Drinks::findOrFail($id);

        if(Gate::denies('approve-drinks')){
            DB::table('drinks')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->get('name'),
                    'unit_price' =>  $request->get('unit_price'),
                    'type' => $request->get('type'),
                    'temperature' => $request->get('temperature')
                ]);
        }else{
            DB::table('drinks')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->get('name'),
                    'unit_price' =>  $request->get('unit_price'),
                    'status' => $request->get('status'),
                    'type' => $request->get('type'),
                    'temperature' => $request->get('temperature')
                ]);
            }
        $request->session()->flash('success','This drink '.$request->get('name').' has been updated');

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($files = $request->file('image')) {
            
            $files = $request->file('image');
            $destinationPath = 'image/';
            $files->move($destinationPath, $files->getClientOriginalName());

            DB::table('drinks')
                ->where('id', $id)
                ->update([
                    'image' =>   $files->getClientOriginalName()
                ]);
          }
        return redirect('/drinks/display');
    }

    public function destroy($id)
    {
        $drink = Drinks::find($id);
        $drink->delete();
        return redirect('/drinks/display');
    }
}
