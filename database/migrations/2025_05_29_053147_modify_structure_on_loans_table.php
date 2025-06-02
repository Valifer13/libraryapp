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
        Schema::table('loans', function (Blueprint $table) {
            // Hapus foreign key lama
            $table->dropForeign(['book_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['admin_id']);

            // Ubah kolom menjadi NOT NULL
            $table->foreignId('book_id')->change();
            $table->foreignId('user_id')->change();
            $table->foreignId('admin_id')->change();

            // Tambah kembali foreign key dengan ON DELETE CASCADE
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            // Hapus constraint baru
            $table->dropForeign(['book_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['admin_id']);

            // Tambah kembali nullable
            $table->foreignId('book_id')->nullable()->change();
            $table->foreignId('user_id')->change(); // tidak nullable tetap
            $table->foreignId('admin_id')->nullable()->change();

            // Tambahkan kembali constraint lama (nullOnDelete dan restrictOnDelete)
            $table->foreign('book_id')->references('id')->on('books')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->foreign('admin_id')->references('id')->on('admins')->nullOnDelete();
        });
    }
};
