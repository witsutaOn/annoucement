<?php

namespace App\Http\Controllers;

use App\Group_user;
use App\News;
use App\News_type;
use App\Organize;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

//use Illuminate\Support\Facades\Auth;


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
        $group_id = Auth::user()->group_id;

        if ($group_id == 1) {
            $group_users = Group_user::all();
            $organizes = Organize::all();
            $users = $this->getUsers()->orderBy('group_id', 'ASC')->paginate();

            return view('cms.index')
                ->with([
                    'users' => $users,
                    'group_id' => $group_id,
                    'organizes' => $organizes,
                    'group_users' => $group_users
                ]);
        } else {

            $organize_id = Auth::user()->organize_id;
            $users = $this->getUsers()->where('organize_id', $organize_id)->orderBy('group_id', 'ASC')->paginate();

            return view('cms.index')
                ->with([
                    'users' => $users,
                    'group_id' => $group_id
                ]);

        }
    }

    function getUsers()
    {
        $filterData = Input::get();

        $users = User::select(
            '*'
        );

        $users = $this->filter($users, $filterData);

        return $users;
    }

    public function filter($model, $filterData)
    {
        foreach ($filterData as $key => $value) {
            //check whether users table has email column
            if (Schema::hasColumn('users', $key))
            {
                if (!empty($value)) {
                    $model->where("$key", 'LIKE', "%$value%");
                }
            }

        }
        return $model;
    }

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'organize_id' => 'required',
            'group_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */


    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function create()
    {
        $news_type = News_type::all();
//        dd(Auth::user()->group_id,Auth::user()->organize_id);
        if(Auth::user()->group_id !=1){
            $organize = Organize::all()->where('id','=',Auth::user()->organize_id);
        }else{
            $organize = Organize::all();
        }
        $group_user = Group_user::where('id', '>=', Auth::user()->group_id)->get();
//
        return view('cms.create-new-user')->with('news_type', $news_type)->with('organize', $organize)->with('group_user', $group_user);
//
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'group_id' => ['required', 'integer'],
            'organize_id' => ['required', 'integer'],
        ]);
        User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'group_id' => $data['group_id'],
            'organize_id' => $data['organize_id'],
        ]);

        return redirect()->action('UserController@index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if( Auth::user()->group_id < 3){
            if ($user and $user->group_id > Auth::user()->group_id)
                $user->delete();
        }

        return Redirect::action('UserController@index');
    }


}
