<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id');
            $table->foreignId('adopter_id');
            $table->text('note');
            $table->timestamp('requested_at')->nullable();
            $table->timestamp('adopted_at')->nullable();
            $table->text('message_from_application');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adoptions');
    }
};
