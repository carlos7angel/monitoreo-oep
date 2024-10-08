<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('elections', function (Blueprint $table) {

            $table->id();

            $table->string('code', 50)->unique();
            $table->string('name', 150)->unique();
            $table->text('description')->nullable();
            $table->string('logo_image', 150)->nullable();
            $table->enum('type', ['Generales', 'Primarias', 'Subnacionales', 'Judiciales', 'Referendos'])->default('Generales'); //*
            $table->date('election_date')->nullable();

            $table->enum('status', ['draft', 'active', 'unpublished', 'finished', 'archived', 'canceled'])->default('draft');

            // WEB
            $table->boolean('show_web')->default(false);

            // MEDIA REGISTRATION
            $table->boolean('enable_for_media_registration')->default(false);

            $table->dateTime('start_date_media_registration')->nullable();
            $table->dateTime('end_date_media_registration')->nullable();

            $table->unsignedBigInteger('fid_form_media_registration')->nullable();
            $table->foreign('fid_form_media_registration')->references('id')->on('forms')->onDelete('cascade');
            $table->string('file_bases_media_registration', 150)->nullable();
            $table->string('file_affidavit_media_registration', 150)->nullable();
            $table->integer('due_days_observed_media_registration')->nullable();

            // PP SUBMIT DATA
            // $table->boolean('enable_for_pp_upload_data')->default(false);
            // $table->dateTime('start_date_pp_upload_data')->nullable();
            // $table->dateTime('end_date_pp_upload_data')->nullable();

            // MONITORING SETTINGS
            $table->boolean('enable_for_monitoring')->default(false);

            $table->boolean('enable_monitoring_tv_media')->default(false);
            $table->boolean('enable_monitoring_radio_media')->default(false);
            $table->boolean('enable_monitoring_digital_media')->default(false);
            $table->boolean('enable_monitoring_print_media')->default(false);
            $table->boolean('enable_monitoring_rrss_media')->default(false);

            $table->unsignedBigInteger('fid_form_tv_media')->nullable();
            $table->foreign('fid_form_television_media')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('fid_form_radio_media')->nullable();
            $table->foreign('fid_form_radio_media')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('fid_form_print_media')->nullable();
            $table->foreign('fid_form_print_media')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('fid_form_digital_media')->nullable();
            $table->foreign('fid_form_digital_media')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('fid_form_rrss_media')->nullable();
            $table->foreign('fid_form_rrss_media')->references('id')->on('forms')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};
