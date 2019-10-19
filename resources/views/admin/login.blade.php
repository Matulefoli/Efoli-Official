<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/themes/semi-dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/pages/authentication.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back-asset/assets/css/style.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <meta name="description" content="{{$meta_data->description}}"/>
    <meta name="author" content="{{$meta_data->author}}" />
    <meta http-equiv="expires" content="{{$meta_data->expires}}"/>
    <title>{{$pageTitle}}</title>

</head>
<body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

        <div class="app-content content">
            <div class="content-overlay"></div>
                <div class="content-wrapper">
                  <div class="content-header row">
                  </div>
                  <div class="content-body"><!-- login page start -->
                    <section id="auth-login" class="row flexbox-container">
                        <div class="col-xl-8 col-11">
                            <div class="card bg-authentication mb-0">
                                <div class="row m-0">
                                    <!-- left section-login -->
                                    <div class="col-md-6 col-12 px-0">
                                        <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                            
                                            <div class="card-content">
                                                <div class="card-body">
                                                    
                                                  
                                                    <form form action="{{route('admin.login.post')}}" method="POST">
                                                            @csrf
                                                        <div class="form-group mb-50">
                                                            <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                                                placeholder="Email address"></div>
                                                        <div class="form-group">
                                                            <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                                                placeholder="Password">
                                                        </div>
                                                        
                                                        <button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i
                                                                id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                                    </form>
                                                    <hr>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- right section image -->
                                    <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                        <div class="card-content">
                                            <img class="img-fluid" src="{{asset($site_setting->ws_logo)}}" alt="branding logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
          <!-- login page ends -->
          
                  </div>
                </div>
              </div>

</body>
</html>