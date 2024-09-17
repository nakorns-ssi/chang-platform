<?php
$keyword = '';
if(isset($_GET['q'])){
  $keyword = $_GET['q'];
}
?>
<form action="{{url('search/')}}">
  <input type="text" class="px-2" name="q" placeholder="ระบุคำค้นหา..." value="{{$keyword}}"  >
  <button type="submit" class=" "><i class="bi bi-search"></i>ค้นหา</button>
</form>