@foreach ($menu as $val)
  @if(auth()->user()->admin_group_id != '1' &&
    ($val->status != '1' ||
    !in_array($val->id, $userPermissions))
    )
    @continue
  @endif
  <li class="nav-main-item @if(preg_match("/".(implode("|",$val->submenu->map(function($item){
    return 'backend.'.$item->link;
  })->toArray()))."/",Route::currentRouteName())) open @endif">
    @if($val->submenu->count() > 0)
      <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0);">
        <span class="nav-main-link-name">{{ $val->name }}</span>
      </a>
      <ul class="nav-main-submenu">
        @include('backend.layouts.submenu', ['menu' => $val->submenu])
      </ul>
    @else
      <a class="nav-main-link @if(preg_match("#^".'backend\.'.$val->link."\..*$#",Route::currentRouteName())) active @endif" href="{{ $val->link ? route('backend.'.$val->link.'.index') : 'javascript:void(0);' }}" link={{ $val->link }}>
        <span class="nav-main-link-name">{{ $val->name }}</span>
      </a>
    @endif
  </li>
@endforeach