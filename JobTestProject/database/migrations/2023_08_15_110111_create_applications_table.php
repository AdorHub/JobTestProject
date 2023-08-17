<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('topic');
            $table->string('user');
            $table->string('role')->default('user');
            $table->text('message');
            $table->string('comment')->nullable();
            $table->timestamp('created_at');

            #Relation
            $table->unsignedBigInteger('status_id')->nullable();

            $table->index('status_id', 'applications_status_index');
            $table->foreign('status_id', 'applications_status_fk')->on('statuses')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
