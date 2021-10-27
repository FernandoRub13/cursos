<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->enum('status', [ Course::BORRADOR , Course::REVISION , Course::PUBLICADO ])->default(Course::BORRADOR);
            $table->string('slug');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable(); // Nivel de dificultad
            $table->unsignedBigInteger('category_id')->nullable(); // Categoría del curso
            $table->unsignedBigInteger('price_id'); // Precio del curso

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  // Relación con la tabla users
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null'); // Relación con la tabla levels
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); // Relación con la tabla categories
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade'); // Relación con la tabla prices



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
