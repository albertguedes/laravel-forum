<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use \Kalnoy\Nestedset\NestedSet;

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
            NestedSet::columns($table);
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
