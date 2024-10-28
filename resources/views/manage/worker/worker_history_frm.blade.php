  <?php
  $actionPath = '/manage/worker/worker_history/save';
  ?>
  <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
      @csrf
      <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 ">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3  ">
                        <label for="start_date" class="form-label fs-6 fw-semibold"><i class="bi bi-calendar"></i>
                            วันที่ เริ่มต้น</label>
                        <input type="text" id="start_date" name="model[start_date]" value="{{ $model->start_date }}"
                            class="form-control">
                    </div>
                </div>
                  <div class="col-6">
                    <div class="mb-3  ">
                        <label for="end_date" class="form-label fs-6 fw-semibold"><i class="bi bi-calendar"></i>
                          วันที่ สิ้นสุด</label>
                        <input type="text" id="end_date" name="model[end_date]" value="{{ $model->end_date }}"
                            class="form-control">
                    </div>
                  </div>
            </div> 
              <div class="mb-3  ">
                  <label for="posts_content" class="form-label fs-6 fw-semibold"><i class="bi bi-pencil"></i>
                      รายละเอียดประวัติ
                      * </label>
                  <textarea class="form-control" id="posts_content" name="model[posts_content]" rows="6" required>{{ $model->posts_content }}</textarea>
              </div>

              <div class="mb-3 text-center">
                  <button type="submit"  class="btn btn-primary"> บันทึก</button>
              </div>
          </div>
      </div>
      <input type="hidden" id="id"  name="model[id]" value="{{$model->id}}">
  </form> 

  <style> 
  </style>
  <script>
      $(document).ready(function() {
          console.log('his load ready')
          //$('#ui-datepicker-div').css('clip', 'auto');
          $("#start_date").datepicker({
              dateFormat: 'yy-mm-dd',
              changeMonth: true,
              changeYear: true,
              onSelect: function(dateText) {
                  sD = new Date(dateText);
                  console.log('start date :' + dateText)
                  $("input#end_date").datepicker('option', 'minDate', sD);
              }
          })
          $("#end_date").datepicker({
              dateFormat: 'yy-mm-dd',
              changeMonth: true,
              changeYear: true
          })

      })
  </script>
