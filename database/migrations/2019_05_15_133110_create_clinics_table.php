<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clinic', 100)->collation('utf8mb4_unicode_ci');
            $table->string('origin', 100)->collation('utf8mb4_unicode_ci');
            $table->enum('type', ['0', '1', '2', '3', '4', '5'])->nullable()->default(null); // 0 = clinic // 1 = mobile // 2 = secondaryhospital // 3 = aidedhospital // 4 = tbhospital // 5 = tertiaryhospital
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
        Schema::dropIfExists('clinics');
    }
}
