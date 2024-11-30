<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('political_group_profiles', function (Blueprint $table) {

            $table->id();
            $table->string('name', 100);
            $table->string('initials', 50);
            $table->string('email', 180);
            $table->string('logo', 150)->nullable();
            $table->string('cellphone', 50)->nullable();
            $table->dateTime('foundation_date')->nullable();
            $table->text('description')->nullable();

            $table->string('rep_full_name', 150);
            $table->string('rep_document', 50);
            $table->string('rep_exp', 20)->nullable();
            $table->string('rep_nationality', 50)->nullable();
            $table->string('rep_cellphone', 50)->nullable();
            $table->string('rep_email', 180)->nullable();

            $table->string('file_power_attorney', 50)->nullable();
            $table->string('file_rep_document', 50)->nullable();

            $table->enum('status', ['CREATED', 'ACTIVE', 'ARCHIVED'])->default('ACTIVE');
            $table->boolean('credentials_sent')->default(false);
            $table->unsignedBigInteger('fid_user')->nullable();
            $table->foreign('fid_user')->references('id')->on('users')->onDelete('cascade');

            $table->dateTime('registered_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('political_user_profiles');
    }
};
