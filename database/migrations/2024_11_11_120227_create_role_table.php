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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Это создаст столбец id с типом unsignedBigInteger
            $table->string('role_code');
            $table->string('role_name');
            $table->timestamps();
        });
        DB::table('roles')->insert([
            ['role_code' => 'user', 'role_name' => 'User'],
            ['role_code' => 'admin', 'role_name' => 'Admin'],
        ]);
    }

    /**
     * Reverse the migrations.
     */

    public function down()
    {
        // Удаление связи с таблицей пользователей
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        // Удаление таблицы ролей
        Schema::dropIfExists('roles');
    }
};
