<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transac_id')->constrained('trans_histories', 'id');
            $table->string('prod_name');
            $table->decimal('current_price', 10, 2);
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_histories');
    }
};
