<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('letter_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('letter_requests', 'pickup_status')) {
                $table->string('pickup_status')->nullable()->after('final_delivery_method');
            }
        });
    }

    public function down(): void
    {
        Schema::table('letter_requests', function (Blueprint $table) {
            if (Schema::hasColumn('letter_requests', 'pickup_status')) {
                $table->dropColumn('pickup_status');
            }
        });
    }
};