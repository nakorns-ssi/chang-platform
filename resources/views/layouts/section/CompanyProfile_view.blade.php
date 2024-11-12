<?php
use App\helper\util;
use App\helper\helper_lang;
use App\Models\chang_prompt\Posts;
use App\Models\chang_prompt\Data_meta;
use App\Models\Account;
if (!isset($mode)) {
    $mode = null;
}
$model = null;
$model = Account::where([  'id' => $account_id ])->first();
  
?>
  @if ($model->company_tax_id)
    <div class="container "> 
        <div class="row mt-2 g-2"> 
            <div class="col-sm-12">
                <div class=" card px-4 p-2 bg-white border rounded-4">
                    <div class="row justifu-content-start align-items-center">
                        <div class="col-12  ">  
                                <div class="h4 text-nowrap py-2 ">
                                    ข้อมูลนิติบุคคล
                                </div> 
                                <div class="row justifu-content-center"> 
                                        <div class=" col-sm-10   ">
                                            <div
                                                class="row   px-3    d-flex aligh-items-center justify-content-between bg-white">
                                                <div class="col-auto    "> 
                                                    <ul class="list-inline" style="list-style-type:circle">
                                                        <li class="list-inline"><span class="fw-light">เลขนิติบุคคล:</span> 
                                                           <a href="https://data.creden.co/company/general/{{ $model->company_tax_id }}" target="_blank">
                                                                <span class="border-bottom  ">{{ $model->company_tax_id }}</span>
                                                            </a>  
                                                        </li>
                                                        <li class="list-inline"><span class="fw-light">ชื่อนิติบุคคล:</span> {{ $model->company_name }}</li>
                                                        <li class="list-inline"><span class="fw-light">ที่อยู่:</span> {{ $model->company_address1 }}</li>
                                                      </ul>
                                                   
                                                </div>
                                                 
                                            </div>
                                        </div> 
    
                                </div>
                        </div>
                    </div>
                </div>
            </div>

          
        </div> 
    </div>
 @endif

<style>
     
</style>
