<?php

namespace App\Http\Controllers;

use App\Receipt;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ReceiptController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\BranchAdminMiddleware');
    }

    public function index()
    {
        $receipts_series = Receipt::select('series_number as number')->groupBy('series_number')->paginate(10);

        return view('receipts.index', compact('receipts_series'));
    }

    public function store(Requests\ReceiptRequest $request)
    {
        /*
        Validator::extend('less_than', function($attribute, $value, $parameters) {
            $other = Input::get($parameters[0]);

            return isset($other) && (intval($value) < intval($other));
        });

        Validator::replacer('less_than', function ($message, $attribute, $rule, $params) {
            return str_replace('_', ' ', 'The ' .$attribute. ' must be less than the ' .$params[0]);
        });


        $v = Validator::make($request->all(),[
            'num_start' => 'required|numeric',
            'num_end' => 'required|numeric',
            'series_number' => 'required',
            'num_start' => 'less_than:num_end'
        ]);

        if($v->fails())
        {
            return redirect('/receipts')
                ->withErrors($v)
                ->withInput();
        }
        */
        $starting_number = $request->get('starting_number');
        $ending_number = $request->get('ending_number');
        $series_number = $request->get('series_number');


        for($num = $starting_number; $num <= $ending_number; $num++)
        {
            if(! Receipt::where('series_number', $series_number)->where('number', $num)->exists())
            {
                $data = array(
                    'number' => $num,
                    'series_number' => $series_number,
                    'branch_id' => Auth::user()->branch->id
                );

                Receipt::create($data);
            } else {
                $request->session()->flash('alert-warning','Oops! Receipt # ' .$num. ' is already exist, operation was stopped.');
                return redirect('/receipts');
            }
        }

        $request->session()->flash('alert-success','New receipt number/s is/are successfully saved.');
        return redirect('/receipts');
    }
}
