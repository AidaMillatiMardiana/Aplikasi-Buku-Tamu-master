<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Job;
use App\Models\Education;
use App\Models\Media;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\Purpose;
use App\Models\purposevolumetwo;
use App\Models\TujuanKunjungan;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Transaction;
use Alert;
use Illuminate\Support\Facades\DB;
use Validator;




class GuestController extends Controller
{
    public function formTamu() {
        $job = Job::all();
        $education = Education::all();
        $media = Media::all();
        $service = Service::all();
        $purpose = Purpose::all();
        $purposevoltwo = purposevolumetwo::all();
        $sub_categories = SubCategory::all();
        $categories = Category::all();
        $tujuankunjungan = TujuanKunjungan::all();
<<<<<<< HEAD

        return view('/index', compact('job','education','media','service','sub_categories','categories','purpose', 'purposevoltwo', 'tujuankunjungan'));
        return dd(Session::all());
=======
// dd($tujuankunjungan);
        return view('/index', compact('job','education','media','service','sub_categories','categories','purpose', 'purposevoltwo', 'tujuankunjungan'));
        // return dd(Session::all());
>>>>>>> f01cbce271541629c4024aebb5e565c9d9490e47
        // $purpose = Purpose::all();

        // return view('/index', compact('job','education','media','service','sub_categories','purpose'));

    }
    /**
     *  Function untuk validasi Ajax
     */
    public function validationForm(Request $request){
        // dd($request()->all());
        if ($request->status == ""){
            $validator = Validator::make($request->all(), [
                'hp' => [   'required', 'between:10,15',
                            'regex:/^(\+62|62|0)8[1-9][0-9]{6,11}$/'
                        ],
                ]);
        } else {
            $validator = Validator::make($request->all(), [
                ]);
        }


        if ($validator->passes()) {
            if (Customer::where('hp', $request->hp)->exists()){
                return response()->json(['status'=>'Customer Telah terdaftar']);
            } else {
                switch($request->idtab)
                {
                case 1  :
                    $validator = Validator::make($request->all(), [
                            'name' => 'required|min:5',
                            'email' => 'required|email|max:255|unique:customer',
                            'address' => 'required|min:15',
                            'age' => 'required|min:1|max:2',
                    ]);

                    if ($validator->passes()) {
                        return response()->json(['success'=>'Lolos Validasi #1']);
                    }

                    return response()->json(['error'=>$validator->errors()->all()]);
                    break;
                case 2  :
                    $validator = Validator::make($request->all(), [
                            'institute' => 'required|min:10',
                            'nipnim' => 'required|min:9',
                            'job' => 'required|min:1',
                            'education' => 'required|min:1',
                    ]);

                    if ($validator->passes()) {
                        return response()->json(['success'=>'Lolos Validasi #1']);
                    }

                    return response()->json(['error'=>$validator->errors()->all()]);
                    break;
                case 3  :
                    $validator = Validator::make($request->all(), [
                            'media' => 'required|min:1',
                            'sub_categories' => 'required|min:1',
                            'service' => 'required|min:1',
                    ]);

                    if ($validator->passes()) {
                        return response()->json(['success'=>'Lolos Validasi #1']);
                    }

                    return response()->json(['error'=>$validator->errors()->all()]);
                    break;
                case 4 :
                    $validator = Validator::make($request->all(), [
                            'purpose' => 'required|min:1',
                            'data' => 'required|min:30',
                    ]);

                    if ($validator->passes()) {
                        return response()->json(['success'=>'Lolos Validasi #1']);
                    }

                    return response()->json(['error'=>$validator->errors()->all()]);
                    break;
                case 5 :
                    $validator = Validator::make($request->all(), [
<<<<<<< HEAD
                        'TujuanKunjungan' => 'required|min:1',
                        'institute' => 'required|min:10',
                        ]);
=======
                        'institute' => 'required|min:10',
                        'tujuankunjungan' => 'required|min:1',
                    ]);
                    if ($validator->passes()) {
                        return response()->json(['success'=>'Lolos Validasi #1']);
                    }

                    return response()->json(['error'=>$validator->errors()->all()]);
                    break;

                }
>>>>>>> f01cbce271541629c4024aebb5e565c9d9490e47

                        if ($validator-passes()){
                            return response()->json(['success'=>'Lolos Validasi #1']);
                        }

                        return response()->json(['error'=>$validator->errors()->all()]);
                        break;
                    }
                }
        }else {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
<<<<<<< HEAD
=======

>>>>>>> f01cbce271541629c4024aebb5e565c9d9490e47
    }

    public function saveGuest(Request $request){
        /**
         * Validate - Laravel Basic - bimasakti.kr
         * #1 Define validate Submit Button
         */
        // $validator = Validator::make($request->all(), [
        //     'purpose' => 'required|min:1',
        //     'data' => 'required|min:25',
        // ]);

        // if($validator->passes()){
            
            $name   = $request->name;
            $hp = $request->hp;
            $email   = $request->email;
            $address = $request->address;
            $job  = $request->job ? $request->job : 1;
            $gender = $request->gender;
            $age = $request->age;
<<<<<<< HEAD
            $nipnim= $request->nipnim ? $request->nipnim : 0;
            $institute= $request->institute ? $request->institute : $request->institute2;
            $education = $request->education ? $request->education : 1;
            $purpose = $request->purpose ? $request->purpose : 0;
            $sub_categories =$request->sub_categories ? $request->sub_categories : 0 ;
            $tujuankunjungan = $request->tujuankunjungan;
=======
            $nipnim= $request->nipnim;
            $institute= $request->institute;
            $education = $request->education;
            $purpose = $request->purpose;
            $sub_categories =$request->sub_categories;
            $tujuankunjungan =$request->tujuankunjungan;
>>>>>>> f01cbce271541629c4024aebb5e565c9d9490e47

            if (Customer::where('hp', $hp)->exists()){
                /**
                * Get ID Customer
                */

               $idcustomer = Customer::where('hp', $hp)
               ->value('id');

               /**
                * Fetch request to data transaction
                */
               $transaction = new Transaction();
               $transaction->id_customer =$idcustomer;
               $transaction->id_media=$request->media;
               $transaction->id_service=$request->service;
               $transaction->id_purpose=$request->purpose;
               $transaction->data=$request->data;
               $transaction->id_sub_categories=$request->sub_categories;
            //    $transaction->save();


            //    $transaction = new Transaction();
               $transaction->id_customer =$idcustomer;
               $transaction->tujuankunjungan=$request->TujuanKunjungan;
               $transaction->institute = $institute;
               $transaction->save();
               $tujuankunjungan = new TujuanKunjungan();
               $tujuankunjungan->tujuankunjungan_type=$request->tujuankunjungan;
               $tujuankunjungan->save();

               Alert::success("Success", "Terimakasih  $name  Sudah menggunakan layanan kami");
               return redirect('/');

           } else{
               /**
                * Add a New Customer
                */
               $data = new Customer();
               $data->name = $name;
               $data->hp = $hp;
               $data->gender= $gender;
               $data->age= $age;
               $data->nipnim= $nipnim;
               $data->institute= $institute;
               $data->email = $email;
               $data->address = $address;
               $data->id_job = $job;
               $data->id_education = $education;
<<<<<<< HEAD
               $data->id_kunjungan = $tujuankunjungan;
=======
               $data->tujuankunjungan = $tujuankunjungan;
>>>>>>> f01cbce271541629c4024aebb5e565c9d9490e47
               $data->save();

               /**
                * Get ID Customer
                */

               $idcustomer = Customer::where('hp', $hp)
                               ->value('id');

               /**
                * Fetch request to data transaction
                */
<<<<<<< HEAD
                if($request->purposevtwo == 2){
                    $transaction = new Transaction();
                    $transaction->id_customer =$idcustomer;
                    $transaction->id_media=$request->media;
                    $transaction->id_service=$request->service;
                    $transaction->id_purpose=$request->purpose;
                    $transaction->data=$request->data;
                    $transaction->id_sub_categories=$request->sub_categories;
                    $transaction->save();
                }
=======

               $transaction = new Transaction();
               $transaction->id_customer =$idcustomer;
               $transaction->id_media=$request->media;
               $transaction->id_service=$request->service;
               $transaction->id_purpose=$request->purpose;
               $transaction->data=$request->data;
               $transaction->id_sub_categories=$request->sub_categories;
            //    $transaction->tujuankunjungan=$request->tujuankunjungan;
               $transaction->save();
               $tujuankunjungan = new TujuanKunjungan();
               $tujuankunjungan->tujuankunjungan_type=$request->tujuankunjungan;
               $tujuankunjungan->save();
>>>>>>> f01cbce271541629c4024aebb5e565c9d9490e47

               Alert::success("Success", "Terimakasih  $name  Sudah menggunakan layanan kami");
               return redirect('/');
        }  
    }  

    public static function cekcustomer(Request $request){
        // DB::enableQueryLog();
        // $customer = Customer::where('hp', $request->hp)
        //                     ->get();
        $customer = DB::table('customer')
                    ->where('hp', '=', $request->search)
                    ->get();


        /**
         *
         *  Return #1 plain response()
         */
        // return response()->json([
        //     'customer'=> $customer,
        // ]);

        /**
         * Return #2 make manual collection
         */
        // $response = [
        //     'id'    = $customer->id,
        //     'name'  = $customer->name,
        //     'hp'    = $customer->hp,
        // ];

        // return response()->json($response);

         /**
         * Return #3 make use toJson()
         */
        $customerArray = $customer->toArray();
        // $customerJson = $customerArray->toJson();


        // return $customerJson;
        return $customerArray;


       
    }
}
