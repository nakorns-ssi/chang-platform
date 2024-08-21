<div class="mb-3">
    <label for="search_district" class="form-label"><i class="bi bi-geo-alt-fill"></i> ระบุพื้นที่รับงาน/ปฎิบัติงาน
    </label>
      <input type="text" class="form-control" id="search_district"
            placeholder=" ระบุเช่น ชุมพร , หลังสวน , หาดใหญ่" />
        <div id="district_list" class="  px-1 text-start  mt-3 "></div>
        @if($model->location_district)
            <div>
            <span class='badge fs-6 my-1  text-bg-secondary'>{{$model->location_district}}</span> 
            <span class="options ms-auto"> 
                <i onClick="deleteItem(this)" class="fas fa-trash-alt text-danger"></i>
                <input type="hidden" name="working_area[district][]" value={{$model->location_district}}>
            </span>
            </div >
        @endif
</div>