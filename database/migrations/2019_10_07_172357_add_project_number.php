<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function ($table) {
            $table->integer('project_number_counter')->default(0)->nullable();
            $table->text('project_number_prefix')->nullable();
            $table->text('project_number_pattern')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function ($table) {
            $table->dropColumn('project_number_counter');
            $table->dropColumn('project_number_prefix');
            $table->dropColumn('project_number_pattern');
        });
    }
}
