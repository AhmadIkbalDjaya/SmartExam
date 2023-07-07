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
        Schema::create('essay_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Quiz::class);
            $table->foreignIdFor(Student::class);
            // $table->foreignIdFor(Question::class);
            $table->string('file');
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
        Schema::dropIfExists('essay_submissions');
    }
};
