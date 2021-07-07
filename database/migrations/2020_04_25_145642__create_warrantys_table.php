<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warrantys', function (Blueprint $table) {
            $table->id();
            $table->date('date_warranty')->nullable();
            $table->string('ref_warranty', 15)->nullable();
            $table->text('text_warranty')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
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
        Schema::table('warrantys', function (Blueprint $table) {
            $table->dropForeign('warrantys_user_id_foreign');
        });
        Schema::dropIfExists('warrantys');
    }
}
