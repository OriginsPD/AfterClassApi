<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('discussion_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discus_topic_id')->constrained('discussion_topics')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion_tags');
    }
}
