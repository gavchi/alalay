@extends('layout.admin')

@section('content')
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Клиенты</h4>
        </div>
        <div class="panel-body">
            <a href="{{action('AdminController@getAddClient')}}" class="btn btn-success">Добавить</a>
            <table id="data-table" class="table table-bordered nowrap" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Картинка</th>
                </tr>
                </thead>
                <tbody id="sortable" url="{{action('AdminController@anyOrderClients')}}">
                @foreach($Clients as $Client)
                    <tr order="{{$Client->id}}">
                        <td class="client_panel">
                            <a href="{{action('AdminController@getEditClient', $Client->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-pencil"></i> </a>
                            <a href="{{action('AdminController@getDeleteClient', $Client->id)}}" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> </a>
                        </td>
                        <td class="client_title">{{$Client->title}}</td>
                        <td class="client_image"><img src="{{asset(config('image.path.client').$Client->image)}}" width="150"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop