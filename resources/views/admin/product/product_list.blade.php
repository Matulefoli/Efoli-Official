@extends('admin.layout')
@section('content')
  
<section class="kb-question" id="point">
    @if($products)    
    <div class="row">
      
        <div class="kb-overlay"></div>
        <div class="col-md-12">
       
        @foreach($products as $product)    
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="title mb-2">
                            <h2 class="kb-title">{{$product->name}}</h2>
                            <p>
                                @php
                                    $time=Carbon\Carbon::parse($product->created_at);
                                    $images=App\ImageGallery::where('model_id',$product->id)->where('model_type','App\Product')->get();
                                @endphp
                                   Created : {{$time->format('d M Y')}}
                            </p>
                        </div>
                        <p>
                           {{$product->description}}
                        </p>
                        <div id="kb-carousel" class="carousel slide my-2" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#kb-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#kb-carousel" data-slide-to="1"></li>
                                <li data-target="#kb-carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @if($images)
                            
                                @for($i=0; $i<sizeof($images) ;$i++)
                                <div class="carousel-item @if($i==0)active @endif">
                                    <img class="img-fluid" src="{{$images[$i]->image}}"
                                        alt="banner">
                                </div>
                               
                                @endfor
                                @endif
                                  
                            </div>
                           
                        </div>
                        
                        <p>
                            <a href="{{$product->link}}" target="blank">
                                <h3>{{$product->link}}</h3>
                            </a>
                        </p>
                        <h5 class="mb-1">Action:</h5>
                        <ul style="list-style:none">
                            <li>
                                <a href="{{route('edit_product',$product->id)}}" class="btn btn-info">Edit</a>
                            </li>
                            <li>
                                <form action="{{route('delete_product')}}" id="dltproduct" method="POST">
                                    @csrf
                                    <input type="hidden" name="delete_product_id" value="{{$product->id}}">
                                    <button onclick="event.preventDefault();showbox();" class="btn btn-danger">Delete</button>
                                </form>
                               
                            </li>
                            
                        </ul>
                        
                        
                    </div>
                </div>
            </div>
            @endforeach
          

        </div>
        {{ $products->links() }}
   
    @endif
</section>

@endsection
@section('script')
<script>
function showbox(){
   var c=confirm('Confirm Delete ?');
    if(c===true){
       $('#dltproduct').submit();
    }
    
}
</script>
@endsection