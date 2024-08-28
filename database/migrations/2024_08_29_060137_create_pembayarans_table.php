<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->char('customer_id', 36);
            $table->integer('bulan');
            $table->integer('tahun');
            $table->decimal('amount', 10, 2);
            $table->timestamps();


            // Unique key for customer_id, bulan, and tahun
            $table->unique(['customer_id', 'bulan', 'tahun']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
