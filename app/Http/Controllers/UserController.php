<?php

namespace App\Http\Controllers;

use App\Group_user;
use App\News;
use App\News_type;
use App\Organize;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $news_type = News_type::all();
        $organize = Organize::all();
        $group_user = Group_user::all();
//            ->where('id','>',1);
//        return view('cms.create-new-user');
       return view('cms.create-new-user', ['organize' => $organize,'group_user' => $group_user]);
    }
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'organize_id' => 'required',
            'group_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */


    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

    public function create()
    {
        $news_type = News_type::all();
        $organize = Organize::all();
        $group_user = Group_user::where('id','>',1)->get();
//
        return view('cms.create-new-user')->with('news_type', $news_type)->with('organize',$organize)->with('group_user',$group_user);
//
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'group_id' => ['required', 'integer' ],
            'organize_id' => ['required', 'integer'],
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'group_id' => $data['group_id'],
            'organize_id' => $data['organize_id'],
        ]);

        return redirect()->action('UserController@index');
    }
}
