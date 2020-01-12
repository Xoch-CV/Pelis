<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsMoviesActors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('sinopsis');
            $table->string('trailer');
            $table->string('image')->nullable();
        });

        Schema::table('actors', function (Blueprint $table) {
            $table->string('nacionality');
            $table->datetime('birthday_date');
            $table->integer('edad');
            $table->integer('awards');
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actors', function (Blueprint $table) {
            $table->dropColumn('sinopsis');
            $table->dropColumn('trailer');
            $table->dropColumn('photo');
        });

        Schema::table('actors', function (Blueprint $table) {
            $table->dropColumn('nacionality');
            $table->dropColumn('birthday_date');
            $table->dropColumn('edad');
            $table->dropColumn('awards');
            $table->dropColumn('photo')->nullable();
        });
    }
}
