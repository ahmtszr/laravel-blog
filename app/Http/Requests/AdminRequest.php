<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'=>'required',
            'password'=>'required'
        ];
    }


    public function getCredenditals()
    {
        $username=$this->get('username');

        if ($this->isEmail($username)) {
            return [
                'username'=> $username,
                'password'=>$this->get('password')
            ];
        }
        return $this->only('username','password');
    }
    /**
     * Validate if provided parameter is valid email.
     *
     * @param $param
     * @return bool
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function isEmail($param)
    {
        $factory=$this->container->make(ValidationFactory::class);

        return !$factory->make(
            ['username'=>$param],
            ['username'=>'email']
        )->fails();
    }
}
