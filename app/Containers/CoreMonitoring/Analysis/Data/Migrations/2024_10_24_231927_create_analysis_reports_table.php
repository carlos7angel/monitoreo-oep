<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('analysis_reports', function (Blueprint $table) {

            $table->id();
            $table->string('code', 50)->unique();
            $table->unsignedBigInteger('fid_monitoring_report')->nullable();
            $table->foreign('fid_monitoring_report')->references('id')->on('monitoring_reports')->onDelete('cascade');
            $table->unsignedBigInteger('fid_election')->nullable();
            $table->foreign('fid_election')->references('id')->on('elections')->onDelete('cascade');
            $table->enum('status', [
                'NEW',
                'SUBMITTED_SECRETARIAT',
                'RECEIVED_SECRETARIAT',
                'UNTREATED',
                'RADICADO',
                'FIRST_INSTANCE_RESOLUTION',
                'FINAL_RESOLUTION',
                'SUBMITTED_PLENARY',
                'REJECTED',
                'RATIFIED',
            ])->default('NEW');

            $table->string('file_resolution_first', 100)->nullable();
            $table->string('file_resolution_final', 100)->nullable();
            $table->text('observations')->nullable();

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->enum('scope_type', ['TED','TSE'])->nullable();
            $table->string('scope_department', 50)->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
