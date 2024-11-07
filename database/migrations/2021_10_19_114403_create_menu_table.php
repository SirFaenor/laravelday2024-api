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
        Schema::create('menu', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('code')->nullable();
            $table->json('title')->nullable();
            $table->json('subtitle')->nullable();
            $table->json('description')->nullable();
            $table->tinyInteger('tray_slots')->nullable()->comment('numero di slot occupati nel vassoio');
            $table->string('tray_label')->nullable();
            $table->tinyInteger('tray_fontsize')->default(12)->comment('etichetta vassoio - dimensione font');
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('vegetarian', ['Y', 'N'])->default('N');
            $table->enum('glutenfree', ['Y', 'N'])->default('N');
            $table->enum('alcohol', ['Y', 'N'])->default('N');
            $table->string('allergens')->nullable();
            $table->enum('with_milk', ['Y', 'N'])->default('N');
            $table->enum('expiring_order', ['Y', 'N'])->default('N')->comment('L\'ordine di questo prodotto può scadere?');
            $table->integer('availability')->nullable();
            $table->enum('sellable', ['Y', 'N'])->default('N')->comment('Il prodotto è vendibile?');
            $table->enum('dashboard_visible', ['Y', 'N'])->default('Y')->comment('visiblità nella dashboard ordini');
            $table->unsignedBigInteger('sort')->default(1);
            $table->enum('public', ['Y', 'N'])->default('N');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('menu_categories')->nullOnDelete();        
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
