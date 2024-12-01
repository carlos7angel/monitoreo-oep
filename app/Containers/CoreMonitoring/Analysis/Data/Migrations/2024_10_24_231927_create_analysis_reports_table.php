<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('analysis_reports', function (Blueprint $table) {

            $table->id();
            $table->string('code', 50)->unique();
            $table->unsignedBigInteger('fid_monitoring_report')->nullable();
            $table->foreign('fid_monitoring_report')->references('id')->on('monitoring_reports')->onDelete('cascade');
            $table->unsignedBigInteger('fid_election')->nullable();
            $table->foreign('fid_election')->references('id')->on('elections')->onDelete('cascade');

            $table->enum('place', ['IN_ANALYST', 'IN_SECRETARIAT', 'IN_PLENARY'])->default('IN_ANALYST');

            $table->enum('status', [
                'NEW',
                'REJECTED',

                'UNTREATED',
                'IN_TREATMENT',
                'COMPLEMENTARY_REPORT',

                //'FIRST_INSTANCE_RESOLUTION',

                'UNTREATED_PLENARY',
                'IN_TREATMENT_PLENARY',
                'COMPLEMENTARY_REPORT_PLENARY',

                'SECOND_INSTANCE_RESOLUTION',

                //'FINAL_RESOLUTION',
                'FINALIZED',
                'ARCHIVED',
            ])->default('NEW');

            $table->string('file_analysis_report', 100)->nullable();
            $table->string('file_analysis_report_complementary', 100)->nullable();
            $table->string('file_analysis_report_complementary_plenary', 100)->nullable();


            $table->string('file_resolution_first_instance', 100)->nullable();
            $table->string('file_resolution_second_instance', 100)->nullable();
            $table->string('file_resolution_final_instance', 100)->nullable();
            $table->string('file_additional_attachment', 100)->nullable();
            $table->text('observations')->nullable();

            $table->enum('final_status', ['Suspención', 'Sanción', 'Desestimación'])->nullable();

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('fid_last_analysis_report_activity')->nullable();

            $table->enum('scope_type', ['TED','TSE'])->nullable();
            $table->string('scope_department', 50)->nullable();

            $table->enum('scope_type_secretariat', ['TED','TSE'])->nullable();
            $table->string('scope_department_secretariat', 50)->nullable();

            $table->enum('scope_type_plenary', ['TED','TSE'])->nullable();
            $table->string('scope_department_plenary', 50)->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
