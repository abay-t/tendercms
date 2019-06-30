<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
     protected $fillable = [
        'user_id', 'portal', 'type', 'predmet', 'no', 'link', 'zakazchik', 'title', 'tz',
        'quantity', 'priceForUnit', 'sum', 'finishTime', 'address', 'finishForDelivery',
        'obespechenie', 'submitted', 'providerUnitPrice', 'providerSumPrice', 'transportation',
        'customs', 'certification', 'allConsumptions', 'myUnitPrice', 'mySum', 'taxProcent',
        'profit', 'margin', 'sumNDS', 'comission', 'won', 'dogovorDate', 'neustoyka', 'zakazchikLico',
        'zakazchikContact', 'oplata', 'procentOtZakupki', 'summaZakupki', 'taxSum', 'procentNDS', 'aukcionDate', 'sumBank'
    ];
}
