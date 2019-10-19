@extends('admin.layout')
@section('content')
   
       
        <form action="{{route('change_settings')}}" id="form-in" method="POST" enctype="multipart/form-data">
            @csrf
            <ul  style="list-style:none">
                <ul ondblclick="$('#title').show();">
                    <h4 for="">Title</h4>
                    <h6 >{{$site_setting->ws_title}}</h6>
                    <input type="text" id="title" name="ws_title" value="{{$site_setting->ws_title}}" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#subtitle').show();">
                    <h4 for="">Sub title</h4>
                    <h6 > {{$site_setting->ws_sub_title}}</h6>
                    <input type="text" id="subtitle" name="ws_sub_title" value="{{$site_setting->ws_sub_title}}" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#location').show();">
                        <h4 for="">Location</h4>
                    <h6 >{{$site_setting->ws_location}}</h6>
                    <input type="text" id="location" name="ws_location" value="{{$site_setting->ws_location}}" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#fax').show();">
                    <h4 for="">Fax</h4>
                    <h6 > {{$site_setting->ws_fax}}</h6>
                    <input type="text" id="fax" name="ws_fax" value="{{$site_setting->ws_fax}}" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                  
                </ul>
                <hr>
                <ul ondblclick="$('#phone').show();">
                        <h4 for="">Phone</h4>
                        <h6> {{$site_setting->ws_phone}}</h6>
                        <input type="text" id="phone" name="ws_phone" value="{{$site_setting->ws_phone}}" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#email').show();">
                    <h4 for="">Email</h4>
                    {{$site_setting->ws_email}}
                    <input type="text" id="email" name="ws_email" value="{{$site_setting->ws_email}}" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#copy').show();">
                    <h4 for="">Copy Right</h4>
                    {{$site_setting->ws_copy_right	}}
                    <input type="text" id="copy" name="ws_copy_right" value="{{$site_setting->ws_copy_right}}" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#video').show();">
                    <h4 for="">Video</h4>
                    <video src="{{$site_setting->ws_video}}">Video</video>
                    <input type="file" name="ws_video" id="video"  style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#ws_header_icon').show();">
                    <h4 for="">Header Icon</h4>
                    <img src="{{asset($site_setting->ws_header_icon)}}" alt="" width="100px">
                   
                    <input type="file" id="ws_header_icon"  name="ws_header_icon" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#ws_footer_icon').show();">
                    <h4 for="">Footer Icon</h4>
                    <img src="{{asset($site_setting->ws_footer_icon)}}" alt="" width="100px">
                  
                    <input type="file" name="ws_footer_icon" id="ws_footer_icon"  style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#ws_footer_text').show();">
                        <h4 for="">Footer Text</h4>
                        @php
                            print_r($site_setting->ws_footer_text);
                        @endphp
                        <textarea  name="ws_footer_text" class="form-control"  id="ws_footer_text" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                            @php
                                print_r($site_setting->ws_footer_text);
                            @endphp
                        </textarea> 
                </ul>
                <hr>
                <ul ondblclick="$('#ws_logo').show();">
                    <h4 for="">Logo</h4>
                    <img src="{{asset($site_setting->ws_logo)}}" alt="" width="100px">
                    <input type="file" name="ws_logo"  id="ws_logo" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                </ul>
                <hr>
                <ul ondblclick="$('#ws_about_us').show();">
                    <h4 for="">About us</h4>
                        @php
                            print_r($site_setting->ws_about_us);
                        @endphp
                    <textarea  name="ws_about_us" class="form-control"  id="ws_about_us" style="display:none" onkeydown="if(event.keyCode==13){   $('#form-in').submit();}">
                        @php
                            print_r($site_setting->ws_about_us);
                        @endphp
                    </textarea>  
                  
                </ul>
                <hr>
                <ul >
                    <h4 for="">Updated at</h4>
                    <h6>{{$site_setting->updated_at}}</h6>
                    
                </ul>
                <hr>
            </ul>
        </form>

       
@endsection
