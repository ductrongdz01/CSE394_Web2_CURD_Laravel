<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['ProductID', 'OrderID', 'Amount', 'Note'];
    function getProductName(){
        $product = Product::where('ProductID', $this->ProductID)->first();
        return $product->ProductName;
    }
    function toMoney(){
        $product = Product::where('ProductID', $this->ProductID)->first();
        return $product->PriceQuotation * $this->Amount;
    }
}
