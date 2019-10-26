<?php

namespace App\Http\Controllers;

use App\UsersProfile;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function putUpdateUser(EditUserProfileRequest $request)
    {
        $userId=Auth::user()->id;
        $userProfile=UsersProfile::where("id", $userId)->first();
        if ($userProfile==null){
            $userProfile=new UsersProfile();
        }
            $user_name = $request->get('user_name');
            $user_surname = $request->get('user_surname');
            $phone = $request->get('phone');
            $address = $request->get('address');
            $country = $request->get('country');

            if ($user_name != '') {
                $userProfile->user_name = $user_name;
            }
            if ($user_surname != '') {
                $userProfile->user_surname = $user_surname;
            }
            if ($phone != '') {
                $userProfile->profile_visibility = $phone;
            }
            if ($address != '') {
                $userProfile->address = $address;
            }
            if ($country != '') {
                $userProfile->country = $country;
            }

            $userProfile->save();

        return response()->json(['user_profile_updated' => true], 201);
    }

    public function getUserProfile()
    {
        $userId=Auth::user()->id;
        $userProfile=UsersProfile::where("id", $userId)->first();
        if ($userProfile == null){
            return $userProfile = new UsersProfile();
        }
        return response()->json($userProfile);

//        $userProfile= new UsersProfile();
//
//
//        $userProfile->user_name = "Imię";
//        $userProfile->user_surname = "Nazwisko";
//        $userProfile->phone = "43543534";
//        $userProfile->address = "Adres";
//        $userProfile->country = "kraj";
//        $userProfile->profile_Id = $userId;
//        $userProfile1=$userProfile;
// $userProfile1->save();

//        $userProfile2=UsersProfile::where("id", $userId)->first();
//        echo($userProfile2->user_name);
    }
}
