<?php
/**
 *  本文件的意义在于处理request请求的参数处理，包含参数获取，参数校验
 */
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exception\HttpResponseException;
class UsersRequest extends Request
{
    /**
     * 验证出错返回
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->all();
        throw new HttpResponseException(response()->json(
            [
                'statusCode' => config('100'),
                'msg'        => implode(',', $error),
                'success'    => false
            ], 200)
        );
    }
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
            'name' => 'required|string',
            'sex'  => 'required|in:1,2',
            'age'  => 'required|integer'
        ];
    }

    /**
     * 错误提示
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'      => '姓名必传',
            'sex.required'       => '性别必传',
            'age.required'       => '年龄必传',
        ];
    }
}

/**
 * 处理email的request请求
 */
class EmailReuest extends UsersRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required',
        ];
    }
}
