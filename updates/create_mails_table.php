<?php

/** @noinspection AutoloadingIssuesInspection */

namespace GromIT\SentMails\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    public function up()
    {
        Schema::create('gromit_sentmails_mails', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('token');
            $table->string('from');
            $table->text('to');
            $table->string('file');
            $table->dateTime('opened_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gromit_sentmails_mails');
    }
}
