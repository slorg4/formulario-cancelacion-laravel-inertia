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
            $table->dropColumn([
                'old_material',
                'old_price',
                'client_id',
                'new_material',
                'new_price',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('refund_operations', function (Blueprint $table) {
            $table->text('old_material');
            $table->decimal('old_price', total: 9, places: 2);
            $table->foreignId('client_id')->constrained();
            $table->text('new_material');
            $table->decimal('new_price', total: 9, places: 2);
        });
    }
};
