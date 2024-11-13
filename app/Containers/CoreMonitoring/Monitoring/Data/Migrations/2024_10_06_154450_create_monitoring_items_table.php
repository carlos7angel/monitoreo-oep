<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('monitoring_items', function (Blueprint $table) {

            $table->id();
            $table->string('code', 50)->unique();
            $table->enum('media_type', ['TV', 'RADIO', 'PRINT', 'DIGITAL', 'RRSS']);
            $table->unsignedBigInteger('fid_election')->nullable();
            $table->foreign('fid_election')->references('id')->on('elections')->onDelete('cascade');

            $table->boolean('registered_media')->default(true);
            $table->unsignedBigInteger('fid_media_profile')->nullable();
            $table->foreign('fid_media_profile')->references('id')->on('media_profiles')->onDelete('cascade');
            $table->string('other_media')->nullable();

            $table->unsignedBigInteger('fid_form')->nullable();
            $table->foreign('fid_form')->references('id')->on('forms')->onDelete('cascade');
            $table->json('data')->nullable();
            $table->json('render')->nullable();
            $table->enum('status', ['CREATED','SELECTED','ARCHIVED', 'REJECTED', 'FINISHED'])->default('CREATED');

            $table->enum('scope_type', ['TED','TSE'])->nullable();
            $table->string('scope_department', 50)->nullable();

            $table->unsignedBigInteger('registered_by');
            $table->foreign('registered_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('registered_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monitoring_items');
    }
};
