<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique()->collation('utf8mb4_unicode_ci');
            $table->string('password')->collation('utf8mb4_unicode_ci')->nullable();
            $table->rememberToken();
            $table->enum('access', ['0', '1', '2', '3', '4', '5', '6'])->default(1); // 0 = view sample data only // 1 = view patient and sample data only // 2 = view and edit sample data // 3 = view sample and patient data and edit sample data // 4 = data capturer // 5 = request manager // 6 = admin
            $table->timestamp('email_verified_at')->nullable()->useCurrent();
            $table->timestamps();
        });

	    User::create([
            'email' => 'admin@localhost',
            'password' => Hash::make("admin"),
            'access' => '6',]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
