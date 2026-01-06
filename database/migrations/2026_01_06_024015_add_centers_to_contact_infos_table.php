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
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->text('center_1')->nullable()->after('location');
            $table->text('center_2')->nullable()->after('center_1');
            $table->text('center_3')->nullable()->after('center_2');
            $table->text('center_4')->nullable()->after('center_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->dropColumn(['center_1', 'center_2', 'center_3', 'center_4']);
        });
    }
};
