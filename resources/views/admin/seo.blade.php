@extends('layout.admin')

@section('content')
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Seo</h4>
        </div>
        <div class="panel-body">
            <a href="{{action('AdminController@getAddSeo')}}" class="btn btn-success">Добавить</a>
            {{$Seo->links()}}
            <table id="data-table" class="table table-bordered nowrap" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Url</th>
                    <th>Title</th>
                    <th>Keywords</th>
                    <th>Description</th>
                    <th>Robots</th>
                    <th>Copyright</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Seo as $Item)
                    <tr>
                        <td>
                            <a href="{{action('AdminController@getEditSeo', $Item->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-pencil"></i> </a>
                            <a href="{{action('AdminController@getDeleteSeo', $Item->id)}}" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> </a>
                        </td>
                        <td>{{$Item->url}}</td>
                        <td>{{$Item->title}}</td>
                        <td>{{$Item->keywords}}</td>
                        <td>{{$Item->description}}</td>
                        <td>{{$Item->robots}}</td>
                        <td>{{$Item->copyright}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$Seo->links()}}
        </div>
    </div>
@stop