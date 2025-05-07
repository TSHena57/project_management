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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->default(0)->index();
            $table->foreignId('project_manager_id')->default(0)->index();
            $table->string('project_name',255)->index();
            $table->date('open_date')->default(date("Y-m-d"))->index();
            $table->date('close_date')->default(date("Y-m-d"))->index();
            $table->double('project_value', 20,2)->default(0)->index();
            $table->text('description')->nullable();
            $table->enum('project_current_status',['Not Started','On Hold','Planning','In Progress','Running','Completed','Cancelled','At Risk','Failed'])->default('Not Started');
            $table->string('awarded_by',255)->nullable()->comment('the man who brought the project');
            $table->unsignedBigInteger("created_by")->nullable();
            $table->foreign("created_by")->on("users")->references("id")->onDelete("cascade");
            $table->unsignedBigInteger("updated_by")->nullable();
            $table->foreign("updated_by")->on("users")->references("id")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
