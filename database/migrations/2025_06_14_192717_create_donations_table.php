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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
        $table->string('item_name');
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->enum('condition', ['baru','seperti-baru','layak-pakai','rusak-ringan','rusak-sedang','rusak-berat','tidak-layak']);
        $table->text('description')->nullable();
        $table->json('photos')->nullable();
        $table->string('donor_name');
        $table->string('phone');
        $table->string('email');
        $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        $table->timestamps();
    });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
