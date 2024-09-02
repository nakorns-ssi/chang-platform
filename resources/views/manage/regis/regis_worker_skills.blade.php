 
    <div class="    px-1 text-start  my-3 ">

        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="profile_display_name" class="form-label">ชื่อโปรไฟล์ *</label>
                    <input type="text" class="form-control" id="profile_display_name"
                        value="{{ $model->profile_display_name }}"
                        name="model[profile_display_name]" placeholder="ระบุ" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="profile_full_name" class="form-label">ชื่อ-สกุล </label>
                    <input type="text" class="form-control" id="profile_full_name"
                        value="{{ $model->profile_full_name }}" name="model[profile_full_name]"
                        placeholder="ระบุ" required>
                </div>
            </div>

        </div>
    </div>
    <div class="    px-1 text-start  my-3 ">

        <div class="row justify-content-center align-items-center">

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="profile_phone" class="form-label">เบอร์โทรมือถือ</label>
                    <input type="text" class="form-control" id="profile_phone"
                        value="{{ $model->profile_phone }}" name="model[profile_phone]"
                        placeholder="ระบุ" minlength="10" maxlength="10"
                        onkeypress="return isNumber(event)" pattern="\d+" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="profile_email" class="form-label">อีเมล</label>
                    <input type="email" class="form-control" id="profile_email"
                        value="{{ $model->profile_email }}" name="model[profile_email]"
                        placeholder="ระบุ">
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center mt-2"> 
        <div class="row g-2">
            <div class="col-12 text-start">
                <label for="profile_role" class="form-label">คุณคือใครในระบบ</label>
                <select class="form-select" id="profile_role" name="model[profile_role]" aria-label="Default select example">
                    <option disabled >-ระบุ-</option>
                    <option value="worker" 
                    <?php if($model->profile_role =='worker') echo 'selected'; ?>
                     >ฉันคือ"ช่าง"</option>
                    <option value="project_owner"
                    <?php if($model->profile_role =='project_owner') echo 'selected'; ?>
                    > ฉันคือ"ผู้ว่าจ้าง" </option>
                    <option value="all" 
                    <?php if($model->profile_role =='all') echo 'selected'; ?>
                    > ฉันคือ "ช่าง" + "ผู้ว่าจ้าง" </option>
                  </select>
            </div>
            
                 
        </div>
    </div>
     
     
    