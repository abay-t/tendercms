@extends('layouts.app')
@section('content')
<?php 
	$namec = '';
	if($name == 'portal'){
		$namec = 'Портал';
	}
	elseif ($name == 'predmet') {
		$namec = 'Предмет';
	}
	else{
		$namec = 'Тип';
	}
?>
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
						<a href="{{ route('add'.$name) }}" class="btn btn-primary"><i class="material-icons"></i> <span>Добавить {{$namec}}</span></a>
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
                        <th>Наименование {{$namec}}а</th>	
						<th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($portals as $key=>$portal)

	                	<tr>
	                		<td>{{ ++$key }}</td>
	                		<td>
	                			<a href="{{url(''.$name.'/'.$portal->id)}}">
	                			{{ $portal->name }}
	                			</a>
	                		</td>
	                		<td>
	                			<a href="{{url($name.'/'.$portal->id.'/edit')}}" class="settings" title=""  data-original-title="Settings"><i class="material-icons"></i></a>
	                			<a onclick="return confirm('Вы уверены?')"  href="{{url($name.'/'.$portal->id.'/delete')}}" class="delete" data-original-title="Delete"><i class="material-icons"></i></a>
	                		</td>
	                	</tr>
                	@endforeach
                    
                </tbody>
            </table>

            @include('pagination', ['paginator' => $portals])
        </div>
    </div>

@endsection