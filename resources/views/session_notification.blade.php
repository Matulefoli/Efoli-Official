<div>
    @php
        $get_session_message=Session::get('message');
    @endphp
    @if($get_session_message)
        <div class="card">
            {{$get_session_message}}
        </div>
    @endif
</div>