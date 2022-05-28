<?php

namespace App\Http\Requests;

use App\Models\Registration;
use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest implements RequestInfo
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

    public function body(): Registration
    {
        $request = $this->request->all();
        $reg =  new Registration();
        $reg->email = $request['email'];
        $reg->phone_number = $request['phone_number'];
        $reg->first_name = $request['first_name'];
        $reg->last_name = $request['last_name'];
        $reg->password = $request['password'];

        return $reg;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
