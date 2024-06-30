<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Medicines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $numberOfRecord = Sales::count();
         $perPage = 20;
         $numberOfPage = $numberOfRecord % $perPage == 0?
              (int) $numberOfRecord / $perPage: (int) $numberOfRecord / $perPage + 1;
         $pageIndex = 1;
         if($request->has('pageIndex'))
             $pageIndex = $request->input('pageIndex');
         if($pageIndex < 1) $pageIndex = 1;
         if($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
         //
         $ODs = Sales::orderByDesc('id')
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
