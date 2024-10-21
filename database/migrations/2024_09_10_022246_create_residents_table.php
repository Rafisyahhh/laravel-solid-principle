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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('name');
            $table->string('place_birth');
            $table->date('date_birth');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->foreignId('address_id')->constrained('addresses');
            $table->foreignId('education_id')->constrained('education');
            $table->foreignId('work_id')->constrained('works');
            $table->foreignId('status_id')->constrained('statuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
