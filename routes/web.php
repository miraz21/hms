<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home',[App\Http\Controllers\HomeController::class, 'redirect']);


// Route::get('add_doctor',[App\Http\Controllers\AdminController::class, 'addview'])->name('add.doctor');

// Route::get('upload_doctor',[App\Http\Controllers\AdminController::class, 'upload'])->name('upload.doctor');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Pharmacy here

Route::get('/medicinecompanies',[App\Http\Controllers\MedicineCompanyController::class, 'index'])->name('medicinecompany.index');

Route::get('/medicinecompanies/create',[App\Http\Controllers\MedicineCompanyController::class, 'create'])->name('medicinecompany.create');

Route::post('/medicinecompanies/create',[App\Http\Controllers\MedicineCompanyController::class, 'store']);

Route::get('/medicinecompanies/delete/{id}',[App\Http\Controllers\MedicineCompanyController::class, 'delete'])->name('medicinecompany.delete');




Route::get('/medicinenames',[App\Http\Controllers\MedicineNameController::class, 'index'])->name('medicinename.index');

Route::get('/medicinenames/create',[App\Http\Controllers\MedicineNameController::class, 'create'])->name('medicinename.create');

Route::post('/medicinenames/create',[App\Http\Controllers\MedicineNameController::class, 'store']);

Route::get('/medicinenames/delete/{id}',[App\Http\Controllers\MedicineNameController::class, 'delete'])->name('medicinename.delete');




Route::get('/medicinedetails',[App\Http\Controllers\MedicineDetailController::class,'index'])->name('medicinedetail.index');

Route::get('/medicinedetails/create',[App\Http\Controllers\MedicineDetailController::class,'create'])->name('medicinedetail.create');

Route::post('/medicinedetails/create',[App\Http\Controllers\MedicineDetailController::class,'store']);

Route::get('/medicinedetails/edit/{id}',[App\Http\Controllers\MedicineDetailController::class,'edit'])->name('medicinedetail.edit');

Route::post('/medicinedetails/edit/{id}',[App\Http\Controllers\MedicineDetailController::class,'update']);

Route::get('/medicinedetails/delete/{id}',[App\Http\Controllers\MedicineDetailController::class,'delete'])->name('medicinedetail.delete');

Route::get('/search',[App\Http\Controllers\MedicineDetailController::class, 'search']);

// Route::get('/find',[App\Http\Controllers\MedicineDetailController::class, 'find'])->name('web.find');




Route::get('/salemans',[App\Http\Controllers\SalemanController::class, 'index'])->name('saleman.index');

Route::get('/salemans/create',[App\Http\Controllers\SalemanController::class, 'create'])->name('saleman.create');

Route::post('/salemans/create',[App\Http\Controllers\SalemanController::class, 'store']);

Route::get('/salemans/delete/{id}',[App\Http\Controllers\SalemanController::class, 'delete'])->name('saleman.delete');




Route::get('/saledetails',[App\Http\Controllers\SaleDetailController::class,'index'])->name('saledetail.index');

Route::get('/saledetails/more/{id}',[App\Http\Controllers\SaleDetailController::class,'moreInfo'])->name('saledetails.more');

Route::get('/saledetails/create',[App\Http\Controllers\SaleDetailController::class,'create'])->name('saledetail.create');

Route::post('/saledetails/create',[App\Http\Controllers\SaleDetailController::class,'store'])->name('saledetail.store');

Route::get('/saledetails/edit/{id}',[App\Http\Controllers\SaleDetailController::class,'edit'])->name('saledetail.edit');

Route::post('/saledetails/edit/{id}',[App\Http\Controllers\SaleDetailController::class,'update']);

Route::get('/saledetails/delete/{id}',[App\Http\Controllers\SaleDetailController::class,'delete'])->name('saledetail.delete');

Route::get('/sales',[App\Http\Controllers\PrintSaleController::class, 'index']);

Route::get('/sale_prnpriview/{cus_id}',[App\Http\Controllers\PrintSaleController::class, 'prnpriview'])->name('print.sale');


Route::resource('sale', SaleController::class);
Route::get('sale-print/{sale}', [SaleController::class, 'print'])->name('sale.print');
Route::resource('sale-item', SaleItemController::class);

Route::get('getprice', [App\Http\Controllers\SaleDetailController::class,'getprice'])->name('getprice');

Route::get('getappointment', [App\Http\Controllers\SaleDetailController::class,'getData'])->name('getappointment');

Route::get('getcustomer', [App\Http\Controllers\SaleDetailController::class,'getphone'])->name('getcustomer');

Route::get('getpatient', [App\Http\Controllers\SaleDetailController::class,'getinfo'])->name('getpatient');

Route::get('getpathological', [App\Http\Controllers\SaleDetailController::class,'gettest'])->name('getpathological');

Route::get('/generate-pdf',[App\Http\Controllers\PdfSaleDetailController::class,'generatePDF'])->name('generate.sale');




Route::get('/returnmedicines',[App\Http\Controllers\ReturnMedicineController::class, 'index'])->name('returnmedicine.index');

Route::get('/returnmedicines/create',[App\Http\Controllers\ReturnMedicineController::class, 'create'])->name('returnmedicine.create');

Route::post('/returnmedicines/create',[App\Http\Controllers\ReturnMedicineController::class, 'store']);

Route::get('/returnmedicines/delete/{id}',[App\Http\Controllers\ReturnMedicineController::class, 'delete'])->name('returnmedicine.delete');

Route::get('/returnmedicines/more/{appoint_id}',[App\Http\Controllers\ReturnMedicineController::class, 'moreInfo'])->name('returnmedicine.show');




Route::get('/customers',[App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');

Route::get('/customers/create',[App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');

Route::post('/customers/create',[App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');

Route::get('/customers/delete/{id}',[App\Http\Controllers\CustomerController::class, 'delete'])->name('customer.delete');




Route::get('/addcustomerbalances',[App\Http\Controllers\AddCustomerBalanceController::class, 'index'])->name('addcustomerbalance.index');

Route::get('/addcustomerbalances/create',[App\Http\Controllers\AddCustomerBalanceController::class, 'create'])->name('addcustomerbalance.create');

Route::post('/addcustomerbalances/create',[App\Http\Controllers\AddCustomerBalanceController::class, 'store'])->name('addcustomerbalance.store');

Route::get('/addcustomerbalances/delete/{id}',[App\Http\Controllers\AddCustomerBalanceController::class, 'delete'])->name('addcustomerbalance.delete');




//  start receiption here   //

Route::get('/appointments',[App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');

Route::get('/appointments/create',[App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');

Route::post('/appointments/create',[App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/appointments/delete/{id}',[App\Http\Controllers\AppointmentController::class, 'delete'])->name('appointment.delete');

Route::get('/appointment',[App\Http\Controllers\PrintAppointmentController::class, 'index']);

Route::get('/appoint_prnpriview/{id}',[App\Http\Controllers\PrintAppointmentController::class, 'prnpriview'])->name('print.appointment');





Route::get('/pathologicals',[App\Http\Controllers\PathologicalTestController::class, 'index'])->name('pathological.index');

Route::get('/pathologicals/more/{id}/{appoint_id}',[App\Http\Controllers\PathologicalTestController::class, 'showMore'])->name('pathological.show');

Route::get('/pathologicals/create',[App\Http\Controllers\PathologicalTestController::class, 'create'])->name('pathological.create');

Route::post('/pathologicals/create',[App\Http\Controllers\PathologicalTestController::class, 'store'])->name('pathological.store');

Route::get('/pathologicals/delete/{id}',[App\Http\Controllers\PathologicalTestController::class, 'delete'])->name('pathological.delete');

Route::get('/pathological',[App\Http\Controllers\PrintTestReportController::class, 'index']);

Route::get('/test_prnpriview/{id}/{appoint_id}',[App\Http\Controllers\PrintTestReportController::class, 'prnpriview'])->name('print.pathological');

//Route::get('getappointment', [App\Http\Controllers\PathologicalTestController::class,'getData'])->name('getappointment');




Route::get('/testinfos',[App\Http\Controllers\TestInfoController::class, 'index'])->name('testinfo.index');

Route::get('/testinfos/create',[App\Http\Controllers\TestInfoController::class, 'create'])->name('testinfo.create');

Route::post('/testinfos/create',[App\Http\Controllers\TestInfoController::class, 'store'])->name('testinfo.store');

Route::get('/testinfos/delete/{id}',[App\Http\Controllers\TestInfoController::class, 'delete'])->name('testinfo.delete');




Route::get('/patients',[App\Http\Controllers\PatientController::class, 'index'])->name('patient.index');

Route::get('/patients/create',[App\Http\Controllers\PatientController::class, 'create'])->name('patient.create');

Route::post('/patients/create',[App\Http\Controllers\PatientController::class, 'store'])->name('patient.store');

Route::get('/patients/delete/{id}',[App\Http\Controllers\PatientController::class, 'delete'])->name('patient.delete');




Route::get('/patientpayments',[App\Http\Controllers\PatientPaymentController::class, 'index'])->name('patientpayment.index');

Route::get('/patientpayments/create',[App\Http\Controllers\PatientPaymentController::class, 'create'])->name('patientpayment.create');

Route::post('/patientpayments/create',[App\Http\Controllers\PatientPaymentController::class, 'store'])->name('patientpayment.store');

Route::get('/patientpayments/delete/{id}',[App\Http\Controllers\PatientPaymentController::class, 'delete'])->name('patientpayment.delete');




Route::get('/hscosts',[App\Http\Controllers\HsCostController::class, 'index'])->name('hscost.index');

Route::get('/hscosts/create',[App\Http\Controllers\HsCostController::class, 'create'])->name('hscost.create');

Route::post('/hscosts/create',[App\Http\Controllers\HsCostController::class, 'store'])->name('hscost.store');

Route::get('/hscosts/delete/{id}',[App\Http\Controllers\HsCostController::class, 'delete'])->name('hscost.delete');




Route::get('/buymedicines',[App\Http\Controllers\BuyMedicineController::class, 'index'])->name('buymedicine.index');

Route::get('/buymedicines/create',[App\Http\Controllers\BuyMedicineController::class, 'create'])->name('buymedicine.create');

Route::post('/buymedicines/create',[App\Http\Controllers\BuyMedicineController::class, 'store'])->name('buymedicine.store');

Route::get('/buymedicines/delete/{id}',[App\Http\Controllers\BuyMedicineController::class, 'delete'])->name('buymedicine.delete');




Route::get('/doctors',[App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.index');

Route::get('/doctors/create',[App\Http\Controllers\DoctorController::class, 'create'])->name('doctor.create');

Route::post('/doctors/create',[App\Http\Controllers\DoctorController::class, 'store'])->name('doctor.store');

Route::get('/doctors/edit/{id}',[App\Http\Controllers\DoctorController::class,'edit'])->name('doctor.edit');

Route::post('/doctors/edit/{id}',[App\Http\Controllers\DoctorController::class,'update']);

Route::get('/doctors/delete/{id}',[App\Http\Controllers\DoctorController::class, 'delete'])->name('doctor.delete');




Route::get('/pathologicaltestpayments',[App\Http\Controllers\PathologicalTestPaymentsController::class, 'index'])->name('pathologicaltestpayment.index');

Route::get('/pathologicaltestpayments/create',[App\Http\Controllers\PathologicalTestPaymentsController::class, 'create'])->name('pathologicaltestpayment.create');

Route::post('/pathologicaltestpayments/create',[App\Http\Controllers\PathologicalTestPaymentsController::class, 'store'])->name('pathologicaltestpayment.store');

Route::get('/pathologicaltestpayments/delete/{id}',[App\Http\Controllers\PathologicalTestPaymentsController::class, 'delete'])->name('pathologicaltestpayment.delete');





Route::get('/addtestpayments',[App\Http\Controllers\AddTestPaymentsController::class, 'index'])->name('addtestpayment.index');

Route::get('/addtestpayments/create',[App\Http\Controllers\AddTestPaymentsController::class, 'create'])->name('addtestpayment.create');

Route::post('/addtestpayments/create',[App\Http\Controllers\AddTestPaymentsController::class, 'store'])->name('addtestpayment.store');

Route::get('/addtestpayments/delete/{id}',[App\Http\Controllers\AddTestPaymentsController::class, 'delete'])->name('addtestpayment.delete');




Route::get('/patientreports',[App\Http\Controllers\PatientReportController::class, 'index'])->name('patientreport.index');

Route::get('/patientlists',[App\Http\Controllers\PatientReportController::class, 'view'])->name('patientlist.view');

Route::get('/patient-report',[App\Http\Controllers\PatientReportController::class, 'report'])->name('patient.report');



Route::get('/hospitalreports',[App\Http\Controllers\HospitalReportController::class, 'index'])->name('report-by-date');

Route::get('/hospitaldailylist',[App\Http\Controllers\HospitalReportController::class, 'dailylist'])->name('hospitaldailylist');
