//Main Script
$(function() {
// login    
    datepicker_byId('#birthdate');
    datepicker_byId('#startdate');
    datepicker_byId('#enddate');
});

function checkLogin(url, urlAdmin, urlMember) {
    $('#btn-login').click(function() {
        var user = $('#user').val();
        var pass = $('#pass').val();
        if (user == '' && pass == '') {
            notyMessageClick('กรุณากรอก Username and Password', 'center', 'error');
            return false;
        } else {
            if (user == '') {
                notyMessageClick('กรุณากรอก Username', 'center', 'error');
                return false;
            }
            if (pass == '') {
                notyMessageClick('กรุณากรอก Password', 'center', 'error');
                return false;
            }
        }
//alert(dialogConfirmDelete());
        if (confirm("Login Now ?")) {
            $.ajax({
                url: url, // '<?php Yii:app()->createUrl("Site/CheckLogin")?>', //index.php?r=Site/CheckLogin
                dataType: 'json',
                type: 'POST',
                data: $("#login-form").serialize(),
                success: function(data) {
//alert(data);
                    if (data.status == 'success') {
                        switch (data.group) {
                            case 1:
                                window.location = urlAdmin;// '../index.php?r=Member/Index';
                                break;
                            case 2:
                                window.location = urlMember;//'../index.php?r=Site/Index';
                                break;
                            default :
                                alert('group อื่น' + data.group);
                                break;
                        }
                    } else {
                        notyMessageClick('ไม่มีชื่อ ในระบบ', 'top', 'error');
                        $('#user').val("");
                        $('#pass').val("");
                    }
                },
            });
        }
    });
    return false;
}

