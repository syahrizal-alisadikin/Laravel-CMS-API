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
        Schema::create('post_tag', function (Blueprint $table) {
            $table->unsignedInteger('post_id')->foreignIdFor(Post::class);
            $table->unsignedInteger('tag_id')->foreignIdFor(Tag::class);
         });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    //
    }
};
