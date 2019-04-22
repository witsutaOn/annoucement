<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organize', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();

            $table->char('phone');
            $table->char('fax');
            $table->string('email');
            $table->string('office_hours');

            $table->bigInteger('group_id');
            $table->string('address');
            $table->string('district');
            $table->string('province');
            $table->char('postcode');
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
        Schema::dropIfExists('organize');
    }
}
