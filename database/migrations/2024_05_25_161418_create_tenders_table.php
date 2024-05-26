<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id')->constrained('companies')->onDelete('cascade'); // إضافة حقل creator_id وربطه بجدول الشركات
            $table->string('name');
            $table->string('industry');
            $table->text('description');
            $table->date('release_date');
            $table->date('submission_deadline');
            $table->date('opening_date');
            $table->decimal('document_fee', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
