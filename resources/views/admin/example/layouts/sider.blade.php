@section('sider')
<div class="sidebar-content">
  <div class="content-header justify-content-lg-center">
    <div>
      <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
        <i class="fa fa-fw fa-times"></i>
      </button>
    </div>
  </div>

  <div class="js-sidebar-scroll">
    <div class="content-side content-side-user px-0 py-0">
      <div class="smini-visible-block animated fadeIn px-2">
        <img class="img-avatar img-avatar32" src="{{ asset('assets/media/avatars/avatar15.jpg') }}" alt="">
      </div>

      <div class="smini-hidden text-center mx-auto">
        <a class="img-link" href="javascript:void(0);">
          <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar15.jpg') }}" alt="">
        </a>
        <ul class="list-inline mt-3 mb-0">
          <li class="list-inline-item">
          </li>
        </ul>
      </div>
    </div>

    <div class="content-side content-side-full">
      <ul class="nav-main">
        <li class="nav-main-item @if(preg_match("/input|radio|checkbox/",Route::currentRouteName())) open @endif">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0);">
              <span class="nav-main-link-name">Component</span>
            </a>
            <ul class="nav-main-submenu">
              <a class="nav-main-link @if(preg_match("#input#",Route::currentRouteName())) active @endif" href="{{route('example.input.index')}}">
                <span class="nav-main-link-name">Input</span>
              </a>
              <a class="nav-main-link @if(preg_match("#radio#",Route::currentRouteName())) active @endif" href="{{route('example.radio.index')}}">
                <span class="nav-main-link-name">Radio</span>
              </a>
              <a class="nav-main-link @if(preg_match("#checkbox#",Route::currentRouteName())) active @endif" href="{{route('example.checkbox.index')}}">
                <span class="nav-main-link-name">Checkbox</span>
              </a>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection