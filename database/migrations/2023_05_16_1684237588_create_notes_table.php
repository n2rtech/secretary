<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->longText('note')->nullable();
        $table->timestamps();
		$table->datetime('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
}