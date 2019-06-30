<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('portal');
            $table->string('type');
            $table->string('predmet');
            $table->string('no');
            $table->string('link');
            $table->string('zakazchik');
            $table->string('title');
            $table->string('tz');
            $table->bigInteger('quantity');
            $table->bigInteger('priceForUnit');
            $table->bigInteger('sum');
            $table->string('finishTime');
            $table->string('address');
            $table->string('finishForDelivery');
            $table->boolean('obespechenie');
            $table->boolean('submitted');
            $table->bigInteger('providerUnitPrice');
            $table->bigInteger('providerSumPrice');
            $table->bigInteger('transportation');
            $table->bigInteger('customs');
            $table->bigInteger('certification');
            $table->bigInteger('allConsumptions');
            $table->bigInteger('myUnitPrice');
            $table->bigInteger('mySum');
            $table->integer('taxProcent');
            $table->bigInteger('profit');
            $table->float('margin');
            $table->integer('sumNDS');
            $table->integer('comission');
           
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
        Schema::dropIfExists('tenders');
    }
}
