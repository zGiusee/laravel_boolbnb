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
        Schema::table('apartment_subscription', function (Blueprint $table) {
            $table->dateTime('starting_time', precision: 0)->change();
            $table->dateTime('ending_time', precision: 0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartment_subscription', function (Blueprint $table) {
            $table->date('starting_time')->change();
            $table->date('ending_time')->change();
        });
    }
};
