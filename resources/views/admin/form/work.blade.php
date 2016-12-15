@extends('layout.admin')

@section('content')
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Форма работы</h4>
        </div>
        <div class="panel-body">
            <form action="{{action('AdminController@postEditWork', isset($Work) ? $Work->id : null)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-3 control-label">Название</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Название" name="title" @if(isset($Work) && $Work) value="{{$Work->title}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Проведенная работа</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Проведенная работа" name="work_type" @if(isset($Work) && $Work) value="{{$Work->work_type}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Описание</label>
                    <div class="col-md-9">
                        <textarea type="text" class="form-control" placeholder="Описание" name="description">@if(isset($Work) && $Work) {{$Work->description}} @endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Лого</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="logo">
                    </div>
                </div>
                @if(isset($Work) && $Work)
                <div class="form-group">
                    <label class="col-md-3 control-label">Текущий вид лого</label>
                    <div class="col-md-9" style="width: 300px">
                        <a href="{{asset(config('image.path.work.main').$Work->image)}}" target="_blank" class="portfolio__item @if($Work->mask){{$Work->mask->name}}@endif text-white">
                            <div class="portfolio__img">
                                <img src="{{asset(config('image.path.work.logo').$Work->logo)}}" alt="{{$Work->title}}">
                            </div><!--.portfolio__img-->
                        </a><!--.portfolio__item-->
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label class="col-md-3 control-label">Маска</label>
                    <div class="col-md-9">
                        <select class="form-control" name="mask" role="changeMask">
                            <option value="" @if(isset($Work) && $Work && is_null($Work->mask)) selected @endif>Нет</option>
                            @foreach($Masks as $Masks)
                            <option value="{{$Masks->id}}" @if(isset($Work) && $Work && $Work->mask && $Work->mask->id === $Masks->id) selected @endif>{{$Masks->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Детально</label>
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
