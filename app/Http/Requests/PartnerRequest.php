<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
class PartnerRequest extends Request {
    /*
     * Validating fired for Guest
     *
     * @return Boolean
     **/
    public function authorize()
    {
        return auth()->check();
    }
    /*
     * Validating users inputs after sign up
     * 
     * @return Array
     **/
    public function rules()
    {
        return [
//            'title_am'       => 'required',
//            'title_ru'       => 'required',
//            'title_en'       => 'required',
//            'description_am' => 'required',
//            'description_ru' => 'required',
//            'description_en' => 'required',
        ];
    }
}