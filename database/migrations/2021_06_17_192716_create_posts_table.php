<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('set null');

            $table->foreignId('topic_id')
                  ->constrained()
                  ->onDelete('set null');

            $table->foreignId('category_id')
                  ->constrained()
                  ->onDelete('set null');

            /*
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('posts')
                  ->nullable(true)
                  ->onDelete('set null')
                  ->default(null);
            */
            $table->string('title')->unique();
            $table->text('description');
            $table->text('content');
            $table->string('slug')->unique();
            $table->boolean('published')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
