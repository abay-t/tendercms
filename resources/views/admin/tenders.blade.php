@extends('layouts.app')

@section('content')

<div class="container">
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
						<a href="{{ route('addtender') }}" class="btn btn-primary"><i class="material-icons"></i> <span>Добавить тендер</span></a>
						<!-- <a href="#" class="btn btn-primary"><i class="material-icons"></i> <span>Export to Excel</span></a> -->						
					</div>
                </div>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success">
            	{{ session()->get('message') }}
            </div>
            @endif
            <form method="POST" action="{{ route('search') }}">
            	@csrf
            	<div class="row search">
            		<div class="col-md-2">
            			<input type="text" value="<?php if(isset($request)) echo $request->title;?>" name="title" class="form-control" placeholder="Наименование">
            		</div>
            		<div class="col-md-2">
            			<input type="text" value="<?php if(isset($request)) echo $request->no;?>" name="no" class="form-control" placeholder="номер лота">
            		</div>
            		<div class="col-md-2">
            			<select name="tip" class="custom-select">
            				<option value="" <?php if(!isset($request) || $request->tip == ''){?>selected <?php }?>>Выберите тип</option>
            				@foreach($tips as $tip)
            				<option value="{{$tip->name}}" <?php if(isset($request) && $request->tip == $tip->name){ echo "selected"; }?> >{{$tip->name}}</option>
            				@endforeach 
            			</select>
            		</div>
            		<div class="col-md-3">
            			<select name="portal" class="custom-select">
            				<option value="" <?php if(!isset($request) || $request->portal == ''){?>selected <?php }?>>Выберите портал</option>
            				@foreach($portals as $portal)
            				<option value="{{$portal->name}}" <?php if(isset($request) && $request->portal == $portal->name){ echo "selected"; }?>>{{$portal->name}}</option>
            				@endforeach 
            			</select>
            		</div>
            		<div class="col-md-1">
            			<input class="form-check-input" type="checkbox" id="submitted" name="submitted" <?php if(isset($request) && $request->submitted == 'on') echo "checked";?>>{{ __('Заявка подано') }}
            		</div>
            		<div class="col-md-2">
            			<input type="submit" value="Искать" class="form-control btn btn-primary">
            		</div>
            	</div>
            </form>

            @if(isset($search))

            <h2>{{$search}}</h2>

            @endif

            <div class="row">
            	<div class="col-md-3">
            		<p><strong>сортировать по</strong></p>
            	</div>
            	<div class="col-md-3">
            		<a href="{{url('/admin/tenders/price')}}"><p>цене</p></a>
            	</div>
            	<div class="col-md-3">
            		<a href="{{url('/admin/tenders/date')}}"><p>дате окончания</p></a>
            	</div>
            	<div class="col-md-3">
            		<a href="{{url('/admin/tenders/margin')}}"><p>маржинальности</p></a>
            	</div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Наименование товара</th>						
						<th>Сумма закупки</th>
						<th>Сумма поставщика</th>
						<th>Моя сумма</th>
						<th>Дата окончание</th>
                        <th>Статус</th>
						<th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($tenders as $key=>$tender)

	                	<tr>
	                		<td>{{ ++$key }}</td>
	                		<td>
	                			<a href="{{url('tender/'.$tender->id)}}">
	                			{{ $tender->title }}
	                			</a>
	                		</td>
	                		<td>
	                			{{number_format($tender->sum, 2, ',', ' ')}}
	                		</td> 
	                		<td>
	                			{{number_format($tender->providerSumPrice, 2, ',', ' ')}}
	                		</td>  
	                		<td>
	                			{{number_format($tender->mySum, 2, ',', ' ')}}
	                		</td>                     
	                		<td>{{ $tender->finishTime }}</td>
	                		<td><span class="status text-danger text-warning text-success">•</span> Active</td>
	                		<td>
	                			<a href="{{url('tender/'.$tender->id.'/edit')}}" class="settings" title=""  data-original-title="Settings"><i class="material-icons"></i></a>
	                			<a onclick="return confirm('Вы уверены?')"  href="{{url('tender/'.$tender->id.'/delete')}}" class="delete" data-original-title="Delete"><i class="material-icons"></i></a>
	                		</td>
	                	</tr>
                	@endforeach
                    
                </tbody>
            </table>

            @include('pagination', ['paginator' => $tenders])
        </div>
    </div>

@endsection