<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
class UserRequest extends Request {
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
            'name'      => 'required',
            'email'     => 'required',
            'username'  => 'required',
            'info'      => 'required'
        ];
    }
}
