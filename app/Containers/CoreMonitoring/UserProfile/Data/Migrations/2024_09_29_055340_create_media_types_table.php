<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('media_types', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('fid_media_profile')->nullable();
            $table->foreign('fid_media_profile')->references('id')->on('media_profiles')->onDelete('cascade');
            $table->enum('type', ['Televisivo', 'Radial', 'Digital', 'Impreso']); //ENGLISH

            $table->enum('coverage', ['Nacional', 'La Paz', 'Cochabamba', 'Santa Cruz', 'Oruro', 'Potosí', 'Beni', 'Chuquisaca', 'Pando', 'Tarija'])->nullable();
            $table->enum('scope', ['Nacional', 'Departamental', 'Regional', 'Municipal', 'AIOC'])->nullable();
            $table->string('scope_department', 150)->nullable(); // 'Nacional', 'Departamental' => ARRAY ALWAYS
            $table->string('scope_area', 150)->nullable(); // 'Regional', 'Municipal', 'AIOC'

            $table->timestamps();
            $table->index(['fid_media_profile', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_types');
    }
};
