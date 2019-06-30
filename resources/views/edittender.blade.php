@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="{{url('admin/tenders')}}" class="btn btn-success">
                                <i class="fas fa-file-contract"></i> <span>Тендеры</span>
                            </a>
                            <a href="{{url('admin/contracts')}}" class="btn btn-success">
                                <i class="fas fa-file-contract"></i> <span>Контракты</span>
                            </a>
                            <a href="{{url('admin/users')}}" class="btn btn-success">
                                <i class="fas fa-user"></i> <span>Пользователи</span>
                            </a>
                            <a href="{{url('admin/portals')}}" class="btn btn-success">
                                <i class="fas fa-user"></i> <span>Порталы</span>
                            </a>
                            <a href="{{url('admin/predmets')}}" class="btn btn-success">
                                <i class="fas fa-user"></i> <span>Предметы</span>
                            </a>
                            <a href="{{url('admin/tips')}}" class="btn btn-success">
                                <i class="fas fa-user"></i> <span>Типы</span>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('addtender') }}" class="btn btn-primary"><i class="material-icons"></i> <span>Добавить тендер</span></a>
                            <!-- <a href="#" class="btn btn-primary"><i class="material-icons"></i> <span>Export to Excel</span></a> -->                       
                        </div>
                    </div>
                </div>
                <h2 style="padding: 15px;">{{ __('Изменить тендера') }}</h2>
                <br>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <form method="POST" action="{{ route('edittender', $tender->id) }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                            
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="portal" class="col-md-4 col-form-label text-md-right">{{ __('Портал закупки') }}</label>

                                <div class="col-md-6">
                                    <select name="portal" class="custom-select">
                                      <option>Выберите портала</option>
                                      @foreach($portals as $portal)
                                      <option value="{{$portal->name}}" {{ $tender->portal == $portal->name ? 'selected' : '' }}>{{$portal->name}}</option>
                                      @endforeach 
                                      
                                  </select>

                              </div>
                          </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Тип закупки ') }}</label>

                                <div class="col-md-6">
                                    <select name="type" class="custom-select">
                                      <option>Выберите тип</option>
                                      @foreach($tips as $tip)
                                      <option value="{{$tip->name}}" {{ $tender->type == $tip->name ? 'selected' : '' }}>{{$tip->name}}</option>
                                      @endforeach 
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="predmet" class="col-md-4 col-form-label text-md-right">{{ __('Предмет закупки') }}</label>

                                <div class="col-md-6">
                                    <select name="predmet" class="custom-select">
                                      <option>Выберите предмет</option>
                                      @foreach($predmets as $predmet)
                                      <option value="{{$predmet->name}}" {{ $tender->predmet == $predmet->name ? 'selected' : '' }}>{{$predmet->name}}</option>
                                      @endforeach 
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Номер закупки') }}</label>

                                <div class="col-md-6">
                                    <input id="no" type="text" value="{{$tender->no}}" class="form-control" name="no" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Ссылка на закупку') }}</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" value="{{$tender->link}}" class="form-control" name="link" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zakazchik" class="col-md-4 col-form-label text-md-right">{{ __('Заказчик') }}</label>

                                <div class="col-md-6">
                                    <input id="zakazchik" type="text" value="{{$tender->zakazchik}}" class="form-control" name="zakazchik" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Наименование закупки') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" value="{{$tender->title}}" class="form-control" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tz" class="col-md-4 col-form-label text-md-right">{{ __('Техничечкое задание на закупку  ') }}</label>

                                <div class="col-md-6">
                                    <a href="{{url(''.$tender->tz)}}" target="_blank">{{$tender->tz}}</a>
                                    <input id="tz" type="file" class="form-control " name="tz" value="{{ old('tz') }}" >

                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Количество ') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="number" value="{{$tender->quantity}}" class="form-control" name="quantity" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="priceForUnit" class="col-md-4 col-form-label text-md-right">{{ __('Цена закупки за ед. ') }}</label>

                                <div class="col-md-6">
                                    <input id="priceForUnit" type="number" value="{{$tender->priceForUnit}}" class="form-control" name="priceForUnit" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="finishTime" class="col-md-4 col-form-label text-md-right">{{ __('Срок окончания приема заявок') }}</label>

                                <div class="col-md-6">
                                    <input id="finishTime" type="datetime-local" value="{{$tender->finishTime}}" class="form-control" name="finishTime" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="aukcionDate" class="col-md-4 col-form-label text-md-right">{{ __('Дата проведения аукциона') }}</label>

                                <div class="col-md-6">
                                    <input id="aukcionDate" type="datetime-local" class="form-control" name="aukcionDate" value="{{$tender->aukcionDate}}" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Адрес поставки') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" value="{{$tender->address}}" class="form-control" name="address" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="finishForDelivery" class="col-md-4 col-form-label text-md-right">{{ __('Срок поставки ') }}</label>

                                <div class="col-md-6">
                                    <input id="finishForDelivery" type="number" value="{{$tender->finishForDelivery}}" class="form-control" name="finishForDelivery" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="obespechenie" class="col-md-4 col-form-label text-md-right">{{ __('Обеспечение заявки') }}</label>

                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" {{ $tender->obespechenie == "1" ? 'checked' : '' }} id="obespechenie" name="obespechenie">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="procentOtZakupki" class="col-md-4 col-form-label text-md-right">{{ __('Процент от суммы закупки  ') }}</label>

                                <div class="col-md-6">
                                    <input id="procentOtZakupki" type="text" class="form-control" name="procentOtZakupki" value="{{$tender->procentOtZakupki}}" required onchange="changeInputs()">
                                </div>
                            </div>
                            

                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="submitted" class="col-md-4 col-form-label text-md-right">{{ __('Заявка подано') }}</label>

                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" {{ $tender->submitted == "1" ? 'checked' : '' }} id="submitted" name="submitted">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="providerUnitPrice" class="col-md-4 col-form-label text-md-right">{{ __('Цена поставщика за ед. ') }}</label>

                                <div class="col-md-6">
                                    <input id="providerUnitPrice" type="number" value="{{$tender->providerUnitPrice}}" class="form-control" name="providerUnitPrice" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="transportation" class="col-md-4 col-form-label text-md-right">{{ __('Транспортные расходы ') }}</label>

                                <div class="col-md-6">
                                    <input id="transportation" type="number" class="form-control" name="transportation" value="{{$tender->transportation}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="customs" class="col-md-4 col-form-label text-md-right">{{ __('Растаможка ') }}</label>

                                <div class="col-md-6">
                                    <input id="customs" type="number" value="{{$tender->customs}}" class="form-control" name="customs" required onchange="changeInputs()">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="certification" class="col-md-4 col-form-label text-md-right">{{ __('Сертификация ') }}</label>

                                <div class="col-md-6">
                                    <input id="certification" type="number" value="{{$tender->certification}}" class="form-control" name="certification" required onchange="changeInputs()">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="myUnitPrice" class="col-md-4 col-form-label text-md-right">{{ __('Моя цена за ед. ') }}</label>

                                <div class="col-md-6">
                                    <input id="myUnitPrice" type="number" value="{{$tender->myUnitPrice}}" class="form-control" name="myUnitPrice" required onchange="changeInputs()">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="taxProcent" class="col-md-4 col-form-label text-md-right">{{ __('Процент налогообложения ') }}</label>

                                <div class="col-md-6">
                                    <input id="taxProcent" type="number" value="{{$tender->taxProcent}}" class="form-control" name="taxProcent" required onchange="changeInputs()">
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label for="procentNDS" class="col-md-4 col-form-label text-md-right">{{ __('Процент НДС ') }}</label>

                                <div class="col-md-6">
                                    <input id="procentNDS" type="number" class="form-control" name="procentNDS" value="{{$tender->procentNDS}}" required onchange="changeInputs()">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="comission" class="col-md-4 col-form-label text-md-right">{{ __('Комиссия банка за перевод и другие операции по тендеру ') }}</label>

                                <div class="col-md-6">
                                    <input id="comission" type="number" value="{{$tender->comission}}" class="form-control" name="comission" required onchange="changeInputs()">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="obespechenie" class="col-md-4 col-form-label text-md-right">{{ __('Выиграли') }}</label>

                                <div class="col-md-6">
                                    <input id="won" class="form-check-input" type="checkbox" {{ $tender->won == "1" ? 'checked' : '' }} id="won" name="won">
                                </div>
                            </div>

                            <div id="wonDiv" {{ $tender->won != "1" ? "style='display: none'" : '' }} >
                                <div class="form-group row">
                                    <label for="dogovorDate" class="col-md-4 col-form-label text-md-right">{{ __('Дата подписания договора ') }}</label>

                                    <div class="col-md-6">
                                        <input id="dogovorDate" type="datetime-local" value="{{$tender->dogovorDate}}" class="form-control" name="dogovorDate">
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="zakazchikLico" class="col-md-4 col-form-label text-md-right">{{ __('Контактное лицо заказчика') }}</label>

                                    <div class="col-md-6">
                                        <input id="zakazchikLico" type="text" value="{{$tender->zakazchikLico}}" class="form-control" name="zakazchikLico">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="zakazchikContact" class="col-md-4 col-form-label text-md-right">{{ __('Контакты заказчика') }}</label>

                                    <div class="col-md-6">
                                        <input id="zakazchikContact" type="text" value="{{$tender->zakazchikContact}}" class="form-control" name="zakazchikContact">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="obespechenie" class="col-md-4 col-form-label text-md-right">{{ __('Получил оплату ') }}</label>

                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" {{ $tender->oplata == "1" ? 'checked' : '' }} id="oplata" name="oplata">
                                    </div>
                                </div>
                            </div>
                        </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Изменить') }}
                        </button>
                    </div>
                </div> 
            </div>
            <div class="row" style="display: none;">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="sum" class="col-md-4 col-form-label text-md-right">{{ __('Сумма закупки ') }}</label>

                        <div class="col-md-6">
                            <input id="sum" type="text" value="{{$tender->sum}}" class="form-control" name="sum" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="summaZakupki" class="col-md-4 col-form-label text-md-right">{{ __('Сумма обеспечния заявки  ') }}</label>

                        <div class="col-md-6">
                            <input id="summaZakupki" type="text" value="{{$tender->summaZakupki}}" class="form-control" name="summaZakupki" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="neustoyka" class="col-md-4 col-form-label text-md-right">{{ __('Неустойка ') }}</label>

                        <div class="col-md-6">
                            <input id="neustoyka" type="text" value="{{$tender->neustoyka}}" class="form-control" name="neustoyka">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sumNDS" class="col-md-4 col-form-label text-md-right">{{ __('Сумма НДС ') }}</label>

                        <div class="col-md-6">
                            <input id="sumNDS" type="number" value="{{$tender->sumNDS}}" class="form-control" name="sumNDS" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="margin" class="col-md-4 col-form-label text-md-right">{{ __('Маржа(%) ') }}</label>

                        <div class="col-md-6">
                            <input id="margin" type="text" value="{{$tender->margin}}" class="form-control" name="margin" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="taxSum" class="col-md-4 col-form-label text-md-right">{{ __('Сумма налога   ') }}</label>

                        <div class="col-md-6">
                            <input id="taxSum" type="number" class="form-control" name="taxSum" value="{{$tender->taxSum}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profit" class="col-md-4 col-form-label text-md-right">{{ __('Прибыль ') }}</label>

                        <div class="col-md-6">
                            <input id="profit" type="number" value="{{$tender->profit}}" class="form-control" name="profit" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mySum" class="col-md-4 col-form-label text-md-right">{{ __('Моя сумма ') }}</label>

                        <div class="col-md-6">
                            <input id="mySum" type="number" value="{{$tender->mySum}}" class="form-control" name="mySum" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="allConsumptions" class="col-md-4 col-form-label text-md-right">{{ __('Общие расходы ') }}</label>

                        <div class="col-md-6">
                            <input id="allConsumptions" type="number" value="{{$tender->allConsumptions}}" class="form-control" name="allConsumptions" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="providerSumPrice" class="col-md-4 col-form-label text-md-right">{{ __('Сумма поставщика ') }}</label>

                        <div class="col-md-6">
                            <input id="providerSumPrice" type="number" class="form-control" value="{{$tender->providerSumPrice}}" name="providerSumPrice" required onchange="changeInputs()">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sumBank" class="col-md-4 col-form-label text-md-right">{{ __('Сумма комиссии банка') }}</label>

                        <div class="col-md-6">
                            <input id="sumBank" type="number" class="form-control" name="sumBank" onchange="changeInputs()">
                        </div>
                    </div>
                </div>
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
   $(document).ready(function(){
    $('#won').change(function(){
        if(this.checked)
            $('#wonDiv').fadeIn('slow');
        else
            $('#wonDiv').fadeOut('slow');

    });
});   
   function changeInputs(){
    var quantity = $("#quantity").val();
    var priceForUnit = $('#priceForUnit').val();
    var sum = quantity * priceForUnit;
        //$('#sum').val(sum);
        var procentOtZakupki = $('#procentOtZakupki').val();
        var summaZakupki = sum*procentOtZakupki/100;
        //$('#summaZakupki').val(summaZakupki);
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