<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Group_user;
use App\Organize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    public function showRegister()
    {
//        if(route('register')){
            $group_user= Group_user::where('id', '=', 1)->get();
//            $group_user = DB::table('group_user')->where('id', '=', 1)->get();
            return view('auth.registerSuperAdmin')->with('group_user',$group_user);
//        }
//        else{
//            $group_user= Group_user::where('id', '>', 1)->get();
//            $organize = Organize::all();
////
////            $group_user = DB::table('group_user')->where('id', '>=', 2)->get();
////            $organize = DB::table('organize')->get();
//            return view('auth.register', ['organize' => $organize,'group_user' => $group_user]);
//        }

//        return view('auth.register',compact('organize'));
//        return view('auth.register')->with('group_user',$group_user,'organize',$organize);
    }
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'group_id' => ['required', 'integer' ],
            'organize_id' => ['required', 'integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'group_id' => $data['group_id'],
            'organize_id' => $data['organize_id'],
        ]);
    }
}
