<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\UsersProfile;
use App\VerifyUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;


class UserProfileController extends Controller

{

    public function putUpdateUser()
    {
        $request=$_POST;
        $userId = Auth::user()->id;
        $userProfile = UsersProfile::where("profile_id", $userId)->first();
       if ($userProfile === null) {
           $this->creteEmptyProfile($userProfile);
        }

        $user_name = $request['user_name'];
        $user_surname = $request['user_surname'];
        $phone = $request['phone'];
        $address = $request['address'];
        $country = $request['country'];

        if (UsersProfile::where("profile_id", $userId)->first() === null) {
            $userProfile = new UsersProfile();
            DB::table('users_profiles')
                ->where('profile_id', $userId)
                ->updateOrInsert([
                    'profile_id' => $userId,
                    'user_name' => $user_name,
                    'user_surname' => $user_surname,
                    'phone' => $phone,
                    'address' => $address,
                    'country' => $country,
                ]);
        }


        DB::table('users_profiles')
            ->where('profile_id', $userId)
            ->update([
                'profile_id' => $userId,
                'user_name' => $user_name,
                'user_surname' => $user_surname,
                'phone' => $phone,
                'address' => $address,
                'country' => $country,
            ]);

        $userProfile = UsersProfile::where("profile_id", $userId)->first();
        return view('userProfile')->withCharacters( $userProfile->toArray());
    }

    public function getUserProfile()
    {
        $userId = Auth::user()->id;
        $userProfile = UsersProfile::where("profile_id", $userId)->first();
        if ($userProfile === null) {
            $userProfile = $this->creteEmptyProfile();
        }
        return view('userProfile')->withCharacters( $userProfile->toArray());
    }

    private function creteEmptyProfile()
    {
        $userProfile = new UsersProfile();
        $userProfile->user_name = 'user name';
        $userProfile->user_surname = 'user surname';
        $userProfile->phone = "user phone";
        $userProfile->address = "user address";
        $userProfile->country = "user country";
        return $userProfile;
    }

}
