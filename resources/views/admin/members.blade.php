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
            <table id="data-table" class="table table-bordered nowrap" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Должность</th>
                    <th>Фото</th>
                </tr>
                </thead>
                <tbody id="sortable" url="{{action('AdminController@anyOrderMembers')}}">
                @foreach($Members as $Member)
                    <tr order="{{$Member->id}}">
                        <td class="member_panel">
                            <a href="{{action('AdminController@getEditMember', $Member->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-pencil"></i> </a>
                            <a href="{{action('AdminController@getDeleteMember', $Member->id)}}" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> </a>
                        </td>
                        <td class="member_name">{{$Member->name}}</td>
                        <td class="member_post">{{$Member->post}}</td>
                        <td class="member_image"><img src="{{asset(config('image.path.member').$Member->image)}}" width="150"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop