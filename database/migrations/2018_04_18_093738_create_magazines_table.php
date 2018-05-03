<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagazinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magazines', function (Blueprint $table) {
            $table->increments('id');
            $table->char('title', 100);
            $table->mediumText('content_lead');
            $table->mediumText('content_body');
            $table->mediumText('content_css');
            $table->mediumText('content_javascript');
            $table->boolean('is_visible');
            $table->integer('category_id');        
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
        Schema::dropIfExists('magazines');
    }
}
