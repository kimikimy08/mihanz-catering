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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('celebrant_name');
            $table->string('event_location');
            $table->integer('celebrant_age');
            $table->string('celebrant_theme');
            $table->string('celebrant_gender');
            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedBigInteger('pork_beef_menu_selection_id')->nullable();
            $table->unsignedBigInteger('chicken_fish_seafood_menu_selection_id')->nullable();
            $table->foreign('pork_beef_menu_selection_id')->references('id')->on('menu_selections');
            $table->foreign('chicken_fish_seafood_menu_selection_id')->references('id')->on('menu_selections');
            $table->unsignedBigInteger('pork_beef_menu_id')->nullable();
            $table->unsignedBigInteger('chicken_fish_seafood_menu_id')->nullable();
            $table->unsignedBigInteger('vegetable_menu_id')->nullable();
            $table->unsignedBigInteger('pasta_menu_id')->nullable();
            $table->unsignedBigInteger('dessert_menu_id')->nullable();
            $table->unsignedBigInteger('drink_menu_id')->nullable();
            $table->foreign('pork_beef_menu_id')->references('id')->on('menus');
            $table->foreign('chicken_fish_seafood_menu_id')->references('id')->on('menus');
            $table->foreign('vegetable_menu_id')->references('id')->on('menus');
            $table->foreign('pasta_menu_id')->references('id')->on('menus');
            $table->foreign('dessert_menu_id')->references('id')->on('menus');
            $table->foreign('drink_menu_id')->references('id')->on('menus');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('terms_accepted')->default(false);
            $table->string('order_type')->nullable();
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->foreign('promo_id')->references('id')->on('service_promos');
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
