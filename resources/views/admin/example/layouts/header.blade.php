@section('header')
<div class="content-header">
  {{-- Codebase.layout('header_loader_on') Codebase.layout('header_loader_off') --}}
  <div id="page-header-loader" class="overlay-header bg-primary">
    <div class="content-header">
      <div class="w-100 text-center">
        <i class="far fa-sun fa-spin text-white"></i>
      </div>
    </div>
  </div>

  <div class="space-x-1">
    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
      <i class="fa fa-fw fa-bars"></i>
    </button>
  </div>

  <div class="space-x-1">
    <div class="dropdown d-inline-block">
      <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user d-sm-none"></i>
        <span class="d-none d-sm-inline-block fw-semibold"></span>
        <i class="fa fa-angle-down opacity-50 ms-1"></i>
      </button>
      <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
        <div class="px-2 py-3 bg-body-light rounded-top">
          <h5 class="h6 text-center mb-0">
            
          </h5>
        </div>
        <div class="p-2">
          {{-- <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="be_pages_generic_profile.html">
            <span>{{ __('profile') }}</span>
            <i class="fa fa-fw fa-user opacity-25"></i>
          </a>
          <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
            <span>{{ __('message') }}</span>
            <i class="fa fa-fw fa-envelope-open opacity-25"></i>
          </a>
          <div class="dropdown-divider"></div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection