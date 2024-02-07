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
        Schema::table('refund_operations', function (Blueprint $table) {
            $table->foreignId('new_invoice_id')->nullable(true)->change();
            $table->string('reason')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('refund_operations', function (Blueprint $table) {
            $table->foreignId('new_invoice_id')->nullable(false)->change();
            $table->string('reason')->nullable(false)->change();
        });
    }
};
