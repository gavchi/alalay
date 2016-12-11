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
            {{$Clients->links()}}
            <table id="data-table" class="table table-bordered nowrap" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Картинка</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Clients as $Client)
                    <tr>
                        <td>
                            <a href="{{action('AdminController@getEditClient', $Client->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-pencil"></i> </a>
                            <a href="{{action('AdminController@getDeleteClient', $Client->id)}}" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> </a>
                        </td>
                        <td>{{$Client->title}}</td>
                        <td><img src="{{asset(config('image.path.client').$Client->image)}}"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$Clients->links()}}
        </div>
    </div>
@stop