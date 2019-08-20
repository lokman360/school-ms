<?php

namespace App\Http\Controllers;

use App\StudentClass;
use Illuminate\Http\Request;
use Validator;
use App\Student;
use App\Section;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.class_page.classes');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastClasses = StudentClass::OrderBy('id', 'DESC')->take(10)->get();
        return view('admin.pages.class_page.addClassList',compact('lastClasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'class_name'=>'required'
        ]);

        $checkDouble = StudentClass::where('class_name',$request->class_name)
                ->get();
        if(count($checkDouble) < 1){
            $is_save = StudentClass::create($request->all());
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $allClasses = StudentClass::OrderBy('id', 'DESC')->get();
        return view('admin.pages.class_page.viewClassList',compact('allClasses'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $request->validate([
            'class_name'=>'required'
        ]);
        $id = $request->class_id;

        $checkDouble = StudentClass::where('class_name',$request->class_name)
                ->get();
        if(count($checkDouble) < 1){

            $updateData = StudentClass::find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if($id != null){

            $section = Section::where('section_class', $id)->get();
            $student = Student::where('st_class',$id)->get();
            $student = count($student);
            $section = count($section);

            if($student > 0){
                return response()->json(['error'=>true,'iconMsg'=>'error','errorMsg'=>'Class have Students']);
            }
            else if($section > 0){
                return response()->json(['error'=>true,'iconMsg'=>'error','errorMsg'=>'Class have Section']);
            }
            else{
                $is_delete = StudentClass::where('id',$id)->delete();
                if($is_delete){
                    return response()->json(['error'=>false,'iconMsg'=>'success','successMsg'=>'Data Delete Successfully']);
                }
            }

        }
    }












}
