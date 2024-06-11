<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hanpico - @yield('title') </title>
    <link rel="icon" href="{{ asset('assets/frontend/favicon.png') }}" sizes="16x16" type="image/png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('assets/backend/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('assets/backend/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('assets/backend/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/backend/css/themes/all-themes.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" id="u0" href="{{ asset('assets/backend/plugins/tinymce/skins/lightgray/skin.min.css') }}">
    @stack('css')
</head>
<body class="theme-blue">
<!-- Page Loader -->
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    @include('layouts.backend.partial.topbar')
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    @include('layouts.backend.partial.sidebar')
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    @yield('content')
</section>

<!-- Jquery Core Js -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('assets/backend/plugins/node-waves/waves.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('assets/backend/js/admin.js') }}"></script>

<script src="{{ asset('assets/frontend/js/myjs.js') }}"></script>
<!-- TinyMCE -->
<script src="{{ asset('assets/backend/plugins/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.PluginManager.add('image', function(editor, url) {
        function createImageList() {
            return function() {
                editor.windowManager.open({
                    title: 'Chèn hình ảnh',
                    url: '/tinymce/image?newsid=',
                    width: 800,
                    height: 550
                });
            };
        }

        editor.addButton('image', {
            icon: 'image',
            tooltip: 'Chèn hình ảnh',
            stateSelector: 'figure.image',
            onclick: createImageList()
        });
        editor.addMenuItem('image', {
            icon: 'image',
            text: 'Chèn hình ảnh',
            context: 'insert',
            prependToContext: true,
            onclick: createImageList()
        });

    });

    tinymce.PluginManager.add('editimage', function(editor, url) {
        function createEditImage() {
            return function() {
                editor.windowManager.open({
                    title: 'Sửa hình ảnh',
                    url: '/tinymce/image?newsid=',
                    width: 550,
                    height: 560
                });
            };
        }
    });

    tinymce.PluginManager.add('media', function(editor, url) {
        function createMediaList() {
            return function() {
                editor.windowManager.open({
                    title: 'Chèn video',
                    url: '/tinymce/video?newsid=',
                    width: 800,
                    height: 550
                });
            };
        }
        editor.addButton('media', {
            icon: 'media',
            tooltip: 'Chèn video',
            stateSelector: 'iframe.exp_video',
            onclick: createMediaList()
        });
        editor.addMenuItem('media', {
            icon: 'media',
            text: 'Chèn video',
            context: 'insert',
            prependToContext: true,
            onclick: createMediaList()
        });

    });


    tinymce.init({
        selector: '#tiny',
        plugins: 'autosave,wordcount,code,fullscreen,table,noneditable,link,media,image,paste,searchreplace,textcolor,editimage,lists',
        toolbar: 'forecolor,backcolor,alignleft,aligncenter,alignjustify,alignright,searchreplace,bold,italic,underline,link,unlink,image,media,block,numlist,bullist,formatselect,quizz,block,fontsizeselect,fullscreen,code',
        toolbar_mode: 'floating',
        skin:'lightgray',
        content_css: '/themev2/editor/css/tinycustomcss.css',
        noneditable_editable_class: "expEdit",
        noneditable_noneditable_class: "expNoEdit",
        height: 350,
        setup : function(ed) {
            ed.on('DblClick', function(e) {
                if (e.target.nodeName=='IMG') {
                    ed.windowManager.open({
                        title: 'Sửa hình ảnh',
                        url: '/tinymce/editimage',
                        width: 600,
                        height: 560
                    });
                }
            });
        },
        style_formats: [
            { title: 'Size 16', inline: 'span', styles: { 'font-size': '16px' } },
            { title: 'Size 18', inline: 'span', styles: { 'font-size': '18px' } },
            { title: 'Size 20', inline: 'span', styles: { 'font-size': '20px' } },
            { title: 'Size 22', inline: 'span', styles: { 'font-size': '22px' } },
            { title: 'Size 24', inline: 'span', styles: { 'font-size': '24px' } },
            { title: 'Subtitle', block: 'h2' }
        ],

        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        entity_encoding: "raw",
        paste_as_text: true,
        relative_urls : false,
        remove_script_host : false,
    });
</script>

<!-- Demo Js -->
<script src="{{ asset('assets/backend/js/demo.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','Error',{
                  closeButton:true,
                  progressBar:true,
               });
        @endforeach
    @endif
</script>
@stack('js')
</body>
</html>
