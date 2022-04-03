@extends('adminlte::page')

@section('title', 'Создать задачу')

@section('content_header')
<h1>Создать задачу</h1>
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('tasks.store') }}">
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
                                            <label for="subject">Тема*</label>
                                            <input name="subject"
                                                   id="subject"
                                                   type="text"
                                                   class="form-control"
                                                   minlength="3"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="due_date">Срок*</label>
                                            <input name="due_date"
                                                   id="due_date"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Укажите в формате: 2022-03-30"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id">Прикрепить к сделке*</label>
                                            <select name="id" id="id" class="form-control" placeholder="выбирите сделку" required>
                                                <option></option>
                                                @foreach($deals->data as $value)
                                                    <option value="{{ $value->id }}"
                                                    >
                                                        {{ $value->Deal_Name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Заметки:</label>
                                            <textarea name="description" id="description" class="form-control" rows="3">

</textarea>
                                        </div>
                                        <div class="form-group">
                                            <input name="priority"
                                                   id="priority"
                                                   type="hidden"
                                                   value="High">
                                        </div>
                                        <div class="form-group">
                                            <input name="status"
                                                   id="status"
                                                   type="hidden"
                                                   value="Not Started">
                                        </div>
                                        <div class="form-group">
                                            <input name="se_module"
                                                   id="se_module"
                                                   type="hidden"
                                                   value="Deals">
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
