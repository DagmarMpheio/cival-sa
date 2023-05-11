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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('body');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('view_count')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();

            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->foreign('category_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('restrict');


            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
