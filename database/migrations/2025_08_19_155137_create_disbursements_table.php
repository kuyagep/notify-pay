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
        Schema::create('disbursements', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('benefit_type_id')->constrained()->onDelete('restrict');
            $table->decimal('amount', 12, 2);
            $table->date('date_deposited');
            $table->string('reference_number')->nullable(); // bank/payroll reference
            $table->text('remarks')->nullable();
            $table->foreignId('encoded_by')->constrained('users')->onDelete('cascade'); // system user
            $table->timestamp('encoded_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursements');
    }
};
