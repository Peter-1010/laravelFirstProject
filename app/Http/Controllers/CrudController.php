<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getOffers(){
        return Offer::select('id','name')->get();
    }

    /*public function store(){

        Offer::create([
           'name'    => 'Offer3',
           'price'   => '5000',
           'details' => 'Offer details'
        ]);

    }*/

    public function create(){
        return view('offers/create');
    }

    public function store(Request $request){

        $rules = $this->getRules();

        $messages = $this->getMessages();

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Offer::create([
            'name'    => $request->name,
            'price'   => $request->price,
            'details' => $request->details
        ]);

        return redirect()->back()->with(['success' => 'تم اضافة العرض بنجاح']);

    }

    protected function getMessages(){
        return $messages = [
            'name.required' => __('messages.offer name required'),
            'name.unique'   => __('messages.offer name unique'),
            'price.numeric' => 'سعر العرض يجب ان يكون ارقام',
            'price.required' => 'سعر العرض مطلوب',
            'details.required' => 'التفاصيل مطلوبة',
        ];
    }

    protected function getRules(){
        return $rules = [
            'name'    => 'required|max:100|unique:offers,name',
            'price'   => 'required|numeric',
            'details' => 'required',
        ];
    }

}
