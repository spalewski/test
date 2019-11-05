<?php


namespace App\Http\Controllers;

use App\Customer;
use App\Transaction;
use App\UsersProfile;
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

    public function putCustomer()
    {
        $request = $_POST;
        $customer_id = $request['customer_id'];

        if (Customer::where("customer_id", $customer_id)->first() === null) {
            $customer = new Customer();
            DB::table('customers')
                ->where('customer_id', $customer_id)
                ->updateOrInsert([
                    'customer_id' => $customer_id,
                    'name' => $request['customer_name'],
                    'surname' => $request ['customer_surname'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'notes' => $request['notes'],
                ]);
            return redirect('/customerAdd')->with('status', 'klient został dodany');
        } else {
            $customer = new Customer();
            DB::table('customers')
                ->where('customer_id', $customer_id)
                ->update([
                    'customer_id' => $customer_id,
                    'name' => $request['customer_name'],
                    'surname' => $request ['customer_surname'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'notes' => $request['notes'],

                ]);
            return redirect('/customerAdd')->with('status', 'klient został zaktualizowany');
        }
    }

    public function getCustomers()
    {
        $request = $_POST;
        $customerSurname = $request['customer_surname'];
        $customer_id = $request['customer_id'];
        $customers=[];

        if($customerSurname==null||$customer_id==null){
            $customers = DB::table('customers')->get();}
        else {

            $customers = DB::table('customers')
                ->where('customer_id', '=', $customer_id)
                ->where('surname', '=', $customerSurname)
                ->get();
        }
        return view('customers')->with('customers', $customers->toArray());
    }

    public function deleteCustomer()
    {
        $request = $_POST;
        $customer_id = $request['customer_id'];

        DB::table('customers')
            ->where('customer_id', $customer_id)
            ->delete();

        DB::table('transactions')
            ->where('customer_id', $customer_id)
            ->delete();

        $customers=new Customer();
        return view('customers')->with('customers', $customers->toArray());
    }
}
