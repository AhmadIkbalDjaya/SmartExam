<?php

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_student_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Quiz::class);
            $table->foreignIdFor(Student::class);
            $table->foreignIdFor(Question::class);
            $table->enum('answer', ['A', 'B', 'C', 'D', 'E',]);
            $table->boolean('is_correct')->default(false);
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
        Schema::dropIfExists('quiz_student_answers');
    }
};
