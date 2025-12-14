<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('age');
            $table->string('temper')->nullable();
            $table->string('coat');
            $table->string('description')->nullable();
            $table->string('vaccin')->nullable();
            $table->foreignId('breed_id')->constrained();
            $table->timestamps('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
