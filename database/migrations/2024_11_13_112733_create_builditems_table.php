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
    {Schema::create('builditems', function (Blueprint $table) {
        $table->id();
        $table->foreignId('build_id');
        $table->foreignId('item_id');
        $table->foreignId('part_id');
        $table->timestamps();

        $table->foreign('build_id')->references('id')->on('builds')
            ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('item_id')->references('id')->on('items')
            ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('part_id')->references('id')->on('part')
            ->onUpdate('cascade')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builditems');
    }
};
