@extends('admin.layout')
@section('content')
<section id="info-tabs">
    <div class="row">
        @if($teams )
        @foreach ($teams as $team)
            <div class="col-12 card">
                <h5>Team:</h5>
                <h3 class="card-header">{{$team->category_name}}</h3>
            </div>
            <div class="card-body">
              
                    @php
                        $members=App\TeamMemberJoinTable::where('team',$team->id)->get();
                       
                    @endphp
                    @if($members)
                        <ul>
                            @foreach ($members as $member)
                                @php
                                    $person=App\TeamMember::find($member->member);
                                @endphp
                                <li>Name: <b>{{$person->name}}</b></li>
                                <ul class="card">
                                <li>Designation: <b>
                                        @php
                                            print_r($person->designation);
                                        @endphp
                                        </b>
                                   
                                </li>
                                <li>
                                    Description: 
                                    <b>
                                    @php
                                        print_r($person->description);
                                    @endphp
                                    </b>
                                </li>
                                <li>Email: 
                                    <b>{{$person->email}}</b></li>
                                <li>Phone:<b> {{$person->phone}}</b></li>
                                <li>Hobby:<b> {{$person->hobby}}</b></li>
                                <li>Education:<b> {{$person->education}}</b></li>
                            </ul>
                            @endforeach
                        </ul>
                    @endif

                
            </div>
        @endforeach
        @endif
    </div>
</section>
@endsection