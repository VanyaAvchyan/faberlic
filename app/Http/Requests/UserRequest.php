<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Route;

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
        $unique = strpos(request()->url(), 'update')? '': '|unique:users';
        return [
            'name'      => 'required',
            'email'     => 'required'.$unique,
            'username'  => 'required'.$unique,
//            'info'      => 'required'
        ];
    }
}
