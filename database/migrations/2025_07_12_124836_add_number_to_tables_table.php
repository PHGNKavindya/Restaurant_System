<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumberToTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
    Schema::table('tables', function (Blueprint $table) {
        $table->string('number')->nullable()->after('id');
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
   {
    Schema::table('tables', function (Blueprint $table) {
        $table->dropColumn('number');
    });
}
}
