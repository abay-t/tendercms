@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-9">
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
                        <div class="col-sm-3">
                            <a href="{{ route('addtender') }}" class="btn btn-primary"><i class="material-icons"></i> <span>Добавить тендер</span></a>
                            <!-- <a href="#" class="btn btn-primary"><i class="material-icons"></i> <span>Export to Excel</span></a> -->                       
                        </div>
                    </div>
                </div>
                <h2 style="padding: 15px;">{{ __('Данные о тендере') }}</h2>
                <br>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                
                    <div class="row tender-info">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="portal" class="col-md-4 col-form-label text-md-right">{{ __('Портал закупки') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->portal}}">
                                    

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Тип закупки ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{ $tender->type }}">
                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="predmet" class="col-md-4 col-form-label text-md-right">{{ __('Предмет закупки') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{ $tender->predmet}}">
                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Номер закупки') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->no}}">
                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Ссылка на закупку') }}</label>

                                <div class="col-md-6">
                                    <a href="{{$tender->link}}" target="_blank">{{$tender->link}}</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zakazchik" class="col-md-4 col-form-label text-md-right">{{ __('Заказчик') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->zakazchik}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Наименование закупки') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->title}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tz" class="col-md-4 col-form-label text-md-right">{{ __('Техничечкое задание на закупку  ') }}</label>

                                <div class="col-md-6">
                                    <a href="{{url(''.$tender->tz)}}" target="_blank">{{$tender->tz}}</a>
                                    

                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Количество ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->quantity}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="priceForUnit" class="col-md-4 col-form-label text-md-right">{{ __('Цена закупки за ед. ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->priceForUnit, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sum" class="col-md-4 col-form-label text-md-right">{{ __('Сумма закупки ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->sum, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="finishTime" class="col-md-4 col-form-label text-md-right">{{ __('Срок окончания приема заявок') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->finishTime}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="aukcionDate" class="col-md-4 col-form-label text-md-right">{{ __('Дата проведения аукциона') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->aukcionDate}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Адрес поставки') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->address}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="finishForDelivery" class="col-md-4 col-form-label text-md-right">{{ __('Срок поставки ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->finishForDelivery}}">
                                    
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label for="summaZakupki" class="col-md-4 col-form-label text-md-right">{{ __('Сумма обеспечния заявки  ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->summaZakupki, 2, ',', ' ')}}">
                                    
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
                                <label for="obespechenie" class="col-md-4 col-form-label text-md-right">{{ __('Выиграли') }}</label>

                                <div class="col-md-6">
                                    <input id="won" class="form-check-input" type="checkbox" {{ $tender->won == "1" ? 'checked' : '' }} id="won" name="won">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="providerUnitPrice" class="col-md-4 col-form-label text-md-right">{{ __('Цена поставщика за ед. ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->providerUnitPrice, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="providerSumPrice" class="col-md-4 col-form-label text-md-right">{{ __('Сумма поставщика ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->providerSumPrice, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="transportation" class="col-md-4 col-form-label text-md-right">{{ __('Транспортные расходы ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->transportation, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="customs" class="col-md-4 col-form-label text-md-right">{{ __('Растаможка ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->customs, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="certification" class="col-md-4 col-form-label text-md-right">{{ __('Сертификация ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->certification, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="allConsumptions" class="col-md-4 col-form-label text-md-right">{{ __('Общие расходы ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->allConsumptions, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="myUnitPrice" class="col-md-4 col-form-label text-md-right">{{ __('Моя цена за ед. ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->myUnitPrice, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mySum" class="col-md-4 col-form-label text-md-right">{{ __('Моя сумма ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->mySum, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label for="taxSum" class="col-md-4 col-form-label text-md-right">{{ __('Сумма налога   ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->taxSum, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="profit" class="col-md-4 col-form-label text-md-right">{{ __('Прибыль ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->profit, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="margin" class="col-md-4 col-form-label text-md-right">{{ __('Маржа(%) ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{$tender->margin}}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sumNDS" class="col-md-4 col-form-label text-md-right">{{ __('Сумма НДС ') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->sumNDS, 2, ',', ' ')}}">
                                    
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="sumBank" class="col-md-4 col-form-label text-md-right">{{ __('Сумма комиссии банка') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" value="{{number_format($tender->sumBank, 2, ',', ' ')}}">

                                    
                                </div>
                            </div>



                            

                            
                        </div>    


                    </div>
                </div>



        </div>
    </div>
</div>
</div>
</div>
@endsection
