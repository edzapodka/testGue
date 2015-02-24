<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jenis', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('jenis_product', function(Blueprint $table)
		{
			$table->integer('jenis_id')->unsigned()->index();
			$table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
			$table->integer('product_id')->unsigned()->index();

			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
		Schema::drop('jenis_product');
		Schema::drop('jenis');

	}

}
