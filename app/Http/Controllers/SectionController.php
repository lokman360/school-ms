<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\StudentClass;
use App\Student;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.section_page.sections');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $classItems = StudentClass::pluck('class_name','id');
        $lastSections = Section::orderby('id','desc')->take(10)->get();
        return view('admin.pages.section_page.addSectionList',compact('lastSections','classItems'));
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
            'section_class'=>'required',
            'section_name'=>'required'
        ]);
        $checkDouble = Section::where('section_class',$request->section_class)
                        ->where('section_name',$request->section_name)
                        ->get();
        if(count($checkDouble) < 1){
            $is_save = Section::create($request->all());
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
        $allSections = Section::orderby('id','desc')->get();
        return view('admin.pages.section_page.viewSectionList',compact('allSections'));
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
            'section_class'=>'required',
            'section_name'=>'required'
        ]);
        $id = $request->section_id;
        $updateData = Section::find($id);
        $is_update = $updateData->update($request->all());
        if($is_update){
            return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Update Successfully']);
        }
        else{
            return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t insert']);
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


            $student = Student::where('st_section',$id)->get();
            $student = count($student);

            if($student > 0){
                return response()->json(['error'=>true,'iconMsg'=>'error','errorMsg'=>'Section have Students']);
            }
            else{
                $is_delete = Section::where('id',$id)->delete();
                if($is_delete){
                    return response()->json(['error'=>false,'iconMsg'=>'success','successMsg'=>'Data Delete Successfully']);
                }
                else{
                     return response()->json(['error'=>true,'errorMsg' => 'Data Can\'t Delete']);
                }


            }


        }
    }




    public function checkSection(Request $request){
       

        $checkSections = Section::where('section_class',$request->value)->get();
        $data = '<option value="">Select Section</option>';
        foreach ($checkSections as $row) {
            $data .= '<option value="'.$row->id.'">'.$row->section_name.'</option>';
        }
        return response()->json(['data'=>$data]);
    }



    // check section when click update btn then set the section for this select class //
    public function checkUpdateSection(Request $request){
       
        $sections = Section::where('section_class',$request->class_id)->get();
        $secId = $request->selected_section;
        $data = '<option value="">Select Section</option>';
        foreach ($sections as $section) {
            if($secId == $section->id){
                $data .= '<option value="'.$section->id.'" selected>'.$section->section_name.'</option>';
            }
            else{
                $data .= '<option value="'.$section->id.'">'.$section->section_name.'</option>';
            }
        }
        return response()->json(['data'=>$data]);
    }






}
