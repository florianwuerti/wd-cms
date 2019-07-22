<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'pages', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->string( 'page_title' );
			$table->longText( 'page_content' )->nullable();
			$table->string( 'page_slug', '100' )->unique()->nullable();
			$table->text( 'page_excerpt' )->nullable();
			$table->string( 'page_thumbnail' )->nullable();
			$table->integer( 'author_id' )->unsigned();
			$table->unsignedInteger( 'page_status' )->default( 1 );
			$table->boolean( 'is_featured' )->default( '0' );
			$table->unsignedInteger( 'page_views' )->default( 0 );
			$table->dateTime( 'publish_at' )->nullable();
			$table->dateTime( 'published_at' );
			$table->timestamps();
			$table->softDeletes();

			$table->foreign( 'author_id' )
			      ->references( 'id' )->on( 'users' )
			      ->onDelete( 'cascade' );

		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'pages' );
	}
}
