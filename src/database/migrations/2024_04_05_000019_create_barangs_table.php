<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('email',)->nullable();
            $table->string('whatsap')->nullable();
            $table->string('description')->nullable();
            $table->string('barang')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
