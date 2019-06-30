@extends('layouts.app')

@section('content')

<div class="container-fluid">
        <div class="table-wrapper">
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
						
						<!-- <a href="#" class="btn btn-primary"><i class="material-icons"></i> <span>Export to Excel</span></a> -->						
					</div>
                </div>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success">
            	{{ session()->get('message') }}
            </div>
            @endif
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Остался</th>
                        <th>Данные</th>						
						<th>Дата подписания договора</th>
						<th>Неустойка</th>
                        <th>Контактное лицо </th>
						<th>Контакты заказчика </th>
						<th>Получил оплату</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($tenders as $key=>$tender)

	                	<tr>
	                		<td>{{ ++$key }}</td>
	                		<td>
	                			{{$tender->finishTime}} 
	                		</td>
	                		<td>
	                			<a href="{{url('/tender/'.$tender->id)}}" target="_blank">{{ $tender->title }}</a>
	                		</td>                        
	                		<td>{{$tender->dogovorDate}}</td>
	                		<td>{{$tender->neustoyka}}</td>
	                		<td>{{$tender->zakazchikLico}}</td>
	                		<td>{{$tender->	zakazchikContact}}</td>
	                		<?php
	                			$clas = '';
	                			if($tender->oplata == 1)
	                				$clas = 'text-success';
	                			else
	                				$clas = 'text-warning';
	                		?>
	                		<td><span class="status {{$clas}}">•</span> Оплата</td>
	                		
	                	</tr>
                	@endforeach
                    
                </tbody>
            </table>

            @include('pagination', ['paginator' => $tenders])
        </div>
    </div>

@endsection