<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Route;

class TrainingVideosRequest extends Request {
    /*
     * Validating fired for Guest
     *
     * @return Boolean
     **/
    public function authorize()
    {
        return true;
    }

    /*
     * Validating users inputs after sign up
     * 
     * @return Array
     **/
    public function rules()
    {
        return [
            'training_level' => 'required',
        ];
    }
    public function messages(){
        return [
            'training_level.required' => 'Ուսուցման տեսակը չի կարող դատարկ լինել',
        ];
    }
}
