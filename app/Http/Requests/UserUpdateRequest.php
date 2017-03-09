<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/3/9
 * Time: 11:25
 */
namespace App\Http\Requests;

use App\Http\Requests\Request;
class UserUpdateRequest extends Request
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
             'name' => 'required',
             'email' => 'required',
             'status' => 'required',

        ];
    }
}
