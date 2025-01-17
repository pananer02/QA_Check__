<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // รายชื่อตารางที่ต้องการเพิ่มคอลัมน์ order
        $tables = ['parts', 'areas', 'precincts', 'head_papers', 'inspections']; // เพิ่มชื่อ Table ที่ต้องการ

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->integer('order')->default(0)->after('id');
            });
        }
    }

    public function down(): void
    {
        $tables = ['parts', 'areas', 'precincts', 'head_papers', 'inspections']; // ต้องตรงกับด้านบน

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('order');
            });
        }
    }
};
