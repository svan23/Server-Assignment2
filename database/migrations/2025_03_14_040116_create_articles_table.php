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
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('article_id'); // ArticleId Integer Example: 1,2,3,...
            $table->string('title'); // Title String text
            $table->text('body'); // Body Text (allows HTML)
            $table->date('create_date'); // CreateDate Date
            $table->date('start_date'); // StartDate Date
            $table->date('end_date'); // EndDate Date
            $table->string('contributor_username'); // ContributorUsername Email
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
