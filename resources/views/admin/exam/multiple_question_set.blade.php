@foreach($paper as $paper)
    <div class="well">
        <h5>{{$paper->question}} <i>(marks: {{$paper->marks}})</i></h5>
        <h6 class="offset-1">{{$paper->A}}</h6>
        <h6 class="offset-1">{{$paper->B}}</h6>
        <h6 class="offset-1">{{$paper->C}}</h6>
        <h6 class="offset-1">{{$paper->D}}</h6>
        <h6 class="offset-2"><b>Answer: </b> {{$paper->ans_file}}</h6>
    </div>
@endforeach