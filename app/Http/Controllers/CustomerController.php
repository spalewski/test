<?php


namespace App\Http\Controllers;

use App\Customer;
use App\Transaction;
use Illuminate\Support\Facades\DB;

class CustomerController
{
    public function addCustomer()
    {
        return view('addTransaction');
    }

    public function  searchCustomers(){
        $customers=new Customer();
        return view('customers')->with('customers', $customers->toArray());

    }

    public function putCustomer(){

        $request=$_POST;
        $customer_id = $request['customer_id'];

        $transaction = new Transaction();
        DB::table('transactions')
            ->where('customer_id', $customer_id)
            ->updateOrInsert([
                'customer_id' => $customer_id,
                'transaction_value' => $request['transaction_value'],
                'notes' => $request ['notes'],
                'transaction_date' => $request[ 'transaction_date'],
                'transaction_code' => $request['transaction_code'],
            ]);
        return redirect('/transactionAdd')->with('status', 'transakcja została dodana');
    }


    public function getCustomers()
    {
        $request = $_POST;
        $from = $request['order_date_from'];
        $to = $request['order_date_to'];
        $customer_id = $request['customer_id'];

        $transactions = DB::table('transactions')
            ->where('customer_id', '=', $customer_id)
            ->where('transaction_date', '>=', $from)
            ->where('transaction_date', '<=', $to)->get();


        return view('transactions')->with('transactions', $transactions->toArray());
    }

    public function deleteCustomer()
    {
        $request = $_POST;
        $transaction_code = $request['customer_id'];

        DB::table('transactions')
            ->where('transaction_code', $transaction_code)
            ->delete();

    }
}
