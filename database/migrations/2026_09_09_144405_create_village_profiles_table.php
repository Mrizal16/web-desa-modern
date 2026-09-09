<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('village_name')->default('Desa Sidorejo');

            $table->text('description')->nullable();

            $table->text('vision')->nullable();
            $table->text('mission')->nullable();

            $table->string('image')->nullable();

            $table->unsignedInteger('population')->nullable();
            $table->unsignedInteger('families')->nullable();
            $table->unsignedInteger('hamlets')->nullable();

            $table->unsignedInteger('rt')->nullable();
            $table->unsignedInteger('rw')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
};