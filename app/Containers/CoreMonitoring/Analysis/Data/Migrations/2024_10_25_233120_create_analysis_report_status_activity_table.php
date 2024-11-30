<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('analysis_report_status_activity', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('fid_analysis_report')->nullable();
            $table->foreign('fid_analysis_report')->references('id')->on('analysis_reports')->onDelete('cascade');

            $table->string('status', 50);
            $table->string('previous_status', 50)->nullable();

            $table->unsignedBigInteger('registered_by');
            $table->foreign('registered_by')->references('id')->on('users')->onDelete('cascade');

            $table->text('observations')->nullable();

            $table->timestamp('registered_at');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analysis_report_status_activity');
    }
};
