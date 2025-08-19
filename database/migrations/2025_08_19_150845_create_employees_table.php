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
        Schema::create('employees', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('employee_id')->unique(); // HR/Payroll ID
            $table->string('full_name');
            $table->foreignUlid('department_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->foreignUlid('position_id')->nullable()->constrained('positions')->nullOnDelete();
            $table->string('email')->unique();
            $table->string('mobile_number')->nullable();
            $table->foreignUlid('bank_id')->nullable()->constrained('banks')->nullOnDelete();
            $table->string('bank_account_number')->nullable(); // store masked
            $table->enum('employment_status', ['active', 'resigned', 'retired'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
