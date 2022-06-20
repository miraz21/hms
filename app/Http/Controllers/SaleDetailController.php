<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

use Illuminate\Http\Request;

use App\Models\SaleDetail;

use App\Models\MedicineDetail;

use App\Models\MedicineName;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class SaleDetailController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                // $saledetails= SaleDetail::with(['medicinedetail.medicinename'])->orderBy('id','desc')->paginate(10);

                $saledetails = SaleDetail::with(['medicinedetail.medicinename'])->orderBy('id', 'desc')->paginate(10);

                return view('saledetails.index', compact('saledetails'));
            }
            if (Auth::user()->usertype == 3) {
                // $saledetails= SaleDetail::with(['medicinedetail.medicinename'])->orderBy('id','desc')->paginate(10);

                $saledetails = SaleDetail::with(['medicinedetail.medicinename'])->orderBy('id', 'desc')->paginate(10);

                return view('saledetails.index', compact('saledetails'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function moreInfo($cus_id)
    {
        $saledetails = SaleDetail::with(['medicinedetail.medicinename'])->customerId($cus_id)->orderBy('id', 'desc')->paginate(10);

        return view('saledetails.more', compact('saledetails'));
    }


    public function create()
    {
        $medicinedetails = MedicineDetail::with(['medicinename'])->get();
        $medicinename = MedicineName::all();
        $appointment = Appointment::all();
        $q_datas = [];
        return view('saledetails.create', compact('medicinedetails', 'medicinename', 'appointment', 'q_datas'));
    }


    public function getprice(Request $request)
    {


        $price = DB::table("sale_details")
            ->where("medicinedetail_id", $request->medicinedetail_id);
        $price = SaleDetail::query()->where('medicinedetail_id', $request->medicinedetail_id)->first()->price;
        return response()->json($price);
    }


    public function store(Request $request)
    {

        $request->validate([
            'appointment_id' => 'required',
            // 'medicinedetail_id'=>'required',
            // 'price'=>'required',
            // 'quantity'=>'required',
            // 'amount'=>'required',
            'date' => 'required',
        ]);


        ////////


        $q_datas =  MedicineDetail::with(['medicinename' => function ($q) {
            $q->select('id', 'name');
        }])->whereIn('id', $request->medicinedetail_id)->select('quantity', 'medicinename_id')->where('quantity', '<', 21)->get();

        // return $q_datas;


        if ($q_datas->isEmpty()) {

            // return $request;
            $id = [];

            try {
                for ($i = 0; $i < count($request->price); $i++) {
                    $data = [
                        'appointment_id' => $request->appointment_id,
                        'medicinedetail_id' => $request->medicinedetail_id[$i],
                        'price' => $request->price[$i],
                        'quantity' => $request->quantity[$i],
                        'amount' => $request->amount[$i],
                        'date' => $request->date,
                    ];

                    $created = SaleDetail::create($data);
                    $id[] =  $created->id;

                    MedicineDetail::where('id', $request->medicinedetail_id)->decrement('quantity', $request->quantity[$i]);
                 
                }

        
                // return $id;
                //  $data=[
                // 'customer_id'=>$request->input('customer_id'),
                // 'medicinedetail_id'=>$request->input('medicinedetail_id'),
                // 'price'=>$request->input('price'),
                // 'quantity'=>$request->input('quantity'),
                // 'amount'=>$request->input('amount'),
                // 'date'=>$request->input('date'),
                // ];

                // SaleDetail::create($data);


                return redirect()->route('saledetail.index');
            } catch (\Exception $exception) {
                return redirect()->back()->withErrors($exception->getMessage());
            }
        } else {
            $medicinedetails = MedicineDetail::with(['medicinename'])->get();
            $medicinename = MedicineName::all();
            $appointment = Appointment::all();
            return view('saledetails.create', compact('medicinedetails', 'medicinename', 'appointment', 'q_datas'));
        }
    }

    public function edit($id)
    {
        $saledetail = SaleDetail::find($id);
        return view('saledetails.edit', compact('saledetail'));
    }
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                //'appointment_id'=>'required',
                //'saleman_id'=>'required', 
                //'productcategory_id'=>'required',
                'price' => 'required',
                'quantity' => 'required',
                'amount' => 'required',
                //'brandname_id'=>'required',
                'date' => 'required',
            ]);

            $data = [
                //'appointment_id'=>$request->input('appointment_id'),
                //'saleman_id'=>$request->input('saleman_id'),
                //'productcategory_id'=>$request->input('productcategory_id'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'amount' => $request->input('amount'),
                //'brandname_id'=>$request->input('brandname_id'),
                'date' => $request->input('date'),
            ];

            $saledetail = SaleDetail::find($id);
            $saledetail->update($data);
            return redirect()->route('saledetail.index');
        } catch (\Exception $exception) {

            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function delete($id)
    {
        $saledetail = SaleDetail::find($id);

        $saledetail->delete();
        return redirect()->back();
    }



    public function getData(Request $request)
    {
        $app = Appointment::where('id', $request->id)->select('phone', 'age')->first();
        return response()->json($app);
        //   dd($request->all());
    }

    public function getphone(Request $request)
    {
        $app = Appointment::where('id', $request->id)->select('phone')->first();
        return response()->json($app);
        //   dd($request->all());
    }

    public function getinfo(Request $request)
    {
        $app = Appointment::where('id', $request->id)->select('phone')->first();
        return response()->json($app);
        //   dd($request->all());
    }

    public function gettest(Request $request)
    {
        $app = Appointment::where('id', $request->id)->select('phone')->first();
        return response()->json($app);
        //   dd($request->all());
    }
}
