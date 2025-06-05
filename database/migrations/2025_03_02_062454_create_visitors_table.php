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
        Schema::create('visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address')->nullable();
            $table->string('device')->nullable();
            $table->string('device_type')->nullable(); // Mobile, Desktop, Tablet
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->text('user_agent')->nullable();
            $table->integer('visit_count')->default(1);
            $table->text('page_url')->nullable();
            $table->string('referrer')->nullable();
            
            // Geo-location fields
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('region')->nullable();
            $table->string('region_name')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->string('timezone')->nullable();
            $table->string('isp')->nullable();
            $table->string('organization')->nullable();
            
            $table->json('extra_data')->nullable(); // Store any additional JSON data
            $table->timestamp('visit_time')->useCurrent();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
