<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'posts', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->string( 'post_title' );
			$table->longText( 'post_content' );
			$table->string( 'post_slug', '100' )->unique()->nullable();
			$table->text( 'post_excerpt' )->nullable();
			$table->string( 'post_thumbnail' )->nullable();
			$table->unsignedBigInteger( 'author_id' );
			$table->unsignedInteger( 'post_status' )->default( 1 );
			$table->string( 'post_type' );
			$table->bigInteger( 'comment_count' )->unsigned()->nullable();
			$table->boolean( 'is_featured' )->default( '0' );
			$table->unsignedInteger( 'post_views' )->default(0);
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

		Schema::dropIfExists( 'posts' );

	}
}
