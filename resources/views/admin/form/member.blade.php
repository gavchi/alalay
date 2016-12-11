@extends('layout.admin')

@section('content')
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Форма сотрудника</h4>
        </div>
        <div class="panel-body">
            <form action="{{action('AdminController@postEditMember', isset($Member) ? $Member->id : null)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-3 control-label">Имя</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Имя" name="name" @if(isset($Member) && $Member) value="{{$Member->name}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Должность</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Должность" name="post" @if(isset($Member) && $Member) value="{{$Member->post}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Фото</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop