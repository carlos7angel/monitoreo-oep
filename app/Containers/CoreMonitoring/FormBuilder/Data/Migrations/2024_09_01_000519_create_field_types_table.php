<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('field_types', function (Blueprint $table) {

            $table->id();
            $table->string('name', 50);
            $table->enum('type', ['textbox','textarea','select','datepicker','checkbox','fileupload','hidden','button','table','html']);
            $table->text('description')->nullable();
            $table->enum('category', ['form_element', 'html_element', 'advanced_element'])->default('form_element');
            $table->text('options')->nullable();
            $table->string('icon', 20);
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('form_builders');
    }
};
