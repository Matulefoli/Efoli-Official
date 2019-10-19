@extends('admin.layout')
@section('content')
    <h2>Dialouge</h2>
    <table class="table table-bordered">
        <thead>
            <th>Title</th>
            <th>Dialouge</th>
            <th>Del
                
                </th>
        </thead>
        <tbody>
            @if($dialouges)
                @foreach($dialouges as $dia)
                    <tr>
                        <td>{{$dia->title}}</td>
                        <td>
                            @php
                            print_r($dia->text);
                           @endphp
                           
                        </td>
                        <td><a href="{{url('admin/dialouge_del/'.$dia->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <br>
    <hr>
    <h2>Images</h2>
    <table class="table table-bordered">
        <thead>
            <th>Title</th>
            <th>Image</th>
            <th>Del

            </th>
        </thead>
        <tbody>
            @if($images)
                @foreach($images as $img)
                    <tr>
                        <td>{{$img->title}}</td>
                        <td><img src="{{asset($img->image)}}" height="200px" width="200px"></td>
                        <td><a href="{{url('admin/gellary_del/'.$img->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection