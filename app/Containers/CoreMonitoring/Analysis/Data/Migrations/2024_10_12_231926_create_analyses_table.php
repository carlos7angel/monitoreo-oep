<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('analysis', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('fid_election')->nullable();
            $table->foreign('fid_election')->references('id')->on('elections')->onDelete('cascade');
            $table->enum('status', ['SUBMITTED', 'APPROVED', 'REJECTED'])->default('SUBMITTED');
            $table->unsignedBigInteger('registered_by');
            $table->foreign('registered_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('submitted_at')->nullable();
            $table->text('evaluation_criteria')->nullable();
            $table->string('file_resolution', 100)->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
