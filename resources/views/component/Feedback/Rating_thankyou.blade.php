
@extends('layouts.main_layout')
@section('content') 

 
<main class="content">  
<div class="container-fluid p-0"> 
  <div class="vh-100 d-flex justify-content-center align-items-center">
    <div>
        <div class="mb-4 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
        </div>
        <div class="text-center">
            <h3>ขอบคุณ !</h3>
            <p> สำหรับการสละเวลา </p>
            <div class="m-2 text-center"> 
              <p>
               <a class="link-offset-3 link-secondary link-underline-secondary link-underline-opacity-100" href="{{url('/')}}"
               style=" font-size: 1.3rem;" >
               <i class="bi bi-house-fill"></i> กลับหน้าหลัก</a>
               </p> 
           </div>
        </div>
    </div>
        
</div>
</div>
</main>
  
@endsection
