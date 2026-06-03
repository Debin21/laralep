<?php

use App\Models\Fakultas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Fakultas::class)
                  ->constrained('fakultas')
                  ->cascadeOnDelete();

            $table->string('nama_prodi');
            $table->string('nama_kaprodi');
            $table->string('alias_prodi');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};