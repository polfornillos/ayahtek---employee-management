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
      // change the types of sLeave and eLeave column from string to date
        Schema::table('l_request', function (Blueprint $table) {
            $table->date('sLeave')->change();
            $table->date('eLeave')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('l_request', function (Blueprint $table) {
            $table->string('sLeave')->change();
            $table->string('eLeave')->change();
        });
    }
};
