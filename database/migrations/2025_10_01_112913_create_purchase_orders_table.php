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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();

            $table->integer('voucher_type'); // 1: Factura, 2: Boleta

            $table->string('series');

            $table->integer('correlative');

            $table->timestamp('date');

            $table->foreignId('supplier_id')
                ->constrained()
                ->onDelete('cascade');

            $table->decimal('total', 10, 2)
                ->default(0.00);

            $table->string('observations')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
