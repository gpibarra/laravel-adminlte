<?php

namespace gpibarra\LaravelAdminLTE\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password'     => 'required',
            'new_password'     => 'required',
            'confirm_password' => 'required|same:new_password',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator
     *
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // check old password matches
            if (!Hash::check($this->input('old_password'), Auth::user()->password)) {
                $validator->errors()->add('old_password', trans('gpibarra::laraveladminlte.old_password_incorrect'));
            }
        });
    }
}
