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
        //creiamo la tabella project_tag
        //la tabella project_tag ha due colonne
        //una colonna project_id che è una foreign key
        //una colonna tag_id che è una foreign key
        //la tabella project_tag ha una primary key che è composta da project_id e tag_id
        //la tabella project_tag ha una foreign key che punta alla tabella projects
        //la tabella project_tag ha una foreign key che punta alla tabella tags
 
        Schema::create('project_tag', function (Blueprint $table) {
            //definiamo l'ID deI progetti
            $table->unsignedBigInteger("project_id");

            //creaimo la foreign key
            $table->foreign("project_id")
                ->references("id")
                ->on("projects")

                //se aggiorniamo un progetto aggiorniamo anche i tag associati
                ->onUpdate("cascade")
                //se cancelliamo un progetto cancelliamo anche i tag associati
                ->onDelete("cascade");
            

            //definiamo l'ID dei tag
            $table->unsignedBigInteger("tag_id");
            
            //creaimo la foreign key
            $table->foreign("tag_id")
                ->references("id")
                ->on("tags")
                ->onUpdate("cascade")
                ->onDelete("cascade");


            $table->primary(['project_id', 'tag_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_tag');
        
    
    }
};
