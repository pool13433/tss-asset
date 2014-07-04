<script type="text/javascript">
    function checkPid() {
        var searchpid_ = $('#pid_').val();
        if (searchpid_.length < 13) {
            notyMessageClick('กรุณากรอกข้อมูลให้ครบ 13 หลัก', 'center', 'error');
            return false;
        } else {
            $.ajax({
                url: '<?php echo Yii::app()->createUrl('Member/CheckPid') ?>',
                dataType: 'json',
                type: 'POST',
                data: {
                    pid_: searchpid_,
                },
                success: function(data) {
                    //alert(print(data));
                    if (data != null) {
                        $('#mid').val(data.m_id);
                        $('#fname').val(data.m_fname);
                        $('#lname').val(data.m_lname);
                        $('#birthdate').val(data.m_birthday);
                        //$('#pid').val(data.m_pid);
                        $('#phone').val(data.m_tel);
                        $('#email').val(data.m_email);
                        $('#address').val(data.m_address);
                    } else {
                        notyMessageClick('ไม่พบ รหัสบัตร ของผู้ใช้งานในฐานข้อมู \n กรุณา กรอกข้อมูล', 'center', 'warning');
                        $('#profile-form')[0].reset();
                    }
                }
            });
        }
    }
</script>
<div class="panel panel-info">
    <div class="panel-heading">
        <span class="alert-success alert">
            <i class="glyphicon glyphicon-registration-mark"> แบบกรอกข้อมูล</i>
        </span>        
    </div>
    <div class="panel-body">
        <div class="col-md-10">
            <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->createUrl('Site/Index') ?>"><I class="glyphicon glyphicon-home"></I>Home</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('Item/ItemSearchForm') ?>"><i class="glyphicon glyphicon-search"></i> เลือกสิ่งของ</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('Borrow/Step1') ?>"><i class="glyphicon glyphicon-shopping-cart"> </i>ทรัพย์สินที่ยืม</a></li>
                <li  class="active">ยืนยันการ ยืม</li>
            </ol>
        </div>
        <div class="col-md-2" style="text-align: right;">
            <a href="<?php echo Yii::app()->createUrl('Borrow/Step1') ?>" class="btn btn-primary">
                <i class="glyphicon glyphicon-arrow-left"></i> กลับไปเลือกของ
            </a>
        </div>                   
    </div>   
    <div class="panel-body" >
        <form class="form-horizontal" id="profile-form" name="profile-form">
            <h3 class="alert-info alert">ข้อมูลส่วนตัว</h3>
            <hr/>
            <div class="form-group">
                <div class="col-md-6">
                    <label class="col-sm-4">รหัสบัตร CardID</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" name="pid" id="pid_"/>
                        <span class="input-group-addon">13 หลัก</span>
                    </div>
                    <input type="hidden" class="form-control" name="mid" id="mid"/>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" type="button" onclick="checkPid()">ค้น รหัสบัตร</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label class="col-sm-4">ชื่อ</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" name="fname" id="fname"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="col-sm-4">นามสกุล</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" name="lname" id="lname"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
            </div>   
            <div class="form-group">
                <div class="col-md-6">
                    <label class="col-sm-4">วันเกิด</label>
                    <div class="col-sm-8 input-group date" data-date-format="YYYY/MM/DD">
                        <input type="text" class="form-control datepicker" name="birthdate" id="birthdate"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>   
            <div class="form-group">
                <div class="col-md-6">
                    <label class="col-sm-4">เบอร์โทร</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" name="phone" id="phone"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="col-sm-4">อีเมลล์</label>
                    <div class="col-sm-8 input-group">
                        <input type="email" class="form-control" name="email" id="email"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    </div>
                </div>
            </div>   
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-sm-2">ที่อยู่</label>
                    <div class="col-sm-10 input-group">
                        <textarea class="form-control" name="address" id="address" rows="4"></textarea>
                    </div>               
                </div>
            </div>  
            <h3 class="alert-info alert">ข้อมูลการยืม</h3>
            <hr/>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-sm-2">วันเริ่ม ใช้งาน</label>
                    <div class="col-sm-3  input-group">
                        <input type="text" class="form-control" id="code" name="code" value="<?= $code ?>" disabled="true"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-sm-2">วันเริ่ม ใช้งาน</label>
                    <div class="col-sm-8 input-group date" data-date-format="YYYY/MM/DD">
                        <input type="text" class="form-control datepicker" name="startdate" id="startdate"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        <span class="input-group-addon">ถึง</span>
                        <input type="text" class="form-control datepicker" name="enddate" id="enddate"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>

            </div>  
        </form>
    </div>
    <div class="panel-footer">
        <div class="row">
            <label class="col-sm-3"></label>
            <div class="col-sm-6">
                <button type="button" class="btn btn-primary" onclick="return saveProfile();">
                    <i class="glyphicon glyphicon-ok"></i> บันทึก
                </button>                 
                <button type = "button" class = "btn btn-danger">
                    <i class="glyphicon glyphicon-remove"></i> ยกเลิกการยืม
                </button>
            </div>
        </div>
    </div>
</div>
