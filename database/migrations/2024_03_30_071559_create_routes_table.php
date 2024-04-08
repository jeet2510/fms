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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->integer('origin_city_id')->nullable();
            $table->integer('destination_city_id')->nullable();
            $table->unsignedBigInteger('border_id');
            $table->text('route');
            $table->unsignedInteger('fare')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
