<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
   Schema::table('users', function (Blueprint $table) {
    $table->string('license_number')->nullable();
    $table->date('license_expiry')->nullable();
    $table->date('dob')->nullable();
    $table->text('address')->nullable();
    $table->string('city')->nullable();
    $table->string('state')->nullable();
    $table->string('pincode')->nullable();
    $table->string('emergency_contact')->nullable();
    $table->string('profile_photo')->nullable();
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
