<?php

namespace App\Http\Controllers;

use App\Queues;
use Illuminate\Http\Request;
use Exception;
use DateTime;
use DateInterval;
use DB;

class QueueController extends Controller
{

    // function queue_check( $request) {
    //     $resDateBegin = $request
    //     $resDateEnd = 
    // }

    function reserveCab(Request $request)
    {
        $firstName      =   $request->input('firstName'); 
        $lastName       =   $request->input('lastName');  
        $libCardNumber  =   $request->input('libCardNumber'); 
        $resDateBegin   =   $request->input('resDateBegin'); 
        $duration       =   $request->input('duration');
        
        $resDateEnd = new DateTime($resDateBegin);
        $resDateEnd->add(new DateInterval('PT0'.$duration.'H')); //считаем конечное время

        $seatsQuantity  =   $request->input('seatsQuantity');

        $data = array('firstName'       =>  $firstName,
                      'lastName'        =>  $lastName,
                      'libCardNumber'   =>  $libCardNumber,
                      'resDateBegin'    =>  $resDateBegin,
                      'resDateEnd'      =>  $resDateEnd,
                      'duration'        =>  $duration,
                      'seatsQuantity'   =>  $seatsQuantity
                    );        
        
        //Дописать триггер для проверки мест
        try 
        {
            DB::table('Queues')->insert($data);
        } 
        catch(Exception $ex) 
        {
            //return parent::render($request, $ex)->with('msg', 'Sorry something went worng. Please try again.');
            abort(500 ,'В указанный промежуток времени нет свободных мест!');
            //echo $ex->getMessage();
        }

        //$handler->trigger_error(""[,int $erro])

        echo "Вы успешно зарегистрировались!";

        //return back();
    }
}
