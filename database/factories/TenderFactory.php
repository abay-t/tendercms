<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tender;
use Faker\Generator as Faker;

$factory->define(Tender::class, function (Faker $faker) {
    return [
    	'user_id' => '1',
        'portal' => 'Гос. закупки',
		'type' => 'Товар',
		'predmet' => 'Товар',
		'no' => '22839891-ОК1 ',
		'link' => 'https://v3bl.goszakup.gov.kz/ru/announce/index/3150626?tab=lots',
		'zakazchik' => 'Служба центральных коммуникаций',
		'title' => 'HP DL380 Gen10',
		'tz' => 'folder',
		'quantity' => 2,
		'priceForUnit' => 14162723,
		'sum' => 28325446,
		'finishTime' => '2019-03-27 19:00:00',
		'address' => '710000000, 010000, Казахстан, г. Астана, ул. Проспект ЖЕНИС, д. 11, оф.',
		'finishForDelivery' => '2019-04-08 16:13:15',
		'obespechenie' => 0,
		'submitted' => 0,
		'providerUnitPrice' => 14,
		'providerSumPrice' => 22,
		'transportation' => 361000,
		'customs' => 25000,
		'certification' => 30000,
		'allConsumptions' => 88600000,
		'myUnitPrice' => 7600000,
		'mySum' => 136300000,
		'taxProcent' => 460000,
		'profit' => 6000000,
		'margin' => 1.2,
		'sumNDS' => 5666666,
		'comission' => 45454545,
		


    ];
});
