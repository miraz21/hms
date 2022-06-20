<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Pdf;

class PdfSaleDetailController extends Controller
{
 public function  generatePDF(Request $request)
 {
   $data = [
      'appointment_id' => $request->appointment_id,
      'medicinedetail_id' => $request->medicinedetail_id[$i],
      'price' => $request->price[$i],
      'quantity' => $request->quantity[$i],
      'amount' => $request->amount[$i],
  ];

    // $pdf=PDF::loadView('salePDF', $data);
    // return $pdf->download('test.pdf');
 }
}
