<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\IncomeCat;
use App\IncomeSubCat;
class AccountController extends Controller
{
    public function index(){
    	return view('admin.pages.account_page.account');
    }







    public function incomeViewCat(){
    	$IncomeCats = IncomeCat::all();
    	return view('admin.pages.account_page.income.incomeAddCat', compact('IncomeCats'));
    }

    public function incomeAddCat(Request $request){
    	$request->validate([
            'income_cat'=>'required'
        ]);

        $checkDouble = IncomeCat::where('income_cat',$request->income_cat)
                ->get();
        if(count($checkDouble) < 1){
            $is_save = IncomeCat::create($request->all());
            if($is_save){
                return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Insert Successfully']);
            }
            else{
                return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t insert']);
            }
        }
        else{
            return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data is already exist']);
        }
    }


    public function incomeUpdateCat(Request $request){
        $request->validate([
            'income_cat'=>'required'
        ]);
        $id = $request->income_cat_id;

        $checkDouble = IncomeCat::where('income_cat',$request->income_cat)
                ->get();
        if(count($checkDouble) < 1){

            $updateData = IncomeCat::find($id);
            $is_update = $updateData->update($request->all());


            if($is_update){
                return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Update Successfully']);
            }
            else{
                return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t insert']);
            }
        }
        else{
            return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data is already exist']);
        }
    }

    public function incomeCatDestroy($id){
        if($id != null){

        //     $section = Income::where('section_class', $id)->get();
        //     $student = Student::where('st_class',$id)->get();
        //     $student = count($student);
        //     $section = count($section);

            // if($student > 0){
            //     return response()->json(['error'=>true,'iconMsg'=>'error','errorMsg'=>'Class have Students']);
            // }
            // else if($section > 0){
            //     return response()->json(['error'=>true,'iconMsg'=>'error','errorMsg'=>'Class have Section']);
            // }
            // else{

                $is_delete = IncomeCat::where('id',$id)->delete();
                if($is_delete){
                    return response()->json(['error'=>false,'iconMsg'=>'success','successMsg'=>'Data Delete Successfully']);
                }
            // }

        }
    }









    public function incomeViewSubCat(){


        $IncomeSubCats = IncomeSubCat::all();
        //return $IncomeSubCats->first()->IncomeCatName;

        $incomeCatItems = IncomeCat::pluck('income_cat','id');
        return view('admin.pages.account_page.income.incomeAddSubCat', compact('IncomeSubCats','incomeCatItems'));
    }

    public function incomeAddSubCat(Request $request){
        $request->validate([
            'income_cat'=>'required',
            'income_sub_cat'=>'required'
        ]);

        $checkDouble = IncomeSubCat::where('income_cat',$request->income_cat)
                            ->where('income_sub_cat',$request->income_sub_cat)
                            ->get();
        if(count($checkDouble) < 1){
            $is_save = IncomeSubCat::create($request->all());
            if($is_save){
                return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Insert Successfully']);
            }
            else{
                return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t insert']);
            }
        }
        else{
            return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data is already exist']);
        }
    }


    public function incomeUpdateSubCat(Request $request)
    {
        $request->validate([
            'income_cat'=>'required',
            'income_sub_cat'=>'required'
        ]);

        $id = $request->income_sub_cat_id;
        $checkDouble = IncomeSubCat::where('income_cat',$request->income_cat)
                            ->where('income_sub_cat',$request->income_sub_cat)
                            ->get();
        if(count($checkDouble) < 1){
            $updateData = IncomeSubCat::find($id);
            $is_update = $updateData->update($request->all());
            if($is_update){
                return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Update Successfully']);
            }
            else{
                return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t insert']);
            }
        }
        else{
            return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data is already exist']);
        }
    }

    public function incomeSubCatDestroy($id){
        if($id != null){

        //     $section = Income::where('section_class', $id)->get();
        //     $student = Student::where('st_class',$id)->get();
        //     $student = count($student);
        //     $section = count($section);

            // if($student > 0){
            //     return response()->json(['error'=>true,'iconMsg'=>'error','errorMsg'=>'Class have Students']);
            // }
            // else if($section > 0){
            //     return response()->json(['error'=>true,'iconMsg'=>'error','errorMsg'=>'Class have Section']);
            // }
            // else{

                $is_delete = IncomeSubCat::where('id',$id)->delete();
                if($is_delete){
                    return response()->json(['error'=>false,'iconMsg'=>'success','successMsg'=>'Data Delete Successfully']);
                }
            // }
        }
    }

    public function incomeCheckSubCat(Request $request){
        $checkSubCat = IncomeSubCat::where('income_cat',$request->value)->get();
        $data = '<option value="">Select Sub Category</option>';
        foreach ($checkSubCat as $row) {
            $data .= '<option value="'.$row->id.'">'.$row->income_sub_cat.'</option>';
        }
        return response()->json(['data'=>$data]);
    }




















    public function addIncomeView(){
        $Incomes = Income::orderby('id','desc')->take(20)->get();
        $incomeCatItems = IncomeCat::pluck('income_cat','id');


        $totalIncome = Income::all()->sum('income_amount');
        // $totalIncome = array_sum($totalIncome);
        return view('admin.pages.account_page.income.addIncome', compact('Incomes','totalIncome','incomeCatItems'));
    }
    


    public function addIncome(Request $request){
        $request->validate([
            'income_cat'=>'required',
            'income_amount'=>'required'
        ]);


        $is_save = Income::create($request->all());
        if($is_save){
            return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Insert Successfully']);
        }
        else{
            return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t insert']);
        }

    }


    // public function incomeUpdateSubCat(Request $request)
    // {
    //     $request->validate([
    //         'income_cat'=>'required',
    //         'income_sub_cat'=>'required'
    //     ]);

    //     $id = $request->income_sub_cat_id;
    //     $checkDouble = IncomeSubCat::where('income_cat',$request->income_cat)
    //                         ->where('income_sub_cat',$request->income_sub_cat)
    //                         ->get();
    //     if(count($checkDouble) < 1){
    //         $updateData = IncomeSubCat::find($id);
    //         $is_update = $updateData->update($request->all());
    //         if($is_update){
    //             return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Update Successfully']);
    //         }
    //         else{
    //             return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t insert']);
    //         }
    //     }
    //     else{
    //         return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data is already exist']);
    //     }
    // }

    // public function incomeSubCatDestroy($id){
    //     if($id != null){

    //     //     $section = Income::where('section_class', $id)->get();
    //     //     $student = Student::where('st_class',$id)->get();
    //     //     $student = count($student);
    //     //     $section = count($section);

    //         // if($student > 0){
    //         //     return response()->json(['error'=>true,'iconMsg'=>'error','errorMsg'=>'Class have Students']);
    //         // }
    //         // else if($section > 0){
    //         //     return response()->json(['error'=>true,'iconMsg'=>'error','errorMsg'=>'Class have Section']);
    //         // }
    //         // else{

    //             $is_delete = IncomeSubCat::where('id',$id)->delete();
    //             if($is_delete){
    //                 return response()->json(['error'=>false,'iconMsg'=>'success','successMsg'=>'Data Delete Successfully']);
    //             }
    //         // }
    //     }
    // }








    












}
