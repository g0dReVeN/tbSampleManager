<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nhlsid', 20)->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('surname', 32)->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('firstname', 64)->nullable()->collation('utf8mb4_unicode_ci');
            $table->enum('sex', ['0', '1', '2'])->nullable()->default(2); // 0 = male // 1 = female // 2 = unknown
            $table->date('dateofbirth')->nullable();
            $table->boolean('idcheck')->nullable()->default(0);
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
        Schema::dropIfExists('patients');
    }
}
