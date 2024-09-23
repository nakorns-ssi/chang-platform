
<script type="text/javascript"
src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript"
src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<link rel="stylesheet"
href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript"
src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>   

    <label for="search_district" class="form-label fs-6 fw-semibold"><i class="bi bi-geo-alt-fill"></i> ระบุพื้นที่รับงาน/ปฎิบัติงาน
    </label>
      <input type="text" class="form-control" id="search_district"
            placeholder=" ระบุเช่น ชุมพร , หลังสวน , หาดใหญ่"  />
        <div id="district_list" class="  px-1 text-start  mt-3 ">
            @if($model->location_district)
            <?php   $dataJson = json_encode([
                'location_province'=>$model->location_province ,
                'location_amphoe'=>$model->location_amphoe ,
                'location_district'=>$model->location_district ,
                'location_zipcode'=>$model->location_zipcode ,
            ]); ?>
            <div>
            <span class='badge fs-6 my-1  text-bg-secondary'>{{$model->location_province}}</span> 
            <span class='badge fs-6 my-1  text-bg-secondary'>{{$model->location_amphoe}}</span> 
            <span class='badge fs-6 my-1  text-bg-secondary'>{{$model->location_district}}</span> 
            <span class=" ms-auto"> 
                <i onClick="deleteLocation(this)" class="fas fa-trash-alt text-danger"></i>
                <input type="hidden" name="working_area[]" value={{$dataJson}} required>
            </span>
            </div >
            @endif
        </div>
       
 

<script>
    let district_list = document.getElementById("district_list");
    $.Thailand({
               $district: $('.district'), // input ของตำบล
               //  $amphoe: $('.amphoe'), // input ของอำเภอ
               //  $province: $('.province'), // input ของจังหวัด
               //  $zipcode: $('#postcode'), // input ของรหัสไปรษณีย์
               $search: $('#search_district'),
               onDataFill: function(data) {
                   console.log(data) 
                   var html = '<div>'+
                        `<span class="badge fs-6 my-1 text-bg-secondary">${data.province}</span>
                        <span class="badge fs-6 my-1 text-bg-secondary">${data.amphoe}</span>
                        <span class="badge fs-6 my-1 text-bg-secondary">${data.district}</span>
                        `    
                      +`<span class="options ms-auto"> 
                          <i onClick="deleteLocation(this)" class="fas fa-trash-alt text-danger"></i>
                          <input type="hidden" name="working_area[district][]" value='${JSON.stringify(data)}'>
                      </span></div >`
                     // console.log(html)
                   district_list.innerHTML =html
                    
               }
   });
   let deleteLocation = (e) => {
            console.log(e)
            e.parentElement.parentElement.remove();
            // e.parentElement.remove();
            //console.log(e)
        };
   </script>