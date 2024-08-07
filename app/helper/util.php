<?php
 
namespace App\helper;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str;  
class util
{
    public static $dayTH = [
        'Sun' => 'อาทิตย์','Mon' => 'จันทร์', 'Tue' =>'อังคาร', 'Wed' =>'พุธ', 'Thu' =>'พฤหัสบดี','Fri' => 'ศุกร์','Sat' => 'เสาร์'
     ];
     public static $monthTH = [null, 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
     public static $monthTH_brev = [null, 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
 
    public function __construct()
    {
        
    }

    public static function thai_datetime($time)
    { // 19 ธันวาคม 2556 เวลา 10:10:43
        // print_r(date("n", $time));die();
       $thai_date_return = '';
         
      //  $thai_date_return = self::$dayTH[date('D',$time)].'ที่ ';
        $thai_date_return .= date("j", $time);
        $thai_date_return .= " " . self::$monthTH[date("n", $time)];
        $thai_date_return .= " " . substr((date("Y", $time)+543),2) ;
      //  $thai_date_return .= " ," .  (date("H:i", $time)) ;
        return $thai_date_return;
    }
    public static function   humanTiming ($time)
    {

        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }

    }

    public static function   humanDate ($date_input)
    {  
        $strDate1= date('y-m-d');
        $strDate2=  $date_input  ; 
        $diff= (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );
        switch($diff ) {
            case '0';
                return 'วันนี้ '   ;
                break; 
            case '1';
                return 'พรุ่งนี้ ';
                break; 
        }
       // return  'วัน'.self::$dayTH[date('D',strtotime($strDate1))] ;
        return  ''  ;
    }

    public static function gen_key($id)
    {  
        $number = $id;
        $v_token =  '';
        for ($i = 0; $i < strlen($number); $i++) {
            $pos = substr($number, $i, 1);
            $v_token .= chr($pos + 65);
        }
        $key =   date('y').$id.str_pad($v_token , 4 , chr(mt_rand(97,122)).mt_rand(0,9).chr(mt_rand(65,90))) ;
        return  $key;
    }
    public static function gen_tacking($code)
    {
        $running = substr($code,-4);
        $sum_head = substr($running,0,1);//first digit
        $sum_foot = substr($running,-1);//last digit
        $check_sum = substr($sum_head+$sum_foot, -1) ;//get last digit from check_sum
        $code = substr(date('y'),-1).substr(date('m'),-2).$running.$check_sum;
        return $code ; 
    } 

    public static function shipment_tag($status)
    {
        $lang = [
            'booking' =>'รอติดต่อ' ,
            'wait_confirm' => 'รอตกลงราคา' ,
            'wait_payment' => 'รอชำระเงิน' ,
            'wait_complete' =>'รอปล่อยสินค้า' ,
            'complete' =>'งานสำเร็จ' ,
            'cancel' =>'งานยกเลิก' ,
        ];
        if(isset($lang[$status])){
            return $lang[$status];
        }else{
            return $lang;
        }
       
    }
 

    public static function distance($lat1, $lon1, $lat2, $lon2, $unit = 'K') {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
      
          if ($unit == "K") {
            return ($miles * 1.609344);
          } else if ($unit == "N") {
            return ($miles * 0.8684);
          } else {
            return $miles;
          }
        }
      }
}
