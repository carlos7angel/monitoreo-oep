<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('political_registrations', function (Blueprint $table) {

            $table->id();
            $table->string('code', 50)->unique()->nullable();
            $table->unsignedBigInteger('fid_election')->nullable();
            $table->foreign('fid_election')->references('id')->on('elections')->onDelete('cascade');
            $table->unsignedBigInteger('fid_user')->nullable();
            $table->foreign('fid_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('fid_political_group_profile')->nullable();
            $table->foreign('fid_political_group_profile')->references('id')->on('political_group_profiles')->onDelete('cascade');
            $table->text('status_activity')->nullable();
            $table->dateTime('registered_at')->nullable();
            $table->unsignedBigInteger('registered_by')->nullable();
            $table->foreign('registered_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            // $table->softDeletes();

            $table->index(['fid_election', 'fid_user', 'fid_political_group_profile']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
