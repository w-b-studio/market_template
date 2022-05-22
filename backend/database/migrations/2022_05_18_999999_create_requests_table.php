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
            $table->id();
            $table->string('buy_name')->nullable();
            $table->double('total_price')->nullable();
            $table->string('number')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
};