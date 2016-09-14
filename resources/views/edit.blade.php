@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Измение номера</div>
				<div class="panel-body">
				<div class="form-group">
				<form method="POST" action="{{action('PhoneController@update', ['phones' => $phone->id])}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<input type="hidden" name="_method" value="put"/>
				<label for="name1">Имя</label>
				<input type="text" name="name" class="form-control" value="{{$phone->name}}" id="name"/><br>
					 @if ($errors->has('name'))
                                   <ul class="list-group">
                                  <li class="list-group-item list-group-item-danger">*Поле <Имя> обязательно для заполнения и может содержать только буквы</li> 
                                  </ul>
                      @endif
				<label for="nubmer1">Номер</label>
				<input type="number" name="number" id="number1" class="form-control"  value="{{$phone->number}}"/><br>
					 @if ($errors->has('number'))
                                   <ul class="list-group">
                                  <li class="list-group-item list-group-item-danger">*Поле <Номер> обязательно для заполнения и может содержать только цыфры</li> 
                                  </ul>
                      @endif
				<label for="text1">Описание</label>
				<textarea name="description" class="form-control" rows="12" id="text1" placeholder="До 255 символов">{{$phone->description}}</textarea><br>
					 @if ($errors->has('description'))
                                   <ul class="list-group">
                                  <li class="list-group-item list-group-item-danger">*Не более 255 символов</li> 
                                  </ul>
                      @endif
				<input type="submit" value="Добавить" class="btn btn-success">
				</form>
				<button class="btn btn-warning" style="position:relative; top:-34px; right:-100px;" onclick="location.href = '/'">Вернуться</button>		
				</div>	            
            </div>
        </div>
    </div>
</div>
@endsection
