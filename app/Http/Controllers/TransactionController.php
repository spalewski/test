<?php


namespace App\Http\Controllers;


use App\Transaction;
use App\UsersProfile;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController
{
    public function addTransaction()
    {

    }

    public function  searchTransactions(){

        return view('transactions');

    }

    public function getTransactions()
    {
        $request = $_POST;
        $from = $request['order_date_from'];
        $to = $request['order_date_to'];
        $customer_id = $request['customer_id'];

        $transactions = DB::table('transactions')
            ->where('customer_id', '=', $customer_id)
            ->where('created_at', '>=', $from)
            ->where('created_at', '<=', $to)->get();


        return view('transactions')->withCharacters($transactions->toArray());
    }

    private function creteEmptyTransaction()
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
