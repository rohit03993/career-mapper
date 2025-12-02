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
        Schema::create('test_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_page_id')->nullable()->constrained('test_pages')->onDelete('set null');
            $table->string('name');
            $table->string('contact_number'); // Format: +91XXXXXXXXXX
            $table->string('email');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_bookings');
    }
};
