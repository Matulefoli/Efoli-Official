@extends('admin.layout')
@section('content')
   <form action="{{route('store_meta')}}" method="POST">
       @csrf
       <div class="form-group">
           <label for="">Author</label>
           <input type="text" name="author" value="{{$meta_data->author}}" class="form-control">
       </div>
       <div class="form-group">
            <label for="">Copyright</label>
            <input type="text" name="copyright" value="{{$meta_data->copyright}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10">
                {{$meta_data->description}}
            </textarea>
        </div>
        <div class="form-group">
                <label for="">Expires</label>
                <input type="text" name="expires" value="{{$meta_data->expires}}" class="form-control">
        </div>
        <div class="form-group">
                <label for="">cache-control</label>
                <input type="text" value="{{$meta_data->cache_control}}" name="cache" class="form-control">
        </div>
        <div>
            <input type="submit" class="btn btn-success">
        </div>
   </form>
       
@endsection