<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('catalog_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fid_catalog')->nullable();
            $table->foreign('fid_catalog')->references('id')->on('catalogs')->onDelete('cascade');
            $table->string('catalog_code', 10)->nullable();
            // $table->foreign('catalog_code')->references('code')->on('catalogs');
            $table->string('code', 10)->nullable();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->string('parent_code', 3)->nullable();
            $table->string('icon', 20)->nullable();
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
