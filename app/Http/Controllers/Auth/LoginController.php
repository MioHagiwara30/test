<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'mail' => ['required','string','email','max:12','min:4'],
            'password' => ['required','string','min:4','max:12','regex:/\A([a-zA-Z0-9])+\z/u'],
        ],
    [
        'mail.required' => '必須項目です',
        'mail.email' => 'メールアドレスの形式ではありません',
        'mail.min' => '4文字以上で入力してください',
        'mail.max' => '12文字以下で入力してください',
        'password.required' =>'必須項目です',
        'password.min' => '4文字以上で入力してください',
        'password.max' => '12文字以下で入力してください',
        'password.regex' =>'半角英数字で入力してください',
    ])->validate();
}
    
    public function login(Request $request){
        if($request->isMethod('post')){
            
            $data=$request->only('mail','password','username');
            $this->validator($data);
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
                $auths = Auth::user();
                return redirect('/top',[ 'auths' => $auths ]);
            }
        }
        return view("auth.login");
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    
}
