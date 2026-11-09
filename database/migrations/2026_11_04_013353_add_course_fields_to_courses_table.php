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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('code', 20)->unique();
            $table->string('name', 120);
            $table->text('description')->nullable();
            $table->unsignedInteger('fee')->default(0);
            $table->unsignedSmallInteger('quota')->default(20);
            $table->date('start_date');
            $table->enum('status', ['draft', 'open', 'closed'])->default('draft');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropUnique(['code']);

            $table->dropColumn([
                'code',
                'name',
                'description',
                'fee',
                'quota',
                'start_date',
                'status'
            ]);
        });
    }
};
