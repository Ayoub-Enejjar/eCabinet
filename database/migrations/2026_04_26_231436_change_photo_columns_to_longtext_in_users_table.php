<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Change photo/signature columns from VARCHAR to LONGTEXT
     * so they can store Base64-encoded image data directly in the DB.
     * This avoids Railway's ephemeral filesystem problem entirely.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('profile_photo_path')->nullable()->change();
            $table->longText('signature_path')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_photo_path')->nullable()->change();
            $table->string('signature_path')->nullable()->change();
        });
    }
};
