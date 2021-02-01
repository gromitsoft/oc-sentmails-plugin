<?php

namespace GromIT\SentMails\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

class add_subject_to_mails extends Migration
{
    public function up()
    {
        Schema::table('gromit_sentmails_mails', function (Blueprint $table) {
            $table->string('subject')->nullable()->after('to');
        });
    }

    public function down()
    {
        Schema::table('gromit_sentmails_mails', function (Blueprint $table) {
            $table->dropColumn('subject');
        });
    }
}
