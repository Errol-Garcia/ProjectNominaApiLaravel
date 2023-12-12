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
        Schema::create('log_payrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('worked_days');
            $table->integer('extra_hours');
            $table->float('hour_value');
            $table->float('bono');
            $table->float('accrued_value');
            $table->float('discount_value');
            $table->float('net_income');
            $table->date('registration_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_payrolls');
    }
};