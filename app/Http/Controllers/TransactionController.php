<?php


namespace App\Http\Controllers;


use App\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController
{
    public function addTransaction()
    {
        return view('addTransaction');
    }

    public function  searchTransactions(){
        $transactions=new Transaction();
        return view('transactions')->with('transactions', $transactions->toArray());

    }

    public function putTransaction(){

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


    public function getTransactions()
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

    public function deleteTransaction()
    {
        $request = $_POST;
        $transaction_code = $request['transaction_code'];

        DB::table('transactions')
            ->where('transaction_code', $transaction_code)
            ->delete();

    }
}
