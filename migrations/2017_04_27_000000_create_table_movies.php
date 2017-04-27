
<?php
/**
 *
 *  This file is part of reflar/moviedb.
 *
 *  Copyright (c) ReFlar.
 *
 *  http://reflar.io
 *
 *  For the full copyright and license information, please view the license.md
 *  file that was distributed with this source code.
 *
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
    Schema::create('movies', function(Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->integer('year')->default(0);
        $table->string('rating');
        $table->date('released');
        $table->string('runtime');
        $table->integer('genre_id');
        $table->integer('director_id');
        $table->foreign('director_id')
            ->references('id')
            ->on('person')
            ->onDelete('cascade');
        $table->integer('writer_id');
        $table->foreign('writer_id')
            ->references('id')
            ->on('person')
            ->onDelete('cascade');
        $table->integer('actors_id');
        $table->foreign('actors_id')
            ->references('id')
            ->on('person')
            ->onDelete('cascade');
        $table->text('plot');
        $table->string('poster');
        $table->string('language');
        $table->string('country');
        $table->string('awards');
        });
    },
    'down' => function (Builder $schema) {
        $schema->drop('movies');
    },
];

