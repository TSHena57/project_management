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
        Schema::create('package_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->index();
            $table->enum('package_plan_type',['Monthly','Yearly','Custom'])->default('Monthly');
            $table->string('slug',255)->index();
            $table->double('price', 16,2)->default(0)->index();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('max_employee_count')->default(2);
            $table->unsignedBigInteger('max_project_count')->default(2);
            $table->boolean('project_activity_log_available')->default(0);
            $table->boolean('gantt_chart_available')->default(0);
            $table->boolean('role_permission_available')->default(1);
            $table->boolean('client_login_available')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_plans');
    }
};
