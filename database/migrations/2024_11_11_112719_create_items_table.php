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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->integer('cost');
            $table->string('required_items', 100)->nullable();
            $table->foreignId('tier_id')->nullable();
            $table->foreignId('type_id')->nullable();
            $table->string('image', 255);
            $table->timestamps();

            $table->foreign('tier_id')->references('id')->on('tier')
                ->onUpdate('cascade')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('type')
                ->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
