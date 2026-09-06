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
        Schema::create('letter_requests', function (Blueprint $table) {
            $table->id();

            $table->string('request_number')->unique();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('letter_type_id')
                ->constrained()
                ->restrictOnDelete();

            $table->text('purpose');

            $table->string('status')
                ->default('MENUNGGU VERIFIKASI');

            $table->text('admin_note')->nullable();

            $table->string('delivery_method')->nullable();

            $table->string('pickup_status')->nullable();

            $table->string('pdf_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_requests');
    }
};
