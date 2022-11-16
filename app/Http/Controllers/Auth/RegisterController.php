<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Rules\alpha_num_check;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required','string','max:12','min:4'],
            'email' => ['required','string','email','max:12','min:4','unique:users'],
            'password' => ['required','string','min:4','max:12','confirmed','regex:/\A([a-zA-Z0-9])+\z/u'],
            'password_confirmation' => ['required','string','min:4','max:12','regex:/\A([a-zA-Z0-9])+\z/u'],
        ],
    [
        'username.required' => '必須項目です',
        'username.min' => '4文字以上で入力してください',
        'username.max' => '12文字以下で入力してください',
        'email.required' => '必須項目です',
        'email.email' => 'メールアドレスの形式ではありません',
        'email.min' => '4文字以上で入力してください',
        'email.max' => '12文字以下で入力してください',
        'email.unique' => '登録済みのアドレスです',
        'password.required' =>'必須項目です',
        'password.min' => '4文字以上で入力してください',
        'password.max' => '12文字以下で入力してください',
        'password.unique' => '使用されているパスワードです',
        'password_.same' => 'パスワードと不一致です',
        'password.regex' =>'半角英数字で入力してください',
        'password_confirmation.required' =>'必須項目です',
        'password_confirmation.min' => '4文字以上で入力してください',
        'password_confirmation.max' => '12文字以下で入力してください',
        'password_confirmation.unique' => '使用されているパスワードです',
        'password_confirmation.regex' =>'半角英数字で入力してください',
        'password_confirmation.same' => 'パスワードと不一致です',
    ])->validate();
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        dd($data);
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $this->validator($data);
            $this->create($data);
            return redirect('added');
        }
        return view('auth.register');

    }

    public function added(){
        return view('auth.added');
    }
}
