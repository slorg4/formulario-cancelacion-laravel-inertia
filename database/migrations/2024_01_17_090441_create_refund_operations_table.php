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
        Schema::create('refund_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained();
            $table->foreignId('old_invoice_id')->references('id')->on('invoices');
            $table->text('old_material');
            $table->decimal('old_price', total:9, places: 2);
            $table->foreignId('client_id')->constrained();
            $table->foreignId('new_invoice_id')->references('id')->on('invoices');
            $table->text('new_material');
            $table->decimal('new_price', total: 9, places: 2);
            $table->string('reason');
            $table->string('authorized_by');
            $table->foreignId('operation_type_id')->constrained();
            $table->timestamps();

            $table->index('partner_id');
            $table->index('old_invoice_id');
            $table->index('new_invoice_id');
            $table->index('operation_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refund_operations');
    }
};
