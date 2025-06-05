<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_general_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();

            // Notification preferences
            $table->boolean('email_notifications')->default(true); 
            $table->boolean('sms_notifications')->default(false);
            $table->boolean('push_notifications')->default(true);

            // Appearance settings
            $table->boolean('dark_mode')->default(false);
            $table->string('language', 10)->default('en');

            // Security settings
            $table->boolean('two_factor_authentication')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_general_settings');
    }
};
