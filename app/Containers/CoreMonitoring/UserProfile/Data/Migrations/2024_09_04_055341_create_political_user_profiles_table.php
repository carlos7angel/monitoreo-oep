<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('political_user_profiles', function (Blueprint $table) {

            $table->id();

            $table->string('name', 100);
            $table->string('initials', 50);
            $table->string('telephone', 50)->nullable();
            $table->string('cellphone', 50)->nullable();
            $table->string('email', 180);
//            $table->integer('fid_department')->unsigned();
//            $table->foreign('fid_department')->references('id')->on('states')->onDelete('cascade');
            $table->string('rep_first_name', 100);
            $table->string('rep_last_name', 100);
            $table->enum('rep_document_type', ['CI', 'CE'])->default('CI');
            $table->string('rep_document', 50);
            $table->string('rep_exp', 20)->nullable();
            $table->string('rep_nationality', 50);
            $table->string('rep_telephone', 50)->nullable();
            $table->string('rep_cellphone', 50)->nullable();
            $table->string('rep_email', 180);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('political_user_profiles');
    }
};
