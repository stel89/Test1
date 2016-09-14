@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Телефонный справочник</div>

                <div class="panel-body">
				
				<!--Тут таблица выводится -->
				
<table class="table table-hover table-condensed">
  <tr><th>№</th><th>Имя</th><th>Номер</th><th>Описание</th><th>Действие</th><th>Действие</th></tr>
  @foreach ($phones as $phone)
  <tr><td>{{$phone->id}}</td><td>{{$phone->name}}</td><td>{{$phone->number}}</td><td>{{$phone->description}}</td>
  <td>
  <form method="POST" action="{{action('PhoneController@edit',['phones'=>$phone->id])}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
  <input type="submit" class="btn btn-primary" value="Изменить"/>
  </form>
</td>
<td>
<input type="submit" class="btn btn-danger del" value="Удалить"/>
</td>
</tr>
  @endforeach
</table>
<form method="GET" action="{{action('PhoneController@create')}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
<input type="submit" class="btn btn-success" value="Создать"/> 
</form>

<script>

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});

$('document').ready(function()
{
$('.del').click(function()
{
parent=$(this).parent().parent();//получаем родителя нашего span. parent будет содержать объект tr (строку нашей таблицы)
id=parent.children().first().html(); //id будет содержать id нашей категории, которое берется из первой ячейки строки
confirm_var=confirm('Точно удалить?');//запрашиваем подтверждение на удаление
if (!confirm_var) return false;
$.ajax({
url:'/'+id, //url куда мы мы передаем delete запрос
method: 'DELETE',
data: {'_token':"{{csrf_token()}}" }, //не забываем передавать токен.
success: function(msg)
{
parent.remove(); // удаляем строчку tr из таблицы
alert('Номер '+msg+' удален');
},
error: function(msg)
{
console.log(msg); // в консоле  отображаем информацию об ошибки, если они есть
}
});
});
});
</script>
            </div>
        </div>
    </div>
</div>



@endsection
