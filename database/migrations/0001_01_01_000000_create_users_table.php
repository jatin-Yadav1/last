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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->index();
            $table->string('username')->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('alternate_email')->nullable();
            $table->timestamp('alternate_email_verified_at')->nullable();
            $table->string('account_number')->unique()->index();
            $table->string('password');
            $table->string('number')->nullable();
            $table->timestamp('number_verified_at')->nullable();
            
            $table->string('alternate_number')->nullable();
            $table->timestamp('alternate_number_verified_at')->nullable();
            
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->string('heading')->nullable();
            $table->longText('bio')->nullable();
            $table->text('full_address')->nullable();
            
            $table->boolean('status')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
