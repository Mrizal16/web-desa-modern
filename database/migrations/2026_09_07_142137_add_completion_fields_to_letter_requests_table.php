<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('letter_requests', function (Blueprint $table) {
            $table->string('final_delivery_method')->nullable()->after('delivery_method');
            $table->string('result_file_path')->nullable()->after('final_delivery_method');
            $table->timestamp('completed_at')->nullable()->after('result_file_path');
        });
    }

    public function down(): void
    {
        Schema::table('letter_requests', function (Blueprint $table) {
            $table->dropColumn([
                'final_delivery_method',
                'result_file_path',
                'completed_at',
            ]);
        });
    }
};