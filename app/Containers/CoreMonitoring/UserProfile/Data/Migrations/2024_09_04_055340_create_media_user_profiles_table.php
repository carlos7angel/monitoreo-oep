<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('media_profiles', function (Blueprint $table) {

            $table->id();

            //$table->enum('type', ['Televisivo', 'Radial', 'Digital', 'Impreso']);
            $table->string('name', 100);
            $table->string('business_name', 100);
            $table->text('description')->nullable();
            // $table->string('type', 150);
            $table->string('email', 100);
            $table->string('logo', 150)->nullable();
            $table->dateTime('registration_date');
            $table->string('legal_address', 150)->nullable();

            $table->string('nit', 50)->nullable();
            $table->string('rep_full_name', 100)->nullable();
            $table->string('rep_document', 50)->nullable();
            $table->string('rep_exp', 20)->nullable();

            $table->string('contact_full_name', 150)->nullable();
            $table->string('cellphone', 50)->nullable();
            $table->string('website', 150)->nullable();
            $table->text('rrss')->nullable(); // JSON
            $table->string('dial', 100)->nullable();

            $table->string('file_power_attorney', 50)->nullable();
            $table->string('file_rep_document', 50)->nullable();
            $table->string('file_nit', 50)->nullable();

//            $table->enum('coverage', ['Nacional', 'La Paz', 'Cochabamba', 'Santa Cruz', 'Oruro', 'Potosi', 'Beni', 'Chuquisaca', 'Pando', 'Tarija'])->nullable();
//            $table->enum('scope', ['Nacional', 'Departamental', 'Municipal'])->nullable();
//            $table->string('scope_department', 150)->nullable(); // ARRAY
//            $table->string('scope_municipality', 150)->nullable();

            $table->boolean('media_type_television')->default(false);
            $table->boolean('media_type_radio')->default(false);
            $table->boolean('media_type_print')->default(false);
            $table->boolean('media_type_digital')->default(false);

            $table->enum('status', ['created', 'active', 'archived'])->default('created');
            $table->boolean('credentials_sent')->default(false);
            $table->unsignedBigInteger('fid_user')->nullable();
            $table->foreign('fid_user')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_profiles');
    }
};
