@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Добавить тендер') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addtender') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                    <div class="row">
                        

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="portal" class="col-md-4 col-form-label text-md-right">{{ __('Портал закупки') }}</label>

                                <div class="col-md-6">
                                    <select name="portal" class="custom-select">

                                      <option selected>Выберите портала</option>
                                      @foreach($portals as $portal)
                                      <option value="{{$portal->name}}">{{$portal->name}}</option>
                                      @endforeach 
                                  </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Предмет закупки ') }}</label>

                                <div class="col-md-6">
                                    <select name="predmet" class="custom-select">
                                      <option selected>Выберите предмет</option>
                                      @foreach($predmets as $predmet)
                                      <option value="{{$predmet->name}}">{{$predmet->name}}</option>
                                      @endforeach 
                                  </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="predmet" class="col-md-4 col-form-label text-md-right">{{ __('Тип закупки') }}</label>

                                <div class="col-md-6">
                                    <select name="type" class="custom-select">
                                      <option selected>Выберите тип</option>
                                      @foreach($tips as $tip)
                                      <option value="{{$tip->name}}">{{$tip->name}}</option>
                                      @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Номер закупки') }}</label>

                                <div class="col-md-6">
                                    <input id="no" type="text" class="form-control" name="no" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Ссылка на закупку') }}</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control" name="link" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zakazchik" class="col-md-4 col-form-label text-md-right">{{ __('Заказчик') }}</label>

                                <div class="col-md-6">
                                    <input id="zakazchik" type="text" class="form-control" name="zakazchik" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Наименование закупки') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tz" class="col-md-4 col-form-label text-md-right">{{ __('Техничечкое задание на закупку  ') }}</label>

                                <div class="col-md-6">
                                    <input id="tz" type="file" class="form-control " name="tz" value="{{ old('tz') }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Количество ') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="number" class="form-control" name="quantity" required onchange="changeInputs()">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="priceForUnit" class="col-md-4 col-form-label text-md-right">{{ __('Цена закупки за ед. ') }}</label>

                                <div class="col-md-6">
                                    <input id="priceForUnit" type="number" class="form-control" name="priceForUnit" required onchange="changeInputs()">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="finishTime" class="col-md-4 col-form-label text-md-right">{{ __('Срок окончания приема заявок') }}</label>

                                <div class="col-md-6">
                                    <input id="finishTime" type="datetime-local" class="form-control" name="finishTime" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="aukcionDate" class="col-md-4 col-form-label text-md-right">{{ __('Дата проведения аукциона') }}</label>

                                <div class="col-md-6">
                                    <input id="aukcionDate" type="datetime-local" class="form-control" name="aukcionDate" required >
                                </div>
                                    
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Адрес поставки') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="finishForDelivery" class="col-md-4 col-form-label text-md-right">{{ __('Срок поставки ') }}</label>

                                <div class="col-md-6">
                                    <input id="finishForDelivery" type="number" class="form-control" name="finishForDelivery" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="obespechenie" class="col-md-4 col-form-label text-md-right">{{ __('Обеспечение заявки') }}</label>

                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="obespechenie" name="obespechenie">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="procentOtZakupki" class="col-md-4 col-form-label text-md-right">{{ __('Процент от суммы закупки  ') }}</label>

                                <div class="col-md-6">
                                    <input id="procentOtZakupki" type="text" class="form-control" name="procentOtZakupki" required onchange="changeInputs()">
                                </div>
                            </div>

                            
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="submitted" class="col-md-4 col-form-label text-md-right">{{ __('Заявка подано') }}</label>

                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="submitted" name="submitted">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="providerUnitPrice" class="col-md-4 col-form-label text-md-right">{{ __('Цена поставщика за ед. ') }}</label>

                                <div class="col-md-6">
                                    <input id="providerUnitPrice" type="number" class="form-control" name="providerUnitPrice" required onchange="changeInputs()">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="transportation" class="col-md-4 col-form-label text-md-right">{{ __('Транспортные расходы ') }}</label>

                                <div class="col-md-6">
                                    <input id="transportation" type="number" class="form-control" name="transportation" required onchange="changeInputs()">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="customs" class="col-md-4 col-form-label text-md-right">{{ __('Растаможка ') }}</label>

                                <div class="col-md-6">
                                    <input id="customs" type="number" class="form-control" name="customs" required onchange="changeInputs()">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="certification" class="col-md-4 col-form-label text-md-right">{{ __('Сертификация ') }}</label>

                                <div class="col-md-6">
                                    <input id="certification" type="number" class="form-control" name="certification" required onchange="changeInputs()">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="myUnitPrice" class="col-md-4 col-form-label text-md-right">{{ __('Моя цена за ед. ') }}</label>

                                <div class="col-md-6">
                                    <input id="myUnitPrice" type="number" class="form-control" name="myUnitPrice" required onchange="changeInputs()">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="taxProcent" class="col-md-4 col-form-label text-md-right">{{ __('Процент налогообложения') }}</label>

                                <div class="col-md-6">
                                    <input id="taxProcent" type="number" class="form-control" name="taxProcent" required onchange="changeInputs()">
                                </div>
                            </div>
                             
                            
                           
                            <div class="form-group row">
                                <label for="procentNDS" class="col-md-4 col-form-label text-md-right">{{ __('Процент НДС ') }}</label>

                                <div class="col-md-6">
                                    <input id="procentNDS" type="number" class="form-control" name="procentNDS" required onchange="changeInputs()">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="comission" class="col-md-4 col-form-label text-md-right">{{ __('Комиссия банка за перевод и другие операции по тендеру ') }}</label>

                                <div class="col-md-6">
                                    <input id="comission" type="number" class="form-control" name="comission" required onchange="changeInputs()">
                                </div>
                            </div>

                           
                        </div>
                    </div>
                    <div style="display: none">
                        <div class="form-group row">
                            <label for="sum" class="col-md-4 col-form-label text-md-right">{{ __('Сумма закупки ') }}</label>

                            <div class="col-md-6">
                                <input id="sum" type="text" class="form-control" name="sum" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="summaZakupki" class="col-md-4 col-form-label text-md-right">{{ __('Сумма обеспечния заявки  ') }}</label>

                            <div class="col-md-6">
                                <input id="summaZakupki" type="text" class="form-control" name="summaZakupki" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="providerSumPrice" class="col-md-4 col-form-label text-md-right">{{ __('Сумма поставщика ') }}</label>

                            <div class="col-md-6">
                                <input id="providerSumPrice" type="number" class="form-control" name="providerSumPrice" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="allConsumptions" class="col-md-4 col-form-label text-md-right">{{ __('Общие расходы ') }}</label>

                            <div class="col-md-6">
                                <input id="allConsumptions" type="number" class="form-control" name="allConsumptions" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mySum" class="col-md-4 col-form-label text-md-right">{{ __('Моя сумма ') }}</label>

                            <div class="col-md-6">
                                <input id="mySum" type="number" class="form-control" name="mySum" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="taxSum" class="col-md-4 col-form-label text-md-right">{{ __('Сумма налога   ') }}</label>

                            <div class="col-md-6">
                                <input id="taxSum" type="number" class="form-control" name="taxSum" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profit" class="col-md-4 col-form-label text-md-right">{{ __('Прибыль ') }}</label>

                            <div class="col-md-6">
                                <input id="profit" type="number" class="form-control" name="profit" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="margin" class="col-md-4 col-form-label text-md-right">{{ __('Маржа(%) ') }}</label>

                            <div class="col-md-6">
                                <input id="margin" type="text" class="form-control" name="margin" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sumNDS" class="col-md-4 col-form-label text-md-right">{{ __('Сумма НДС ') }}</label>

                            <div class="col-md-6">
                                <input id="sumNDS" type="number" class="form-control" name="sumNDS" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sumBank" class="col-md-4 col-form-label text-md-right">{{ __('Сумма комиссии банка') }}</label>

                            <div class="col-md-6">
                                <input id="sumBank" type="number" class="form-control" name="sumBank" required onchange="changeInputs()">
                            </div>
                        </div>
                    </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Добавить тендер') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    function changeInputs(){
        var quantity = $("#quantity").val();
        var priceForUnit = $('#priceForUnit').val();
        var sum = quantity * priceForUnit;
        $('#sum').val(sum);
        var procentOtZakupki = $('#procentOtZakupki').val();
        var summaZakupki = sum*procentOtZakupki/100;
        $('#summaZakupki').val(summaZakupki);
        var providerUnitPrice = $('#providerUnitPrice').val();
        var providerSumPrice = quantity*providerUnitPrice;
        $('#providerSumPrice').val(providerSumPrice);
        var transportation = $('#transportation').val();
        var customs = $('#customs').val();
        var certification = $('#certification').val();

        var comission = $('#comission').val();
        var myUnitPrice = $('#myUnitPrice').val();
        var mySum = myUnitPrice*quantity;
        $('#mySum').val(mySum);
        var taxProcent = $('#taxProcent').val();
        var taxSum = mySum*taxProcent/100;
        $('#taxSum').val(taxSum);
        var allConsumptions = parseFloat(providerSumPrice) + parseFloat(transportation) + parseFloat(customs) + parseFloat(certification) + parseFloat(mySum*taxProcent/100) + parseFloat(providerSumPrice*comission/100);
        $('#allConsumptions').val(allConsumptions);
        var profit = parseFloat(mySum) - parseFloat(allConsumptions);
        $('#profit').val(profit);
        var margin = (profit*100)/allConsumptions;
        $('#margin').val(margin);
        var procentNDS = $('#procentNDS').val();
        var sumNDS = (parseFloat(providerSumPrice) + parseFloat(transportation))*procentNDS/100;
        $('#sumNDS').val(sumNDS);
        var sumBank = providerSumPrice*comission/100;
        $('#sumBank').val(sumBank);

    }
    
</script>
@endsection
