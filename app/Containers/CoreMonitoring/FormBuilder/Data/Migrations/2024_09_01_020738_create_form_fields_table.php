<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('form_fields', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('fid_form');
            $table->foreign('fid_form')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('fid_field_type');
            $table->foreign('fid_field_type')->references('id')->on('field_types')->onDelete('cascade');
            $table->enum('field_type_name', ['textbox','textarea','select','datepicker','checkbox','fileupload','hidden','button','table','html']);

            //general
            $table->string('unique_fieldname')->unique();
            $table->string('label')->nullable();
            $table->string('placeholder')->nullable();
            $table->text('tooltip')->nullable();

            //input
            $table->string('alias')->nullable(); // TABLES COLUMN SUBFORM
            $table->string('field_subtype', 50);
            $table->string('default_value')->nullable();
            $table->integer('textarea_rows')->nullable();
            $table->string('type_url', 20)->nullable(); // nohttps or
            $table->boolean('select_search')->nullable();
            $table->string('options_type')->nullable();
            $table->longText('options')->nullable(); // from database or static
            $table->string('file_maxsize', 10)->nullable();
            $table->string('file_mimetypes', 255)->nullable();
            $table->string('date_start', 20)->nullable();
            $table->string('date_end',20)->nullable();
            $table->string('date_format',20)->nullable();
            $table->string('date_preview',20)->nullable();
            $table->text('date_range')->nullable();
            $table->unsignedBigInteger('table_form_id')->nullable(); // foreign key?
            $table->boolean('table_edit_option')->nullable();
            $table->boolean('table_delete_option')->nullable();
            $table->text('text_html')->nullable();
            $table->string('source_image', 320)->nullable();
            $table->string('title_heading', 5)->nullable();

            //validation
            $table->boolean('required')->default(1);
            $table->integer('minlength')->nullable();
            $table->integer('maxlength')->nullable();
            $table->string('regex')->nullable();
            $table->boolean('readonly')->nullable();
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
            $table->integer('minselect')->nullable();
            $table->integer('maxselect')->nullable();
            $table->integer('maxfiles')->nullable();
            $table->integer('minrows')->nullable();
            $table->integer('maxrows')->nullable();

            //style
            $table->string('grid_column',20)->nullable();
            $table->text('input_group_prepend')->nullable();
            $table->text('input_group_append')->nullable();
            $table->string('class_name',50)->nullable();
            $table->string('color',20)->nullable();

            //advanced
            $table->longText('logic_condition')->nullable();
            $table->longText('automatic_calculation')->nullable();

            $table->boolean('active')->default(1);
            $table->integer('order')->nullable();

            $table->timestamps();
            // $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};
