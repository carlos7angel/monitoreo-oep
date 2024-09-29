<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {

            $table->id();
            $table->string('unique_code')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->enum('form_type', ['form', 'subform'])->default('form');
            $table->unsignedBigInteger('form_parent_id')->nullable();
            $table->boolean('active')->default(1);
            $table->longText('form_schema_config')->nullable();
            $table->longText('form_schema_web')->nullable();
            $table->text('form_settings')->nullable();
            $table->text('form_metadata')->nullable();
            $table->string('form_class',100)->nullable();
            $table->text('form_style')->nullable();
            $table->string('shortcode',50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
