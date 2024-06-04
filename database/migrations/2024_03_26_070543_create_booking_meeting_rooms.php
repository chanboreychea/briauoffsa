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
        Schema::create('booking_meeting_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('date', 50);
            $table->string('topicOfMeeting');
            $table->string('directedBy');
            $table->string('nameDirectedBy', 100);
            $table->string('meetingLevel');
            $table->string('regulator')->nullable();
            $table->string('interOfficeOrDepartmental')->nullable();
            $table->string('member');
            $table->string('room');
            $table->string('time');
            $table->text('description')->nullable();
            $table->string('isApprove', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_meeting_rooms');
    }
};
