<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users_activities', function (Blueprint $table) {

            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string("browser",255);
            $table->string("ip",255);
            $table->string("tag",255);
            $table->text("operation")->nullable();
            $table->timestamps();

            $table->foreign("user_id")
                ->references("id")
                ->on("admin_users")
                ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_users_activities');
    }
}
