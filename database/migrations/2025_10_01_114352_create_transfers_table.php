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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();

            $table->string('series');

            $table->integer('correlative');

            $table->timestamp('date');

            $table->decimal('total', 10, 2)
                ->default(0.00);

            $table->string('observations')
                ->nullable();

            $table->foreignId('origin_warehouse_id')
                ->constrained('warehouses')
                ->onDelete('cascade');

            $table->foreignId('destination_warehouse_id')
                ->constrained('warehouses')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
