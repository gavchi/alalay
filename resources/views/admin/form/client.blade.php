@extends('layout.admin')

@section('content')
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Форма клиента</h4>
        </div>
        <div class="panel-body">
            <form action="{{action('AdminController@postEditClient', isset($Client) ? $Client->id : null)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-3 control-label">Название</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Название" name="title" @if(isset($Client) && $Client) value="{{$Client->title}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Картинка</label>
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