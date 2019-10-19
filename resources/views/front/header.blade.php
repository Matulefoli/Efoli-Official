<header class="header_area">
        <nav class="navbar navbar-expand-lg menu_one">
            <div class="container">
                
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset($site_setting->ws_header_icon)}}" style="border-radius:5%;" width="100px" height="100px" alt="logo"></a>
                
                <div class="text-info">
                    <a href="{{url('/')}}">
                            <h2>{{$site_setting->ws_title}}</h2>
                            <sub><h6>{{$site_setting->ws_sub_title}}</h6></sub>
                    </a>
                       
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto menu">
                        <li class="nav-item dropdown submenu mega_menu mega_menu_two active">
                            <a class="nav-link dropdown-toggle" href="{{url('/')}}" role="button" >
                                Home
                            </a>
                            
                        </li>
                        <li class="dropdown submenu nav-item"><a title="Pages" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Products</a>
                            <ul role="menu" class=" dropdown-menu">
                                @if($products)
                                @foreach($products as $product)
                                <li class="nav-item"><a title="About" class="nav-link" href="{{$product->link}}">{{$product->name}}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown submenu mega_menu">
                            <a class="nav-link dropdown-toggle" href="{{route('contact_us')}}" role="button" >
                                Contact Us
                            </a>
                           
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" >
                                Career
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </a>
                           
                        </li>
                        <li class="nav-item dropdown submenu mega_menu">
                            <a class="nav-link dropdown-toggle" href="{{route('front.team')}}" role="button" >
                                Team
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown submenu mega_menu">
                            <a class="nav-link dropdown-toggle" href="{{url('about_us')}}" role="button" >
                                About Us
                            </a>
                                
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>
