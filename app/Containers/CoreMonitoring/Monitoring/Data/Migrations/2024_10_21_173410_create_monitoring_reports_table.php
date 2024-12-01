<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('monitoring_reports', function (Blueprint $table) {

            $table->id();
            $table->string('code', 50)->unique();
            $table->unsignedBigInteger('fid_election')->nullable();
            $table->foreign('fid_election')->references('id')->on('elections')->onDelete('cascade');
            $table->enum('status', [
                'NEW', 'SUBMITTED', 'IN_PROGRESS', 'REJECTED', 'FINISHED', 'ARCHIVED'
            ])->default('NEW');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('submitted_at')->nullable();
            $table->text('observations')->nullable();

            $table->enum('scope_type', ['TED','TSE'])->nullable();
            $table->string('scope_department', 50)->nullable();
            $table->unsignedBigInteger('fid_monitoring_item');
            $table->foreign('fid_monitoring_item')->references('id')->on('monitoring_items')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monitoring_reports');
    }
};
