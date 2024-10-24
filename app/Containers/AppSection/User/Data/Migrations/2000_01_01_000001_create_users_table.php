<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->string('device')->nullable();
            $table->string('platform')->nullable();
            $table->boolean('is_client')->default(false);
            $table->integer('login_attempt')->nullable();
            $table->enum('type', ['TED', 'TSE'])->nullable();
            $table->enum('department', ['La Paz', 'Oruro', 'Potosí', 'Cochabamba', 'Chuquisaca', 'Tarija', 'Pando', 'Beni', 'Santa Cruz', 'Nacional'])->nullable();
            $table->rememberToken();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('profile_data_id')->nullable();
            $table->string('profile_data_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
