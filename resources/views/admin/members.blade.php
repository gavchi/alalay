@extends('layout.admin')

@section('content')
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Команда</h4>
        </div>
        <div class="panel-body">
            <a href="{{action('AdminController@getAddMember')}}" class="btn btn-success">Добавить</a>
            {{$Members->links()}}
            <table id="data-table" class="table table-bordered nowrap" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Должность</th>
                    <th>Фото</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Members as $Member)
                    <tr>
                        <td>
                            <a href="{{action('AdminController@getEditMember', $Member->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-pencil"></i> </a>
                            <a href="{{action('AdminController@getDeleteMember', $Member->id)}}" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> </a>
                        </td>
                        <td>{{$Member->name}}</td>
                        <td>{{$Member->post}}</td>
                        <td><img src="{{asset(config('image.path.member').$Member->image)}}"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$Members->links()}}
        </div>
    </div>
@stop