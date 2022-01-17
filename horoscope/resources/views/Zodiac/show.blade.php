
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


<div class="container">


    <h1>{{$zodiac->name}} horoscope</h1>

<table class="table table-striped">

    <tr>
        <td><img alt='{{$zodiac->name}}' src="{{ $zodiac->image}}" width="150"></td>
        <td class="col-md-2">{{ $zodiac->dates}}</td>
        <td class="col-md-9">{{ $zodiac->description }}</td>

    </tr>

</table>
 <form action="{{route('zodiac.show', [$zodiac])}}" method="GET">
        @csrf
        <div class="col-md-3" style="display:inline-block;">
        <select class="col-md-6 form-control" name="year_select">

           @foreach ($years as $year)
           @if ($year->month==1 && $year->day==1))
           <option value="{{$year->year}}" @if(isset($year_select)) selected @endif>{{ $year->year}}</option>
           @endif
           @endforeach
        </select>

        </div>
        <button class="btn btn-primary" style="display:inline-block;" type="submit">Select</button>
    </form>
    <br>
    {{-- @if ((!isset($year_select)))  <h4> {{ $lastYear }} Your best month is {{$largest}}</h4>
        @elseif (isset($year_select)) <h4> {{$year_select}} Your best month is {{$largest}}</h4>
        @endif --}}
        @if ((!isset($year_select)))  <h4> <b>{{ $lastYear }}</b> @if (isset($bestMonth->month_name)) {{$zodiac->name}} best month is {{ $bestMonth->month_name }} @endif</h4>

        @elseif (isset($year_select)) <h4> <b>{{$year_select}}</b> @if (isset($bestMonth->month_name)) {{$zodiac->name}} best month is {{ $bestMonth->month_name }}  @endif </h4>

        @endif
        <h5>This year is best for {{$zodiacs->name}}</h5>
  <table class="table table-striped" >
    {{-- <table class="table table-striped" @if (!isset($request->year_select)) style="display:none" @endif> --}}

<tr><th>January</th>
 @foreach ($byDays as $byDay)
 @if ($byDay->month==1)
 <td><div class="col-md-10 day_color" style="background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
 </td>
 @endif
@endforeach
</tr>
<tr><th>February</th>
    @foreach ($byDays as $byDay)
    @if ($byDay->month==2)
    <td><div class="col-md-10 day_color" style=" background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
    </td>
    @endif
   @endforeach
   </tr>
   <tr><th>March</th>
    @foreach ($byDays as $byDay)
    @if ($byDay->month==3)
    <td><div class="col-md-10 day_color" style=" background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
    </td>
    @endif
   @endforeach
   </tr>
   <tr><th>April</th>
       @foreach ($byDays as $byDay)
       @if ($byDay->month==4)
       <td><div class="col-md-10 day_color" style=" background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
       </td>
       @endif
      @endforeach
      </tr>
      <tr><th>May</th>
        @foreach ($byDays as $byDay)
        @if ($byDay->month==5)
        <td><div class="col-md-10 day_color" style=" background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
        </td>
        @endif
       @endforeach
       </tr>
       <tr><th>June</th>
           @foreach ($byDays as $byDay)
           @if ($byDay->month==6)
           <td><div class="col-md-10 day_color" style=" background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
           </td>
           @endif
          @endforeach
          </tr>
          <tr><th>July</th>
            @foreach ($byDays as $byDay)
            @if ($byDay->month==7)
            <td><div class="col-md-10 day_color" style=" background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
            </td>
            @endif
           @endforeach
           </tr>
           <tr><th>August</th>
               @foreach ($byDays as $byDay)
               @if ($byDay->month==8)
               <td><div class="col-md-10 day_color" style="background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
               </td>
               @endif
              @endforeach
              </tr>
              <tr><th>September</th>
                @foreach ($byDays as $byDay)
                @if ($byDay->month==9)
                <td><div class="col-md-10 day_color" style="background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
                </td>
                @endif
               @endforeach
               </tr>
               <tr><th>October</th>
                   @foreach ($byDays as $byDay)
                   @if ($byDay->month==10)
                   <td><div class="col-md-10 day_color" style=" background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
                   </td>
                   @endif
                  @endforeach
                  </tr>
                  <tr><th>November</th>
                    @foreach ($byDays as $byDay)
                    @if ($byDay->month==11)
                    <td><div class="col-md-10 day_color" style=" background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
                    </td>
                    @endif
                   @endforeach
                   </tr>
                   <tr><th>December</th>
                       @foreach ($byDays as $byDay)
                       @if ($byDay->month==12)
                       <td><div class="col-md-10 day_color" style=" background-color:{{$byDay->DayScore->color_code}};"> {{ $byDay->day }} </div>
                       </td>
                       @endif
                      @endforeach
                      </tr>
</table>
<br>
<h4 style="display:inline-block;">Day scores:  </h4>
    @foreach ($newScores as $newScore)
    <div class="cube" style=" background-color:{{$newScore->color_code}};">{{ $newScore->score }}</div>
    <div class="text" style="display:inline-block;">  - {{ $newScore->description }} </div>
    @endforeach()
    <br><br>
<a class="btn btn-primary " href="{{route('zodiac.index')}}" >Back to list</a><br>
</div>
@endsection
