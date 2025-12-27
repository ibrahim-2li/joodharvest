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
        Schema::create('landing_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // hero, about, services, contact, etc.
            $table->string('key'); // title, description, phone, email, etc.
            $table->text('value_en')->nullable();
            $table->text('value_ar')->nullable();
            $table->string('type')->default('text'); // text, textarea, image, phone, email
            $table->timestamps();
            
            $table->unique(['section', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_contents');
    }
};
