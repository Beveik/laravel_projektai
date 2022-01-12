<?php

namespace App\Http\Controllers;

use App\Models\ByDay;
use App\Models\Zodiac;
use App\Models\Average;
use App\Http\Requests\StoreByDayRequest;
use App\Http\Requests\UpdateByDayRequest;
use Illuminate\Http\Request;

class ByDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ByDay $byDay)
    {
        $zodiacs=Zodiac::all();
        $byDays=ByDay::all();
        return view("byday.index", ["zodiacs"=>$zodiacs, "byDay"=>$byDay, "byDays"=>$byDays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $byDays=ByDay::all();
        $zodiacs = Zodiac::all();

        return view("byday.create", ["byDays"=>$byDays, "zodiacs"=>$zodiacs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewScoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ByDay $byDay, Zodiac $zodiac, Average $average)
    {
    // public function store(StoreByDayRequest $request)
    // {
        $zodiacs = Zodiac::all();
        $year = $request->year_select;
        $sign = $request->sign_select;


  // User does not exist

if ($sign=='all'){
    $sign_count=$zodiacs->count();
} else if ( $sign!='all'){
    $sign_count=1;
}


        $validateVar = $request->validate([


            'year_select' => 'required|numeric|integer|digits:4',// a-z A-Z 0-9
            '$month' => 'numeric|integer',
            '$day' => 'numeric|integer',
            '$sign' => 'numeric|integer',
            '$score_id' => 'numeric|integer',


    ]);


for($i=1; $i<=$sign_count; $i++){
    if ($sign_count!=1){
        $sign=$i;
    }
    $bydays = ByDay::where('year', '=', $year)->where('zodiac_id', '=', $sign)->first();
    if ($bydays === null) {
        $average_array=array();
for ($month=1; $month<=12; $month++ ){

    if ($month==1 || $month==3 || $month==5 || $month==7 || $month==8 || $month==10 || $month==12){
        $days = 31;
    } else if ($month==4 || $month==6 || $month==9 || $month==11) {
        $days = 30;
    } else if ($month==2){
        if ($year % 4 != 0){
            $days = 28;
        } else if ($year % 4 == 0) {
                $days = 29;
            }
    }

    for($day=1; $day<=$days; $day++){
        $score_id = rand(1,10);
        $byDay= new ByDay;
            $byDay->year = $request->year_select;
            $byDay->day = $day;
            $byDay->month = $month;
            $byDay->score_id = $score_id;
            $byDay->zodiac_id = $sign;

            $byDay->save();
}
// }
             $sum = ByDay::where('year', '=', $year)->where('zodiac_id', '=', $sign)->where('month', '=', $month)->sum('score_id');
             switch ($month) {
                case "1":
                //   $average1=$sum/$days;
                $average1=$sum/31;
                //   array_push($average_array, $average1);
                $average_array[]=$average1;
                  break;
                case "2":
                    $average2=$sum/$days;
                    $average_array[]=$average2;
                  break;
                case "3":
                    $average3=$sum/$days;
                    $average_array[]=$average3;
                  break;
                  case "4":
                    $average4=$sum/$days;
                    $average_array[]=$average4;
                    break;
                  case "5":
                      $average5=$sum/$days;
                      $average_array[]=$average5;
                    break;
                  case "6":
                      $average6=$sum/$days;
                      $average_array[]=$average6;
                    break;
                    case "7":
                        $average7=$sum/$days;
                        $average_array[]=$average7;
                        break;
                      case "8":
                          $average8=$sum/$days;
                          $average_array[]=$average8;
                        break;
                      case "9":
                          $average9=$sum/$days;
                          $average_array[]=$average9;
                        break;
                        case "10":
                            $average10=$sum/$days;
                            $average_array[]=$average10;
                            break;
                          case "11":
                              $average11=$sum/$days;
                              $average_array[]=$average11;
                            break;
                          case "12":
                              $average12=$sum/$days;
                              $average_array[]=$average12;
                            break;
                default:
                $average0=null;
                $average_array[]=$average0;

              }
}

$largest = $average_array[0];
$s = count($average_array);
for ($j = 0; $j < $s; $j++) {
    if ($average_array[$j] > $largest){
         $largest = $average_array[$j];
         $largest_key = array_search($largest, $average_array);
         $largest_key++;
}
    }
    switch ($largest_key) {
        case "1":
            $month_name='January';
          break;
        case "2":
            $month_name='February';
          break;
        case "3":
            $month_name='March';
          break;
          case "4":
            $month_name='April';
            break;
          case "5":
            $month_name='May';
            break;
          case "6":
            $month_name='June';
            break;
            case "7":
                $month_name='July';
                break;
              case "8":
                $month_name='August';
                break;
              case "9":
                $month_name='September';
                break;
                case "10":
                    $month_name='October';
                    break;
                  case "11":
                    $month_name='November';
                    break;
                  case "12":
                    $month_name='December';
                    break;
        default:
        $month_name='null';

      }
        $average= new Average;
        $average->year = $request->year_select;
        $average->month_number = $largest_key;
        $average->month_name = $month_name;
        $average->largest_average = $largest;
        $average->zodiac_id = $sign;


        $average->save();

    } else {
        if ($sign_count!=1){
            continue;
        } else {

        return redirect()->route("byday.index")->with('danger_message','Data already exist.');
}
    }

}
            return redirect()->route("byday.index")->with('success_message','New data is added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ByDay  $byDay
     * @return \Illuminate\Http\Response
     */
    public function show(ByDay $byDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ByDay  $byDay
     * @return \Illuminate\Http\Response
     */
    public function edit(ByDay $byDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateByDayRequest  $request
     * @param  \App\Models\ByDay  $byDay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateByDayRequest $request, ByDay $byDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ByDay  $byDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(ByDay $byDay)
    {
        //
    }
}
