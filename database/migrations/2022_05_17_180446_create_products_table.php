<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->foreignId(Category::class)
                ->after('id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name');
            $table->double('price');

        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $key = (new Category())->getForeignKey();
            $table->dropForeign([$key]);
            $table->removeColumn($key);
        });
    }
};
