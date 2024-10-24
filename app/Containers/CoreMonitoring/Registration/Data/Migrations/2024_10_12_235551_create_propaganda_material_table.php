<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('propaganda_material', function (Blueprint $table) {

            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->enum('type', ['LINK', 'FILE'])->default('FILE');
            $table->string('file_material', 50)->nullable();
            $table->string('link_material', 255)->nullable();
            $table->unsignedBigInteger('fid_political_registration')->nullable();
            $table->foreign('fid_political_registration')->references('id')->on('political_registrations')->onDelete('cascade');
            $table->unsignedBigInteger('fid_election')->nullable();
            $table->foreign('fid_election')->references('id')->on('elections')->onDelete('cascade');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
