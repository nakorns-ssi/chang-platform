<?php 
use Illuminate\Support\Str;
use App\Models\chang_prompt\Data_meta;
use App\helper\util;  

$keyword = '';
if(isset($_GET['q'])){
  $keyword = $_GET['q'];
}
$model_tag = Data_meta::select('meta_value' 
, DB::raw('count(meta_value) as total')  )
 ->where('meta_value','!=','-') 
->groupBy('meta_value' )->orderBy('meta_value')->get(); 
?>
<form action="{{url('search/')}}">
  <input type="text" class="px-2" list="datalistOptions" name="q" placeholder="ระบุคำค้นหา..." value="{{$keyword}}" required  >
  <button type="submit" class=" "><i class="bi bi-search"></i>ค้นหา</button>
</form>

<datalist id="datalistOptions">
  @foreach ($model_tag as $val )
  <option value="{{$val->meta_value}}">
  @endforeach 
</datalist>