<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('media_accreditations', function (Blueprint $table) {

            $table->id();
            $table->string('code', 50)->unique();
            $table->unsignedBigInteger('fid_election')->nullable();
            $table->foreign('fid_election')->references('id')->on('elections')->onDelete('cascade');
            $table->unsignedBigInteger('fid_user')->nullable();
            $table->foreign('fid_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('fid_media_profile')->nullable();
            $table->foreign('fid_media_profile')->references('id')->on('media_profiles')->onDelete('cascade');
            $table->enum('status', ['new', 'observed', 'accredited', 'archived', 'rejected'])->default('new');
            $table->text('observations')->nullable();
            $table->text('status_activity')->nullable();
            $table->string('file_affidavit', 50)->nullable();
            $table->string('file_request_letter', 50)->nullable();
            $table->string('file_pricing_list', 50)->nullable();
            $table->text('data')->nullable();
            $table->unsignedBigInteger('accredited_by')->nullable();
            $table->foreign('accredited_by')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('due_date_observed')->nullable();
            $table->dateTime('submitted_at');
            $table->dateTime('accredited_at')->nullable();
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accreditations');
    }
};
