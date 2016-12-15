@extends('layout.admin')

@section('content')
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Новости</h4>
        </div>
        <div class="panel-body">
            <a href="{{action('AdminController@getAddNews')}}" class="btn btn-success">Добавить</a>
            {{$News->links()}}
            <table id="data-table" class="table table-bordered nowrap" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Картинка</th>
                    <th>Теги</th>
                </tr>
                </thead>
                <tbody>
                @foreach($News as $Item)
                    <tr>
                        <td>
                            <a href="{{action('AdminController@getEditNews', $Item->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-pencil"></i> </a>
                            <a href="{{action('AdminController@getDeleteNews', $Item->id)}}" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> </a>
                        </td>
                        <td>{{$Item->title}}</td>
                        <td>{{$Item->description}}</td>
                        <td>@if($Item->image)<img src="{{asset(config('image.path.news').$Item->image)}}">@endif</td>
                        <td>
                            @foreach($Item->tags as $Tag)
                                {{$Tag->name}}
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$News->links()}}
        </div>
    </div>
@stop