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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('article');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->string('uom');
            $table->float('volume')->nullable();
            $table->float('weight')->nullable();
            $table->integer('kcal');
            $table->float('protein');
            $table->float('fat');
            $table->float('carbohydrate');
            $table->boolean('is_vegan');
            $table->boolean('is_recommend');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
