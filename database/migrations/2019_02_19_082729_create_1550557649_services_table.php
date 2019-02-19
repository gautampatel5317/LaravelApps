<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1550557649ServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id')->nullable()->unsigned();
                $table->integer('sub_category')->nullable()->unsigned();
                $table->string('service_name')->nullable();
                $table->string('description')->nullable();
                $table->string('status')->nullable();                
                $table->timestamps();
                $table->softDeletes();
                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
