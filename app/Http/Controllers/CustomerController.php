<?php


namespace App\Http\Controllers;

use App\Customer;
use App\Transaction;
use Illuminate\Support\Facades\DB;

class CustomerController
{
    public function addCustomer()
    {
        return view('addCustomer');
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
                'customer_name' => $request['customer_name'],
                'customer_surname' => $request ['customer_surname'],
                'email' => $request[ 'email'],
                'phone' => $request['phone'],
                'notes' => $request['notes'],

            ]);
        return redirect('/customerAdd')->with('status', 'klient został dodany');
    }


    public function getCustomers()
    {
        $request = $_POST;
        $customerSurname = $request['customer_surname'];

        $customer_id = $request['customer_id'];

        $customers = DB::table('customers')
            ->where('customer_id', '=', $customer_id)
            ->where('surname', '=', $customerSurname)
           ->get();

        return view('customers')->with('customers', $customers->toArray());
    }

    public function deleteCustomer()
    {
        $request = $_POST;
        $customer_id = $request['customer_id'];

        $customer=DB::table('customers')
            ->where('customer_id', $customer_id)
            ->delete();

        $customers=new Customer();
        return view('customers')->with('customers', $customers->toArray());
    }
}
