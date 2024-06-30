<?php

namespace App\Http\Controllers;

use App\Models\Oder;
use App\Models\OderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $numberOfRecord = OderDetail::count();
         $perPage = 20;
         $numberOfPage = $numberOfRecord % $perPage == 0?
              (int) $numberOfRecord / $perPage: (int) $numberOfRecord / $perPage + 1;
         $pageIndex = 1;
         if($request->has('pageIndex'))
             $pageIndex = $request->input('pageIndex');
         if($pageIndex < 1) $pageIndex = 1;
         if($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
         //
         $ODs = OderDetail::orderByDesc('id')
                 ->skip(($pageIndex-1)*$perPage)
                 ->take($perPage)
                 ->get();
         // dd($arr);
         return view('order_detail.index', compact( 'ODs', 'numberOfPage', 'pageIndex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $oders = Oder::all();
        return view('order_detail.create', compact('products', 'oders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Amount' => ['required', 'numeric', 'between:1,1000'],
            'Note' => ['required','max:1000'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // success
        OderDetail::create($request->all());
        return redirect()->route('ODs.index')->with('mes', 'Success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OderDetail $OD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OderDetail $OD, Request $request)
    {
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        $products = Product::all();
        $oders = Oder::all();
        return view('order_detail.edit', compact('products', 'oders', 'OD', 'pageIndex'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OderDetail $OD)
    {
        //
        $validator = Validator::make($request->all(), [
            'Amount' => ['required', 'numeric', 'between:1,1000'],
            'Note' => ['required','max:1000'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // success
        $pageIndex = $request->input('pageIndex');
        $OD->update($request->all());
        return redirect()->route('ODs.index', ['pageIndex' => $pageIndex])->with('mes', 'Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OderDetail $OD, Request $request)
    {
        //
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        $OD->delete();
        return redirect()->route('ODs.index', ['pageIndex' => $pageIndex])->with('mes' , 'Success!');
    }
}
