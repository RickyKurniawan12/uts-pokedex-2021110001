<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Contracts\Service\Attribute\Required;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name', length:255,);
            $table->string('species ',length:100,);
            $table->string('primary_type',length:50,);
            $table->decimal('weight', 8, 2)->default(0);
            $table->decimal('height', 8, 2)->default(0);
            $table->integer('hp')->default(0);
            $table->integer('attack')->default(0);
            $table->integer('defense')->default(0);
            $table->boolean('is_legendary')->default(false);
            $table->string('photo')->nullable()->default();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
