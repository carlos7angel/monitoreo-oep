<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('catalog_items', function (Blueprint $table) {
            $table->id();

            $table->string('catalog_code', 3);
            $table->foreign('catalog_code')->references('code')->on('catalogs');

            $table->string('code')->unique();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->string('parent_code', 3)->nullable();
            $table->string('icon')->nullable();
            $table->integer('sort')->nullable();
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
