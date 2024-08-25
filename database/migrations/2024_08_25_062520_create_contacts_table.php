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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignId("category_id")->constrained()->cascadeOnDelete();
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->tinyInteger('gender')->comment('性別(1:男性 2:女性 3:その他)');
            $table->string('email',255);
            $table->string('tell', 11);
            $table->string('address',255);
            $table->string('building',255)->nullable();
            $table->text('detail');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
