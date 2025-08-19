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
        Schema::create('notifications', function (Blueprint $table) {
            $table->ulid('id')->primary(); // Notification ID
            $table->foreignUlid('disbursement_id')
                ->constrained('disbursements')
                ->onDelete('cascade'); // Link to benefit disbursement

            $table->enum('notification_type', ['email', 'sms', 'push']);
            $table->text('message_content');
            $table->enum('status', ['sent', 'failed', 'pending'])->default('pending');
            $table->timestamp('sent_at')->nullable();

            $table->foreignId('sent_by')->nullable()
                ->constrained('users')
                ->nullOnDelete(); // Can be null if system-automated

            $table->text('error_logs')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
