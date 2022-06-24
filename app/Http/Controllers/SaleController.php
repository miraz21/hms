<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\MedicineDetail;
use App\Models\MedicineName;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\SaleItem;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function index()    {
        if (Auth::check()) {
            if (Auth::user()->usertype == 1) {

                $sales = Sale::with(['item'])->orderBy('id', 'desc')->paginate(10);
                return view('sale.index', compact('sales'));
            }
            if (Auth::user()->usertype == 3) {

                $sales = Sale::with(['item'])->orderBy('id', 'desc')->paginate(10);
                return view('sale.index', compact('sales'));

            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $medicinedetails = MedicineDetail::with(['medicinename'])->get();
        $medicinename = MedicineName::all();
        $appointment = Appointment::all();
        $q_datas = [];
        return view('sale.create', compact('medicinedetails', 'medicinename', 'appointment', 'q_datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required'
        ]);



        $q_datas =  MedicineDetail::with(['medicinename' => function ($q) {
            $q->select('id', 'name');
        }])->whereIn('id', $request->medicinedetail_id)->select('quantity', 'medicinename_id')->where('quantity', '<', 21)->get();


        DB::beginTransaction();


        $sale = Sale::create([
            'appointment_id' => $request->input('appointment_id'),
            'total' => 0.00
        ]);


        if ($q_datas->isEmpty()) {

            // return $request;
            $id = [];

            try {
                $totalAmount = 0;
                for ($i = 0; $i < count($request->price); $i++) {
                    $data = [
                        'sale_id' => $sale->id,
                        'medicinedetail_id' => $request->medicinedetail_id[$i],
                        'price' => $request->price[$i],
                        'quantity' => $request->quantity[$i],
                        'amount' => $request->amount[$i]
                    ];
                    $created = SaleItem::create($data);
                    $id[] =  $created->id;

                    $totalAmount+= $request->amount[$i];

                    MedicineDetail::where('id', $request->medicinedetail_id[$i])->decrement('quantity', $request->quantity[$i]);
                }

                $sale->update([
                    'total' => $totalAmount
                ]);
                DB::commit();

                Toastr::success('Create Success', 'Success', ["positionClass" => "toast-top-center"]);
                return redirect()->route('saledetail.index');
            } catch (\Exception $exception) {
                DB::rollBack();
                Toastr::error($exception->getMessage());
                return redirect()->back()->withErrors($exception->getMessage());
            }
        } else {
            Toastr::error("Quantity is running low");
         return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Sale $sale
     * @return Application|Factory|View|Response
     */
    public function show(Sale $sale)
    {

        return view('sale.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sale $sale
     * @return Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Sale $sale
     * @return Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sale $sale
     * @return Response
     */
    public function destroy(Sale $sale)
    {
        //
    }


    public function print(Sale $sale)
    {
        return view('sale.print', compact('sale'));
    }
}