function datepicker_byId(id_input) {
//date picker
    $(id_input).datepicker({
        //format: 'mm/dd/yyyy',
        format: 'yyyy-dd-mm',
        startDate: '-3d',
        pickDate: true,
        pickTime: true, //en/disables the time picker
        useMinutes: true, //en/disables the minutes picker
        useSeconds: true, //en/disables the seconds picker
        useCurrent: true, //when true, picker will set the value to the current date/time     
        minuteStepping: 1, //set the minute stepping
        minDate: '1/1/1900', //set a minimum date
        //maxDate: ,     //set a maximum date (defaults to today +100 years)
        showToday: true, //shows the today indicator
        language: 'en', //sets language locale
        defaultDate: "", //sets a default date, accepts js dates, strings and moment objects
        disabledDates: [], //an array of dates that cannot be selected
        enabledDates: [],
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        },
        useStrict: false, //use "strict" when validating dates  
        sideBySide: false, //show the date and time picker side by side
        daysOfWeekDisabled: []
    });
    //
}
function notyMessageClick(message, tLayout, tType) {
    $(function() {
// url api 
//http://ned.im/noty/#layouts
        var noty_id = noty({
            text: message,
            layout: tLayout, // topCenter,topLeft,topRight,...
            closeWith: ['click'], // ['click', 'button', 'hover']
            theme: 'defaultTheme',
            type: tType, // success, warning,information ,error ,notification ,alert
            timeout: 2000,
            callback: {
                onShow: function() {
                },
                afterShow: function() {

                },
                onClose: function() {

                },
                afterClose: function() {

                }
            },
            maxVisible: 5, // you can set max visible notification for dismissQueue true option
            dismissQueue: false, // If you want to use queue feature set this true
            nimation: {
                open: {height: 'toggle'},
                close: {height: 'toggle'},
                easing: 'swing',
                speed: 500 // opening & closing animation speed
            },
            template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>',
        });
    });
}
function notyMessageButtonClick(message, tLayout, tType) {
    $(function() {
// url api 
//http://ned.im/noty/#layouts
        var noty_id = noty({
            text: message,
            layout: tLayout, // topCenter,topLeft,topRight,...
            closeWith: ['button'], // ['click', 'button', 'hover']
            theme: 'defaultTheme',
            type: tType, // success, warning,information ,error ,notification ,alert
            //timeout: 10000,
            callback: {
                onShow: function() {
                },
                afterShow: function() {

                },
                onClose: function() {

                },
                afterClose: function() {

                }
            },
            maxVisible: 5, // you can set max visible notification for dismissQueue true option
            dismissQueue: false, // If you want to use queue feature set this true
            nimation: {
                open: {height: 'toggle'},
                close: {height: 'toggle'},
                easing: 'swing',
                speed: 500 // opening & closing animation speed
            },
            /* buttons: [
             {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
             
             // this = button element
             // $noty = $noty element
             
             $noty.close();
             noty({text: 'You clicked "Ok" button', type: 'success'});
             }
             },
             {addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
             $noty.close();
             noty({text: 'You clicked "Cancel" button', type: 'error'});
             }
             }
             ],*/
            template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>',
        });
    });
}
function notyMessageConfirm(message, tLayout, tType) {
    $(function() {
// url api 
//http://ned.im/noty/#layouts
        var noty_id = noty({
            text: message,
            layout: tLayout, // topCenter,topLeft,topRight,...
            closeWith: ['button'], // ['click', 'button', 'hover']
            theme: 'defaultTheme',
            type: tType, // success, warning,information ,error ,notification ,alert
            //timeout: 10000,            
            maxVisible: 5, // you can set max visible notification for dismissQueue true option
            dismissQueue: false, // If you want to use queue feature set this true
            nimation: {
                open: {height: 'toggle'},
                close: {height: 'toggle'},
                easing: 'swing',
                speed: 500 // opening & closing animation speed
            },
            buttons: [
                {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {

// this = button element
// $noty = $noty element

                        $noty.close();
                        return true;
                        //noty({text: 'You clicked "Ok" button', type: 'success'});
                    }
                },
                {addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {

                        $noty.close();
                        return false;
                        //noty({text: 'You clicked "Cancel" button', type: 'error'});
                    }
                }
            ],
            template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>',
        });
    });
    //return false;
}
function dialogConfirmDelete() {
    var response = false;
    var title = "ยืนยันการลบ ข้อมูล";
    var message = "ยืนยันการลบข้อมูล ที่เลือก";
    var dialog = $("<div title='" + title + "'>" + message + "</div>").dialog({
        modal: true,
        buttons: {
            'yes': {
                'text': 'ยืนยัน',
                'class': 'btn btn-primary',
                'prepend': '<b class="glyphicon glyphicon-ok"></b> ',
                'click': function() {

                    dialog.dialog('destroy');
                    response = true;
                }
            },
            'no': {
                'text': 'ยกเลิก',
                'class': 'btn btn-danger',
                'prepend': '<b class="glyphicon glyphicon-remove"></b> ',
                'click': function() {
                    dialog.dialog('destroy');
                    response = false;
                }
            }
        }
    });
    return dialog;
}
function dialogConfirm() {
    var dialog = $('<div title="title">Message</div>').dialog({
        autoOpen: true,
//            height: 300,
//            width: 350,
        modal: true,
        drag: false,
        buttons: {
            Cancel: function() {
                dialog.dialog("close");
            }
        },
        close: function() {
        }
    });
}
function saveProfile(urlSave) {
    $("#borrowprofile-form").validate({
        debug: false,
        rules: {
            pid: {required: true, },
            fname: {required: true, },
            lname: {required: true, },
            birthdate: {required: true, },
            phone: {required: true, },
            email: {required: true, },
            address: {required: true, },
            code: {required: true, },
            startdate: {required: true, },
            enddate: {required: true, },
        },
        messages: {
            pid: {required: " กรุณากรอกข้อมูล รหัสบัตรประชาชน", },
            fname: {required: " กรุณากรอกข้อมูล fname", },
            lname: {required: "กรุณากรอกข้อมูล lname", },
            birthdate: {required: "กรุณากรอกข้อมูล birthdate", },
            phone: {required: "กรุณากรอกข้อมูล phone", },
            email: {required: "กรุณากรอกข้อมูล email", },
            address: {required: "กรุณากรอกข้อมูล address", },
            code: {required: "กรุณากรอกข้อมูล รหัสของการยืม", },
            startdate: {required: "กรุณากรอกข้อมูล วันเริ่มการใช้งาน", },
            enddate: {required: "กรุณากรอกข้อมูล วันสิ้นสุดการใช้งาน", },
        },
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        highlight: function(element, errorClass) {
            $(element).fadeOut(function() {
                $(element).fadeIn();
            });
        }
    });

    if ($("#borrowprofile-form").valid()) {
        //alert("ok");
        if (confirm('ยืนยันการยืม')) {
            $.ajax({
                url: urlSave, //
                type: 'POST',
                data: $('#borrowprofile-form').serialize(), //borrowprofile-form
                success: function(data) {
                    //alert('data' + data);
                    if (data == 'success') {
                        notyMessageClick('บันทึก สำเร็จ', 'center', 'information');
                    } else {
                        notyMessageClick('การบันทึก ผิดพลาด ', 'center', 'error');
                    }
                },
            });
        }
    } else {
        alert("false");
    }
    return false;
}
function checkPid(urlCheck) {
    var searchpid_ = $('#pid_').val();
    if (searchpid_.length < 13) {
        notyMessageClick('กรุณากรอกข้อมูลให้ครบ 13 หลัก', 'center', 'error');
        return false;
    } else {
        $.ajax({
            url: urlCheck, //
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
                    $('#borrowprofile-form')[0].reset();
                }
            }
        });
    }
}
