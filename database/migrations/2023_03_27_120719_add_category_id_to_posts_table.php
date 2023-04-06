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
        Schema::table('projects', function (Blueprint $table) {
            //definiamo l'ID della categoria (che sia nullable)
            $table->unsignedBigInteger("category_id")->nullable();

            //creaimo la foreign key
            $table->foreign("category_id")
                ->references("id")
                ->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //drop della foreign key
            $table->dropForeign(["category_id"]);
            //drop della colonna
            $table->dropColumn("category_id");
        });
    }
};
