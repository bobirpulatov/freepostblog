<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColToPostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('posts', function (Blueprint $table) {
      $table->string('video')->nullable()->default(null)->after('img');
      $table->text("img")->change();
      $table->renameColumn("img", "img_1");
      $table->text("img_2")->nullable()->default(null);
      $table->text("img_3")->nullable()->default(null);
      $table->text("img_4")->nullable()->default(null);
    });
  }
  
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('posts', function (Blueprint $table) {
      $table->dropColumn('video');
      $table->dropColumn('img_2');
      $table->dropColumn('img_3');
      $table->dropColumn('img_4');
      $table->string("img_1")->change();
      $table->renameColumn("img_1", "img");
    });
  }
}
