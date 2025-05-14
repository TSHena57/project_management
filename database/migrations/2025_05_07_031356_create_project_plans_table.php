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
        Schema::create('project_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->default(0)->index();
            $table->foreignId('project_phase_id')->default(0)->index();
            $table->foreignId('project_module_id')->default(0)->index();
            $table->string('task_name',255)->index();
            $table->text('task_details')->nullable();
            $table->foreignId('employee_id')->default(0)->index()->comment('assigned_user');
            $table->enum('current_status',['On Hold','To Do','In Progress','Testing','Completed','Error Solving'])->default('On Hold');
            $table->double('task_duration_hrs',10,2)->default(1)->comment('Hours');
            $table->unsignedBigInteger('priority')->default(1);
            $table->date('start_date')->default(date("Y-m-d"))->index();
            $table->date('end_date')->default(date("Y-m-d"))->index();
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
        Schema::dropIfExists('project_plans');
    }
};
