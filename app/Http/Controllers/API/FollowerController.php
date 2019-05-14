<?php


namespace App\Http\Controllers\API;


use App\Follower;
use App\Http\Controllers\Controller;
use App\News;

class FollowerController extends Controller
{

    public function getFollowOrg($end_user_id){

        $orgs = Follower::where("end_user_id",$end_user_id)->get();

        return $orgs;
    }


    public function followOrg($end_user_id,$organize_id){

        // FOLLOW LOGIC
        $org = Follower::where("end_user_id",$end_user_id)->where("organize_id",$organize_id)->first();

        if($org){
            $org->delete();
        }else{
            $org = new Follower();
            $org->organize_id = $organize_id;
            $org->end_user_id = $end_user_id;
            $org->save();
        }


        return $this->getFollowOrg($end_user_id);
    }

    public function showFollow($end_user_id){


        $orgs = Follower::where("end_user_id",$end_user_id)->get();

        $data["orgs"] = $orgs;

        return view("follower.test",$data);
    }

}