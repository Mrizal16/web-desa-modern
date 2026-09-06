<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('letter_requests', 'admin_note')) {

            Schema::table('letter_requests', function (Blueprint $table) {
                $table->text('admin_note')->nullable()->after('status');
            });

        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('letter_requests', 'admin_note')) {

            Schema::table('letter_requests', function (Blueprint $table) {
                $table->dropColumn('admin_note');
            });

        }
    }
};