@include('admin::example.layouts.sider')
@include('admin::example.layouts.header')
@include('admin::example.layouts.footer')
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ __('backend').__('system') }}</title>
        <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/dataTable2/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-ui.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
        <style type="text/css">
            .select2-container--bootstrap4 span.select2-selection__clear{
                width: 1em;
                height: 1em;
                line-height: 1em;
            }
            .dark-mode ~ .select2-container.select2-container--default .select2-dropdown {
                background-color: #1b1f22;
                border-color: #383f45;
            }
            .dark-mode ~ .select2-container--default .select2-search--dropdown .select2-search__field {
                color: #c5cdd8;
                background-color: #1b1f22;
                border-color: #383f45;
            }
            .dark-mode ~ .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #c5cdd8;
            }
            .dark-mode ~ .select2-container--default .select2-results__option[aria-selected=true] {
                color: #fff;
                background-color: #0284c7;
            }
            .dark-mode ~ .select2-container--default{
                background-color: #1f2326;
                color: #a0aab3;
            }
            .dark-mode #btabs-static-profile pre{
                color: white;
            }
            /* 背景颜色为灰色 */
            span.selection span.select2-selection__clear {
                background-color: gray;
                display: inline-block;
                font-family: Arial, sans-serif;
                font-size: 15px;
                color: white;
                width: 16px;
                height: 16px;
                border-radius: 50%; /* 圆圈的边框半径设置为50% */
                text-align: center;
                line-height: 16px;
                margin-right: 5px;
            }
            .accordion {
                --bs-accordion-bg: #ffffff;
            }
        </style>
        @yield('css_after')
        @stack('style')
        </head>
        <body>
            <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content">
                <nav id="sidebar">
                    @yield('sider')
                </nav>

                <header id="page-header">
                    @yield('header')
                </header>

                <main id="main-container">
                    <div class="content">
                    <h2 class="content-heading">
                        {{ $titleData??'' }}
                    </h2>
                    @yield('content')
                    {{ $slot ?? ''}}
                    </div>
                </main>

                <footer id="page-footer">
                    @yield('footer')
                </footer>
            </div>
        <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
        <script src="{{asset(Universal::version('assets/js/plugins/jquery-validation/jquery.validate.min.js'))}}"></script>
        <script src="{{asset(Universal::version('assets/js/plugins/jquery-validation/localization/messages_zh_TW.min.js'))}}"></script>
        <script src="{{ asset('assets/js/plugins/dataTable2/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('js/jquery.form.min.js') }}"></script>
        <script src="{{ asset('js/ajax.js?'.time()) }}"></script>
        <script src="{{ asset('js/common.js?'.time()) }}"></script>
        <script type="text/javascript">
        </script>
        @yield('js_after')
        @stack('scripts')
        @stack('javascript')
        @stack('extends')
    </body>
</html>