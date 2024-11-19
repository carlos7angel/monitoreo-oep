<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            // $table->softDeletes();
            $table->index('code');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
