<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Alalay Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/css/animate.min.css" rel="stylesheet" />
    <link href="/assets/css/style.min.css" rel="stylesheet" />
    <link href="/assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="/assets/plugins/iviewer/jquery.iviewer.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="/assets/css/theme/red.css" rel="stylesheet" id="theme" data-theme="red"/>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
    <link href="/assets/css/custom.css" rel="stylesheet"/>
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <a href="/admin" class="navbar-brand"><span class="navbar-logo"></span> Dashboard</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li><a href="/admin/clients"><i class="fa fa-child"></i> <span>Клиенты</span></a></li>
                <li><a href="/admin/works"><i class="fa fa-briefcase"></i> <span>Портфолио</span></a></li>
                <li><a href="/admin/news"><i class="fa fa-bullhorn"></i> <span>Новости</span></a></li>
                <li><a href="/admin/members"><i class="fa fa-users"></i> <span>Команда</span></a></li>
                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-8 -->
            <div class="col-md-12">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('valid_error'))
                    <div class="alert alert-danger">
                        {{session()->pull('valid_error')}}
                    </div>
                @endif

                @if (session()->has('message'))
                    <div class="alert alert-{{session()->get('message_level', 'success')}}">
                        {{session()->pull('message')}}
                    </div>
                @endif

                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{session()->pull('status')}}
                    </div>
                @endif

                @yield('content')

            </div>
            <!-- end col-8 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end #content -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.ru.js"></script>
<!--[if lt IE 9]>
<script src="/assets/crossbrowserjs/html5shiv.js"></script>
<script src="/assets/crossbrowserjs/respond.min.js"></script>
<script src="/assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="/assets/js/jquery.autocomplete.js"></script>
<script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>
<script src="/assets/js/apps.min.js"></script>
<script src="/assets/plugins/iviewer/jquery.iviewer.min.js"></script>
<script src="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
<script src="/assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        //Dashboard.init();

        if($('[role="tags"]').length){
            $('[role="tags"]').tagit({
                fieldName: 'tags',
                singleField: true,
                autocomplete: {
                    serviceUrl: '/admin/tags',
                    dataType: 'json',
                    minChars: 2,
                    lookupLimit: 10
                }
            });
        }
    });
</script>
</body>
</html>
