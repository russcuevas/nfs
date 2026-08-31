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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique();
            $table->enum('registration_type', ['contestant', 'guest']);
            $table->string('name');
            $table->boolean('is_ublc')->default(false);
            $table->string('school');
            $table->string('contest_category')->nullable();
            $table->string('contact_number')->nullable();
            $table->enum('ticket_type', ['day1', 'day2', 'both']);
            $table->integer('ticket_price');
            $table->string('email');
            $table->string('gcash_name');
            $table->string('gcash_number');
            $table->string('reference_number');
            $table->string('payment_screenshot');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
