<?php

namespace App\Http\Controllers;

use App\District;
use App\Group_user;
use App\Organize;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;

class OrganizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizes = $this->getOrganizes()->orderBy('group_id', 'ASC')->paginate();
        $provinces = District::select('province')->distinct()->get();
        $amphoes = District::select('amphoe')->distinct()->get();
        $districts = District::select('district')->distinct()->get();

        return view('organize.index')->with(
            [
                'organizes'=> $organizes,
                'provinces' => $provinces,
                'amphoes' => $amphoes,
                'districts' => $districts
             ]);
    }

    function getOrganizes()
    {
        $filterData = Input::get();

        $organizes = Organize::with('getAreas')->select(
            '*'
        );

        $districts = District::select('*');
        $districts = $this->filter('districts', $districts, $filterData)->pluck('id');

        $organizes = $this->filter( 'organize', $organizes, $filterData);

        if(count($districts) > 0){
            $organizes->whereIn('district_id', $districts);
        }

        return $organizes;
    }

    public function apiGetOrganizes()
    {
        $organizes = $this->getOrganizes()->paginate();

        return response()->json(['status' => 'success', 'organize' => $organizes]);
    }


    public function filter($table, $model, $filterData)
    {

        foreach ($filterData as $key => $value) {
            //check whether users table has email column
            if (Schema::hasColumn($table, $key))
            {
                if (!empty($value)) {
                    $model->where("$key", 'LIKE', "%$value%");

                }
            }
        }
        return $model;
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

        return view('organize.create')->with([
            'organize'=>$organize,
            'group_user'=>$group_user
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zipcode = $request->input('zipcode');

        $address_data = District::where('zipcode', '=', $zipcode)->first();
//        dd(District::where('zipcode', '=', $zipcode)->first());
        if($address_data)

            $attributes = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required','string'] ,
                'fax' => ['required','string'] ,
                'email' => ['required','string','email'] ,
                'office_hours' => ['required','string'] ,
                'group_id' => ['required', 'integer'],
                'address' => ['required', 'string'],
            ]);
            $organize = new Organize();

            $organize->name = $request->name;
            $organize->phone = $request->phone;
            $organize->fax = $request->fax;
            $organize->email = $request->email;
            $organize->office_hours = $request->office_hours;
            $organize->group_id = $request->group_id;
            $organize->address = $request->address;
            $organize->district_id = $address_data->id;

            $organize->save();

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
    public function edit(Request $request,$id)
    {
        $zipcode = $request->input('zipcode');

        $address_data = District::where('zipcode', '=', $zipcode)->first();
        if($address_data)

           request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required','string'] ,
                'fax' => ['required','string'] ,
                'email' => ['required','string','email'] ,
                'office_hours' => ['required','string'] ,
                'group_id' => ['required', 'integer'],
                'address' => ['required', 'string'],
            ]);
        $organize = new Organize();

        $organize->name = $request->name;
        $organize->phone = $request->phone;
        $organize->fax = $request->fax;
        $organize->email = $request->email;
        $organize->office_hours = $request->office_hours;
        $organize->group_id = $request->group_id;
        $organize->address = $request->address;
        $organize->district_id = $address_data->id;

        $organize->save();

        return redirect()->action('OrganizeController@index');
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
        Organize::find($id)->delete();
    }
}
