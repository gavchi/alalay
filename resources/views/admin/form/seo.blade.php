@extends('layout.admin')

@section('content')
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">Форма Seo</h4>
        </div>
        <div class="panel-body">
            <form action="{{action('AdminController@postEditSeo', isset($Seo) ? $Seo->id : null)}}" method="post" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-3 control-label">Url</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Url" name="url" @if(isset($Seo) && $Seo) value="{{$Seo->url}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Title</label>
                    <div class="col-md-9">
                        <textarea type="text" class="form-control" placeholder="Title" name="title">@if(isset($Seo) && $Seo){{$Seo->title}}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Keywords</label>
                    <div class="col-md-9">
                        <textarea type="text" class="form-control" placeholder="Keywords" name="keywords">@if(isset($Seo) && $Seo){{$Seo->keywords}}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Description</label>
                    <div class="col-md-9">
                        <textarea type="text" class="form-control" placeholder="Description" name="description">@if(isset($Seo) && $Seo){{$Seo->description}}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Robots</label>
                    <div class="col-md-9">
                        <textarea type="text" class="form-control" placeholder="Robots" name="robots">@if(isset($Seo) && $Seo){{$Seo->robots}}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Copyright</label>
                    <div class="col-md-9">
                        <textarea type="text" class="form-control" placeholder="Copyright" name="copyright">@if(isset($Seo) && $Seo){{$Seo->copyright}}@endif</textarea>
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