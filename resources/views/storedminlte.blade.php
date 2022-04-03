@extends('adminlte::page')

@section('title', 'Подтверждение отправки данных')

@section('content_header')
<h1>Подтверждение отправки данных</h1>
@stop

@section('content')
    <div>
        <p>*Если статус отправки <span style="color: #ff0000;">"Success, record added"</span>, значит данные
            отправились.
            <br>
            *Если статус отправки <span style="color: #ff0000;">"Error, invalid data"</span>, значит произошла ошибка
            отправки. Скорее всего вы неправильно заполнили форму.</p>
        <p></p>
    </div>
    <div class="card">
        <div class="form-group">
            <p></p>
            <p></p>
            <p></p>
            <p style="text-align: center">Статус отправки: <strong><span style="color: #ff0000;">
            "@php echo $status->data[0]->status . ', ' . $status->data[0]->message; @endphp"
             </span></strong></p>
            <p style="text-align: center">Если отправка успешная, можно зайти в ZOHO CRM и глянуть появилась ли там
                запись.</p>
            <p></p>
        </div>
    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop
