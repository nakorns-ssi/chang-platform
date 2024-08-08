@extends('layouts.inner_layout')
@section('title', "เข้าสู่ระบบ")
@section('description', "")
@section('keywords', "")
@section('content')  
    <main class="content" style="margin-top:100px">
 
        <div class="container-md mt-4 " style="max-width: 35rem;"> 
            <div class="row g-2 border bg-light rounded justify-content-center">
              
                <div class="col-12 col-md-12  text-center p-2 ">
                    <h2>เข้าสู่ระบบ</h2>  
                    <img class="  img-fluid " src="{{ asset('chang_prompt/img/chang_prompt_logo.svg') }}"
                    alt="{{env('APP_NAME')}} โลโก้" style="width: 7rem" >
                    
                </div>
                 
             
                <div class="col-12 col-md-12 ">
                    <div class=" m-2 d-flex justify-content-center  text-center ">
                         <button type='button' id="liffLoginButton" class='btn d-flex align-items-center' style='background:#06C755;color:#fff'>
                            <i class='fab fa-line fs-3 mx-2 ' style=' '></i>   Log in  with Line
                        </button> 
                    </div>
                </div> 
            </div>

            <div class="m-2 text-center"> 
               <p>
                <a class="link-offset-3 link-secondary link-underline-secondary link-underline-opacity-100" href="{{url('/')}}"
                style=" font-size: 1.3rem;" >
                <i class="bi bi-house-fill"></i> หน้าหลัก</a>
                </p> 
            </div>
    </main>
    <?php
    if(env('APP_ENV')=='production'){
        $LINE_LIFF_ID =env('LINE_LIFF_ID');
    }else{
        $LINE_LIFF_ID =env('DEV_LINE_LIFF_ID');
    } 
?>
<form action="{{route('auth.callback')}}" method="post" name="frm_n"  >
    @csrf
    <input type="hidden" id="liffId" name="liffId" value="{{$LINE_LIFF_ID}}"  > 
    <input type="hidden" id="sso"  name="sso" > 
    <input type="hidden" id="email"  name="email" > 
    <input type="hidden" id="id"  name="id" > 
    <input type="hidden" id="name"  name="name" > 
    <input type="hidden" id="picture"   name="picture"> 
    <input type="hidden" id="page"   name="page" value="{{session()->get('page')}}"> 
    <input type="hidden" id="role"   name="role" value="{{session()->get('role')}}"> 
</form>
<script charset="utf-8" src="https://static.line-scdn.net/liff/edge/versions/2.8.0/sdk.js"></script>
 <script>
      
     $(document).ready(function() {
       $("#liffLoginButton").click(function() {
        liff.login()
        }) 
        let liffId_input =  $("#liffId").val()

        liff.init({ liffId: liffId_input }, () => {
            if($('#state_code').val() == 'error'){
            localStorage.clear()
        }
        if (liff.isLoggedIn()) {
            const idToken = liff.getDecodedIDToken();
            console.log(idToken)
            if(idToken.sub){
                $('#sso').val('line')
                $('#email').val(idToken.email)
                $('#id').val(idToken.sub)
                $('#name').val(idToken.name)
                $('#picture').val(idToken.picture) 
                  frm_n.submit()
               // window.location.href = '/auth/callback?sso=line&email='+idToken.email+'&id='+idToken.sub+'&name='+idToken.name+'&picture='+idToken.picture;
            } 
        }else{
            console.log('no login' + liff)
            //liff.login() 
        }
     },(err)  =>{
         console.error(err.code, error.message)
        } ); 
         
    })//on ready 
</script>
    <style>
       
    </style>
    <script>
       
    </script>
@endsection
