<?php

namespace App\Http\Controllers;

use App\Group_user;
use App\Organize;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrganizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        $group_user = Group_user::all()->where('id','>',1);
        return view('organize.create')->with('group_user',$group_user)->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $organize = Organize::all();
        $group_user = Group_user::all()->where('id','>',1);
////        dd($news_type,$organize);
        return view('organize.create')->with('organize', $organize)->with('group_user',$group_user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required','string'] ,
            'fax' => ['required','string'] ,
            'email' => ['required','string','email'] ,
            'office_hours' => ['required','string'] ,
            'group_id' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'district' => ['required', 'string'],
            'province' => ['required', 'string' ],
            'postcode' => ['required' ],
        ]);

        Organize::create($attributes);

        return redirect()->action('OrganizeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
