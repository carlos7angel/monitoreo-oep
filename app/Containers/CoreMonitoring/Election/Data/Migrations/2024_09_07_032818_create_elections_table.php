<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('elections', function (Blueprint $table) {

            $table->id();

            $table->string('code', 50)->unique();
            $table->string('name', 150)->unique();
            $table->text('description')->nullable();
            $table->string('logo_image', 150)->nullable();
            $table->string('banner', 150)->nullable();
            $table->enum('type', ['Generales', 'Primarias', 'Subnacionales', 'Judiciales', 'Referendos'])->default('Generales'); //*
            $table->date('election_date')->nullable();
            $table->enum('status', ['draft', 'active', 'unpublished', 'finished', 'archived', 'canceled'])->default('draft');

            // WEB
            $table->boolean('show_web')->default(false);

            // MEDIA REGISTRATION SETTINGS
            $table->boolean('enable_for_media_registration')->default(false);
            $table->dateTime('start_date_media_registration')->nullable();
            $table->dateTime('end_date_media_registration')->nullable();
            $table->unsignedBigInteger('fid_form_media_registration')->nullable();
            $table->foreign('fid_form_media_registration')->references('id')->on('forms')->onDelete('cascade');
            $table->string('file_bases_media_registration', 150)->nullable();
            $table->string('file_affidavit_media_registration', 150)->nullable();
            $table->integer('due_days_observed_media_registration')->nullable();

            // MONITORING SETTINGS
            $table->boolean('enable_for_monitoring')->default(false);
            $table->unsignedBigInteger('fid_form_tv_media')->nullable();
            $table->foreign('fid_form_tv_media')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('fid_form_radio_media')->nullable();
            $table->foreign('fid_form_radio_media')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('fid_form_print_media')->nullable();
            $table->foreign('fid_form_print_media')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('fid_form_digital_media')->nullable();
            $table->foreign('fid_form_digital_media')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('fid_form_rrss_media')->nullable();
            $table->foreign('fid_form_rrss_media')->references('id')->on('forms')->onDelete('cascade');

            // PP SETTINGS
            $table->boolean('enable_for_political_registration')->default(false);
            $table->dateTime('start_date_political_registration')->nullable();
            $table->dateTime('end_date_political_registration')->nullable();
            $table->text('description_for_political_registration')->nullable();
            $table->integer('max_size_for_political_registration')->nullable();
            $table->text('mime_types_for_political_registration')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};
