<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('tenant_id')
                ->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onDelete('cascade');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->integer('tenant_id')
                ->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('tenant_id')
                ->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onDelete('cascade');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->integer('tenant_id')
                ->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant');

        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('tenant_id');
        });

        Schema::table('customers', function(Blueprint $table) {
            $table->dropColumn('tenant_id');
        });

        Schema::table('products', function(Blueprint $table) {
            $table->dropColumn('tenant_id');
        });

        Schema::table('services', function(Blueprint $table) {
            $table->dropColumn('tenant_id');
        });
    }
}
