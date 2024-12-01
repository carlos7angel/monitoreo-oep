<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('media_accreditation_rates', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('fid_accreditation')->nullable();
            $table->foreign('fid_accreditation')->references('id')->on('media_accreditations')->onDelete('cascade');

            $table->enum('type', ['Televisivo', 'Radial', 'Digital', 'Impreso']); //ENGLISH

            $table->enum('scope', [
                'Nacional', 'La Paz', 'Cochabamba', 'Santa Cruz', 'Oruro',
                'Potosí', 'Beni', 'Chuquisaca', 'Pando', 'Tarija'
            ]);

            $table->string('file_rate', 50)->nullable();

            $table->dateTime('submitted_at')->nullable();
            $table->timestamps();

            $table->index(['fid_accreditation', 'type', 'scope']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accreditations');
    }
};
