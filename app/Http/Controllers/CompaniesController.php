<?php

namespace App\Http\Controllers;

use App\Models\Campany;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    public function index()
    {
        $com=Campany::paginate(10);
        return view('dashboard.companies.index',compact('com'));

    }
    public function create(){

        $use=User::get();
        return view('dashboard.companies.create',compact('use'));
    }

    public function store(Request $request) {


        try {

            DB::beginTransaction();
        Campany::create([
            'name'=> $request->name,
            'user_id' =>$request->user_id,
        ]);

            DB::commit();
            return redirect()->route('admin.index')->with(['success' => 'تم ألاضافة بنجاح']);
        }

        catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.index')->with(['error' => ' لم تتم العمليه']);

        }


    }

    public function getuser($id){


         $ee=Campany::find($id);

         $ss= $ee ->users;


         return view('dashboard.companies.get',compact('ss'));





    }


}
