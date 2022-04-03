@extends('adminlte::page')

@section('title', 'Сделки')

@section('content_header')
    <h1>Создание сделки</h1>

@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('deels.store') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"></div>
                                    <div class="card-subtitle md2 text-muted"></div>
                                        <div class="feelds" id="adddata" role="tabpanel">
                                            <div class="form-group">
                                                <label for="deal_name">Название для сделки*</label>
                                                <input name="deal_name"
                                                       id="deal_name"
                                                       type="text"
                                                       class="form-control"
                                                       minlength="3"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="account_name">Выбрать контрагента*</label>
                                                <select name="account_name" id="account_name" class="form-control" placeholder="выбирите контрагента" required>
                                                    <option></option>
                                                    @foreach($kontragents->data as $value)
                                                        <option value="{{ $value->Account_Name }}"
                                                        >
                                                            {{ $value->Account_Name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="closing_date">Дата заключения*</label>
                                                <input name="closing_date"
                                                       id="closing_date"
                                                       type="text"
                                                       class="form-control"
                                                       placeholder="Укажите в формате: 2022-03-30"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="amount">Сумма сделки</label>
                                                <input name="amount"
                                                       id="amount"
                                                       type="text"
                                                       class="form-control"
                                                       placeholder="цифры в формате: 150.07">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Заметки:</label>
                                                <textarea name="description" id="description" class="form-control" rows="3">

</textarea>
                                            </div>
                                            <div class="form-group">
                                                <input name="stage"
                                                       id="stage"
                                                       type="hidden"
                                                       value="Проводится квалификация">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row justify-content-center button-submit">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
