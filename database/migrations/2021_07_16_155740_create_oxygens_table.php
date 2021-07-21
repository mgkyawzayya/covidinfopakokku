<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOxygensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oxygens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('firstphone');
            $table->string('secondphone')->default(null)->nullable();
            $table->string('descriptions')->default(null)->nullable();
            $table->string('address');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('oxygens');
    }
}
