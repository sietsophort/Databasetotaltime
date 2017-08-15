<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchText = Input::get('search');

        if($searchText)
            $data = DB::table('time')->where('name', 'LIKE', '%'.$searchText.'%')
                                     ->orwhere('status', 'LIKE', '%'.$searchText.'%')
                ->orwhere('date', 'LIKE', '%'.$searchText.'%')
                ->orwhere('totalhours', 'LIKE', '%'.$searchText.'%') ->paginate(10);


        else
            $data = DB::table('time') ->paginate(10);

        //  echo '<pre>'. print_r($data,true).'</pre>'; die();
        return view('home')->with('data',$data);
    }
//    show input form
    public function scedual()
    {
        return view('input-form');
    }

    public function reArrayFiles($myArray)
    {
        // echo sizeof($myArray);
        if (sizeof($myArray) > 1) {
            $file_ary = array();
            $file_count = count($myArray['name']);
            //      echo $file_count;die();
            $file_keys = array_keys($myArray);
            for ($i = 0; $i < $file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $myArray[$key][$i];
                }

            }

            for ($i = 0; $i < $file_count; $i++) {
                if ($file_ary[$i]['status'] == 'Part time') {
                    $totalhours = strtotime($file_ary[$i]['timeout']) - strtotime($file_ary[$i]['timein']);
                    $valueashours = ($totalhours) / 3600;
                    $valueofminute = (($valueashours * 60) % 60);
                    $converttimetoint = floor($valueashours);
                    $TotalTimeAsString = (string)$converttimetoint . "." . (string)$valueofminute;
                    $file_ary[$i]['totalhours'] = $TotalTimeAsString;
                } else if ($file_ary[$i]['status'] == "Full time") {
                    $totalhours = strtotime($file_ary[$i]['timeout']) - strtotime($file_ary[$i]['timein']);
                    $valueashours = ($totalhours) / 3600;
                    $fulltimeTotal = $valueashours - 1.5;
                    $TotalTimeAsString = floor($fulltimeTotal) . '.' . (($fulltimeTotal * 60) % 60);
                    $file_ary[$i]['totalhours'] = $TotalTimeAsString;
                }
//

                else if ($file_ary[$i]['status'] == "Permission") {
                    $totalhours = "0";
                    $file_ary[$i]['totalhours'] = $totalhours;
//                    echo "this in permission cast ".$file_ary[$i]['totalhours'];die();
                }
            }
            //          print_r($file_ary);die();
            return $file_ary;

        } else {
            return $myArray;
        }
    }

//    input to store in database
    public function store(Request $request)
    {
        $allData = Input::all();
        //    echo "<pre>".print_r($allData,true)."</pre><br/>";
        $dataAfterPrepare = HomeController::reArrayFiles($allData);
        //     echo '<pre>'. print_r($dataAfterPrepare,true).'</pre>'; die();
        $afterRemoveToken = [];
        foreach ($dataAfterPrepare as $item) {
            array_push($afterRemoveToken, array(
                'name' => $item['name'],
                'timein' => $item['timein'],
                'timeout' => $item['timeout'],
                'status' => $item['status'],
                'totalhours' => $item['totalhours'],
                'date' => $item['date'],
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString()
            ));
        }
        DB::table('time') ->insert($afterRemoveToken);
//           ->where('status','=','Part time');
        return redirect(route('home'));
    }

//    show id on url
    public function show($id)
    {
        $post = DB::table('time')->find($id);
        return view('update-page')->with('post', $post);
    }

    //update
    public function update()
    {
        $name = Input::get('name');
        $timein = Input::get('timein');
        $timeout = Input::get('timeout');
        $status = Input::get('status');
        $totalhours = input::get('total-hours');
        $date = Input::get('date');
        $updated = Carbon::now()->toDateString();
        $arrdata = [];
        array_push($arrdata, array(
            'name' => $name,
            'timein' => $timein,
            'timeout' => $timeout,
            'status' => $status,
           'totalhours' => $totalhours,
            'date' => $date,
            'updated_at' => $updated
        ));
        $hoursdata = HomeController::totalhoursUpdate($arrdata);
       // var_dump($dataAftergetTotal);
        DB::table('time')
            ->where('id', Input::get('id'))
            ->update(['name' => $name, 'timein' => $timein, 'timeout' =>$timeout, 'status' => $status, 'totalhours' =>$hoursdata, 'date' => $date, 'updated_at' => $updated]);
        return redirect(route('home'));
    }
//        delete table by name
    public function delete(Request $request)
    {
        $id = $request->input('id');
        DB::table('time')->delete($id);

        return redirect(route('home'));
    }
//        public function delete($name){
//            DB::table('time')->where('name',$name)->delete();
//            return redirect(route('home'));
//        }
//        public function deleteTable()
//        {
//            DB::table('time')->delete();
//            return view('input-form');
//        }

    public function totalhoursUpdate($arraydata)
    {
        // echo sizeof($myArray);
        if (sizeof($arraydata) > 0) {

            if ($arraydata[0]['status'] == 'Part time') {
                $totalhours = strtotime($arraydata[0]['timeout']) - strtotime($arraydata[0]['timein']);
                $valueashours = ($totalhours) / 3600;
                $valueofminute = (($valueashours * 60) % 60);
                $converttimetoint = floor($valueashours);
                $TotalTimeAsString = (string)$converttimetoint . "." . (string)$valueofminute;
                $arraydata[0]['totalhours'] = $TotalTimeAsString;
            }
            else if ($arraydata[0]['status'] == "Full time") {
                $totalhours = strtotime($arraydata[0]['timeout']) - strtotime($arraydata[0]['timein']);
                $valueashours = ($totalhours) / 3600;
                $fulltimeTotal = $valueashours - 1.5;
                $TotalTimeAsString = floor($fulltimeTotal) . '.' . (($fulltimeTotal * 60) % 60);
                $arraydata[0]['totalhours'] = $TotalTimeAsString;
            }
            else if ($arraydata[0]['status'] == "Permission") {
                $totalhours = "0";
                $arraydata[0]['totalhours'] = $totalhours;
            }
//          echo"<pre>".     print_r($arraydata,true)." </pre>";die();
            return $arraydata[0]['totalhours'];

        }

    }



    }
