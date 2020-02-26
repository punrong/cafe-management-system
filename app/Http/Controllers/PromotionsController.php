<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

use DB, Validator, Redirect, Response, File, Gate;

class PromotionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $promotions = Promotion::all();
        return view('promotion.display')->with('promotions', $promotions);
    }

    public function approved(){
        $promotions = Promotion::where('status','=','Approved')->get();
        if ($promotions != null) {
            return view('promotion.display')->with('promotions', $promotions);
        } 
            return redirect()->back();;
    }

    public function pending(){
        $promotions = Promotion::where('status','=','Pending')->get();
        if ($promotions != null) {
            return view('promotion.display')->with('promotions', $promotions);
        } 
            return redirect()->back();;
    }

    public function notapproved(){
        $promotions = Promotion::where('status','=','Not Approved')->get();
        if ($promotions != null) {
            return view('promotion.display')->with('promotions', $promotions);
        } 
            return redirect()->back();;
    }
    
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date'
            ]);

            if ($validator->fails()) {
                $request->session()->flash('error','Cannot add this promotion '.$request->get('name').'. Please make sure you have valid input');
                return redirect()->back();
           }

       if ($files = $request->file('image')) {
            $promotion = new Promotion;
            $promotion->name = $request->input('name');
            $promotion->start_date = $request->input('start_date');
            $promotion->end_date = $request->input('end_date');
            $promotion->condition = $request->input('condition');

            if(Gate::denies('approve-promotions')){
                $promotion->status = 'Pending';
            }else{
                $promotion->status = $request->input('status');
            }
    
            $destinationPath = 'image/'; // upload path
            $files->move($destinationPath, $files->getClientOriginalName());
            $promotion->image = $files->getClientOriginalName();
            
            $promotion->save();
                $request->session()->flash('success','This promotion '.$request->get('name').' has been added');
        }
        return redirect()->back();; 
    }


    public function search(Request $request)
    {
        $promotions = Promotion::where('name', '=', $request->get('name'))->get();
        if ($promotions != null) {
            return view('promotion.search')->with('promotions', $promotions);
        } else {
            $request->session()->flash('error','Please make sure you have valid inputs');
            return redirect()->back();;
        }
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('promotion.edit')->with('promotion', $promotion);
    }

    public function update(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date'
            ]);

            if ($validator->fails()) {
                $request->session()->flash('error','Please make sure you have valid inputs');
                return redirect()->back();
           }

        if(Gate::denies('approve-promotions')){
            DB::table('promotions')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->get('name'),
                    'start_date' =>  $request->get('start_date'),
                    'end_date' =>  $request->get('end_date'),
                    'condition' =>  $request->get('condition')
                ]);
        }else{
            DB::table('promotions')
                ->where('id', $id)
                ->update([
                    'name' =>  $request->get('name'),
                    'start_date' =>  $request->get('start_date'),
                    'end_date' =>  $request->get('end_date'),
                    'condition' =>  $request->get('condition'),
                    'status' => $request->get('status')
                ]);
            }
        $request->session()->flash('success','This promotion '.$request->get('name').' has been updated');

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($files = $request->file('image')) {
            
            $files = $request->file('image');
            $destinationPath = 'image/';
            $files->move($destinationPath, $files->getClientOriginalName());

            DB::table('promotions')
                ->where('id', $id)
                ->update([
                    'image' =>   $files->getClientOriginalName()
                ]);
          }
        return redirect('/promotion/display');
    }

    public function destroy($id)
    {
        if(Gate::denies('delete-promotions')){
            return redirect('promotion/display');
        }

        $promotion = Promotion::find($id);
        $promotion->delete();

        return redirect('promotion/display');
    }
}
