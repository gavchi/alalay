@extends('layout.admin')

@section('content')
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Работы</h4>
        </div>
        <div class="panel-body">
            <a href="{{action('AdminController@getAddWork')}}" class="btn btn-success">Добавить</a>
            {{--$Works->links()--}}
            <table id="data-table" class="table table-bordered nowrap" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Проведенная работа</th>
                    <th>Описание</th>
                    <th>Картинка</th>
                </tr>
                </thead>
                <tbody id="sortable" url="{{action('AdminController@anyOrderWorks')}}">
                @foreach($Works as $Work)
                    <tr order="{{$Work->id}}">
                        <td class="work_panel">
                            <a href="{{action('AdminController@getEditWork', $Work->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-pencil"></i> </a>
                            <a href="{{action('AdminController@getDeleteWork', $Work->id)}}" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> </a>
                        </td>
                        <td class="work_title">{{$Work->title}}</td>
                        <td class="work_type">{{$Work->work_type}}</td>
                        <td class="work_description">{{$Work->description}}</td>
                        <td class="work_image">
                            <a href="{{asset(config('image.path.work.main').$Work->image)}}" target="_blank">
                                <img src="{{asset(config('image.path.work.logo').$Work->logo)}}" width="150">
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--$Works->links()--}}
        </div>
    </div>
@stop
