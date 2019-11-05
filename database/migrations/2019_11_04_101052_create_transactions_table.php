<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {

                $table->bigIncrements('id');
                $table->bigInteger('foreign_id')->unsigned();
                $table->foreign('foreign_id')->references('id')->on('customers')->onDelete('cascade');
                $table->string('customer_id');
                $table->float('transaction_value');
                $table->string('transaction_code');
                $table->string('notes')->nullable();;
                $table->date('transaction_date');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
