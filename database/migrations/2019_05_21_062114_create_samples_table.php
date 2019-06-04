<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            
            $table->string('Study', 100)->nullable();
            $table->integer('CH_Num')->nullable();
            $table->date('Received_Date')->nullable();
            $table->smallInteger('Age')->nullable();
            $table->enum('Category', ['0', '1', '2', '3'])->default(0);  // 0 = Unclassified // 1 = New // 2 = Retreatment // 3 = Pre-treatment
            $table->string('Clinic', 50)->nullable();
            $table->string('Origin', 50)->nullable();
            $table->string('NHLS_No', 12)->nullable();
            $table->date('NHLS_Reg_Date')->nullable();
            $table->string('Remark', 50)->nullable();
 
            $table->string('Auramine', 25)->nullable();
            $table->string('ZN', 25)->nullable()->default('Pos');
            $table->string('Niacin', 25)->nullable()->default('Nia');
            $table->string('Capreo', 25)->nullable();
            $table->string('Inh', 25)->nullable();
            $table->string('Rif', 25)->nullable();
            $table->string('ETHAM', 25)->nullable();
            $table->string('ETHIO', 25)->nullable();
            $table->string('Ofloxacin', 25)->nullable();
            $table->string('Amikacin', 25)->nullable();
            $table->string('SM', 25)->nullable();
            $table->string('KANA5', 25)->nullable();
            $table->string('Pyriz', 25)->nullable();
            $table->string('THIA', 25)->nullable();
            $table->string('CYCLO', 25)->nullable();
            $table->string('Bedaquiline', 25)->nullable();
            $table->string('Clofazimine', 25)->nullable();
            $table->string('Delamanid', 25)->nullable();
            $table->string('Levofloxacin', 25)->nullable();
            $table->string('Linezolid', 25)->nullable();
            $table->string('Moxifloxacin_Low', 25)->nullable();
            $table->string('Moxifloxacin_High', 25)->nullable();
            $table->string('pAminosalicilic_Acid', 25)->nullable();
            $table->string('Rifabutin', 25)->nullable();
            $table->string('Resistance', 50)->nullable()->default('Unclassified');;
            
            $table->string('katG_1', 50)->nullable();
            $table->string('katG_2', 50)->nullable();
            $table->string('katG_F1', 25)->nullable();
            $table->string('katG_F3', 25)->nullable();
            $table->string('inhA', 25)->nullable();
            $table->string('inhAprom', 25)->nullable();
            $table->string('ahpC', 25)->nullable();
            $table->string('kasA', 25)->nullable();
            $table->string('ndh', 25)->nullable();
            $table->string('furA', 25)->nullable();
            $table->string('Rv0340', 25)->nullable();
            $table->string('fbpC', 25)->nullable();
            $table->string('iniA', 25)->nullable();
            $table->string('iniB', 25)->nullable();
            $table->string('iniC', 25)->nullable();
            $table->string('srmRhomo', 25)->nullable();
            $table->string('fabD', 25)->nullable();
            $table->string('accD6', 25)->nullable();
            $table->string('fadE24', 25)->nullable();
            $table->string('efpA', 25)->nullable();
            $table->string('Rv1592c', 25)->nullable();
            $table->string('Rv1772', 25)->nullable();
            $table->string('nhoA', 25)->nullable();
            $table->string('mabA', 25)->nullable();
            $table->string('rpoB_1', 50)->nullable();
            $table->string('rpoB_2', 50)->nullable();
            $table->string('embB', 25)->nullable();
            $table->string('pncA_1', 25)->nullable();
            $table->string('pncA_2', 25)->nullable();
            $table->string('gyrA', 25)->nullable();
            $table->string('rpsL', 25)->nullable();
            $table->string('rrs', 25)->nullable();
            $table->string('rrs500', 25)->nullable();
            $table->string('tlyA', 25)->nullable();
            $table->string('mutT2', 25)->nullable();
            $table->string('Ogt', 25)->nullable();
            $table->string('Rv3908', 25)->nullable();
            
            $table->string('Inh_mic', 25)->nullable();
            $table->string('Rif_mic', 25)->nullable();
            $table->string('Emb_mic', 25)->nullable();
            $table->string('Pza_mic', 25)->nullable();
            $table->string('SM_mic', 25)->nullable();
            $table->string('Eth_mic', 25)->nullable();
            
            $table->string('Eth_7_2', 1)->nullable();
            $table->string('Inh_0_2', 1)->nullable();
            $table->string('Rif_1_0', 1)->nullable();
            $table->string('Kana_5_0', 1)->nullable();
            $table->string('Str_2_0', 1)->nullable();
            $table->string('Ofl_2', 1)->nullable();
            $table->string('Ami_5', 1)->nullable();
            $table->string('Capreo_10', 1)->nullable();
            $table->string('Ofl_1', 1)->nullable();
            $table->string('Pza_100', 1)->nullable();
            
            $table->enum('WGS_Status', ['0', '1', '2', '3', '4', '5', '6', '7', '8'])->default(1); // 0 = not viable // 1 = unknown // 2 = not yet requested // 3 = request submitted // 4 = reculture // 5 = dna extraction done // 6 = quality check // 7 = sequencing // 8 = wgs complete
            
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
        Schema::dropIfExists('samples');
    }
}
