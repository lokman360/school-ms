<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'st_name'=>'required',
            'st_f_name'=>'required',
            'st_phone'=>'required|max:11',
            'st_present_add'=>'required',
            'st_religion'=>'required',
            'st_class'=>'required',
            'st_session'=>'required',
            'st_roll_no'=>'required'
        ]
    }

    public function messages(){
        return[
            'st_name.required'=>'The Name filed is required',
            'st_f_name.required'=>'The Father Name filed is required',
            'st_phone.required'=>'The Phone filed is required',
            'st_phone.max'=>'The Phone must be 11 digit',
            'st_present_add.required'=>'The Pressent Address filed is required',
            'st_religion.required'=>'The Religion filed is required',
            'st_class.required'=>'The Class filed is required',
            'st_roll_no.required'=>'The Roll filed is required',
            'st_session.required'=>'The Session filed is required',

        ]
    }
}
