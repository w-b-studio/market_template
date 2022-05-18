<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id('id');
            $table->string('number');
            // add array of product ids
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
};
