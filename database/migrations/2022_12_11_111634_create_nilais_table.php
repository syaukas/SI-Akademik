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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('mahasiswas_id');
            $table->unsignedInteger('matkuls_id');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->float('nilai_akhir', 8, 2);
            $table->double('index', 8, 2);
            $table->char('predikat');
            $table->integer('unit');
            $table->string('thn_ajar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
};
