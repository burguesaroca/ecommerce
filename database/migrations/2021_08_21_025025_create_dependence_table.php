<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user_create');
            $table->integer('state');            
            $table->timestamps();
        });

        Schema::create('aplication_dependence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('aplication_id')->index();
            $table->foreign('aplication_id')->references('id')->on('aplications')->onDelete('cascade');
            $table->unsignedBigInteger('dependence_id')->index();
            $table->foreign('dependence_id')->references('id')->on('dependences')->onDelete('cascade');           
            $table->string('user_create');
            $table->integer('state');            
            $table->timestamps();
        });

        Schema::create('dependence_role_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dependence_id')->index();
            $table->foreign('dependence_id')->references('id')->on('dependences')->onDelete('cascade');     
            $table->unsignedBigInteger('role_user_id')->index();
            $table->foreign('role_user_id')->references('id')->on('role_user')->onDelete('cascade');
            $table->string('user_create');
            $table->integer('state'); 
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
        Schema::dropIfExists('dependence_role_user');
        Schema::dropIfExists('aplication_dependence');
        Schema::dropIfExists('dependences');

    }
}
