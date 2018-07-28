<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
class FabRegistration extends Request {
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
            'fab_first_name'   => 'required',
            'fab_last_name'    => 'required',
            'fab_email'        => 'email',
            'fab_phone'        => 'required',
            'fab_address'      => 'required',
            'fab_birth_date'   => 'required',
        ];
    }

    public function messages()
    {
        \App::setLocale(request()->segment(count(request()->segments())));
        return [
            'fab_first_name.required'   => trans('site.alerts.fab_first_name_required'),
            'fab_last_name.required'    => trans('site.alerts.fab_last_name_required'),
            'fab_email.required'        => trans('site.alerts.fab_email_required'),
            'fab_phone.required'        => trans('site.alerts.fab_phone_required'),
            'fab_email.email'           => trans('site.alerts.fab_email_email'),
            'fab_address.required'      => trans('site.alerts.fab_address_required'),
            'fab_birth_date.required'   => trans('site.alerts.fab_birth_date_required'),
        ];
    }
}