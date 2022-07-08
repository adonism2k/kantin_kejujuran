<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer("student_id")->unique()->after('id');
            $table->string("username")->unique()->after('name');
            $table->integer("phone")->unique()->after('email');
            $table->string("street")->after('phone');
            $table->string("city")->after('street');
            $table->string("state")->after('city');
            $table->integer("zip")->after('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("student_id");
            $table->dropColumn("username");
            $table->dropColumn("phone");
            $table->dropColumn("street");
            $table->dropColumn("city");
            $table->dropColumn("state");
            $table->dropColumn("zip");
        });
    }
};
