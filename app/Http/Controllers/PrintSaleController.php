<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SaleDetail;

class PrintSaleController extends Controller
{
    public function index()
    {
          $saledetails = SaleDetail::all();
          return view('saledetails.printsale')->with('saledetails', $saledetails);;
    }
    public function prnpriview($cus_id)
    {
          $saledetails = SaleDetail::customerId($cus_id)->get();
          return view('saledetails.sale')->with('saledetails', $saledetails);;
    }

}
