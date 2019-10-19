<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
              <a class="navbar-brand" href="{{route('admin.dashboard')}}">
                
                <h2 class="brand-text mb-0">{{$site_setting->ws_title}}</h2>
              </a>
          </li>
            
          
          </ul>
        </div>
        <div class="shadow-bottom">
  
        </div>
        <div class="main-menu-content">
           
              @include('admin.sidebar')
        </div>
</div>