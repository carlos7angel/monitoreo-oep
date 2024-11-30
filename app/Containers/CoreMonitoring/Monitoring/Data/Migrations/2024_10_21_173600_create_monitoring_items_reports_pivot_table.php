<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('monitoring_item_report', function (Blueprint $table) {

            $table->unsignedBigInteger('fid_monitoring_item');
            $table->foreign('fid_monitoring_item')->references('id')->on('monitoring_items')->onDelete('cascade');

            $table->unsignedBigInteger('fid_monitoring_report');
            $table->foreign('fid_monitoring_report')->references('id')->on('monitoring_reports')->onDelete('cascade');

            $table->primary(['fid_monitoring_item', 'fid_monitoring_report']);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monitoring_item_report');
    }
};
