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

            $table->foreignId('user_id');
            $table->foreignId('category_id');

            $table->string('slug')->unique();

            // INFO
            $table->longText('images');
            $table->string('title');
            $table->string('description')->nullable();
            $table->longText('prices'); // Days / prices
            $table->longText('tools_sales')->nullable();
            $table->longText('properties')->nullable();
            $table->boolean('published')->default(0);
            $table->boolean('blocked')->default(0);

            // META

            // TOOLS
            $table->bigInteger('sort')->default(0)->comment('Сортировка. Чем больше, тем выше.');
            $table->bigInteger('views')->default(0);
            $table->bigInteger('views_at_day')->default(0);
            $table->bigInteger('views_at_month')->default(0);
            $table->bigInteger('add_to_favorites')->default(0);
            $table->bigInteger('press_show_phone')->default(0);
            $table->bigInteger('press_to_chat')->default(0);
            $table->bigInteger('press_to_messengers')->default(0);

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
