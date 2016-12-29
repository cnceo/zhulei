/**
 * Created by pigcms_21 on 2015/2/5.
 */
var start_time = '';
var end_time   = '';
var order_no   = ''
var status     = 0;
var page       = 1; //ҳ��
$(function() {

    if (getQueryString('start_time')) {
        start_time = getQueryString('start_time').replace('+', ' ');
    }

    if (getQueryString('end_time')) {
        end_time = getQueryString('end_time').replace('+', ' ');
    }

    if (getQueryString('order_no')) {
        order_no = getQueryString('order_no').replace('+', ' ');
    }

    if (getQueryString('status')) {
        status = getQueryString('status');
    }

    load_page('.app__content', load_url, {page: page_content, 'start_time': start_time, 'end_time': end_time, 'order_no': order_no, 'status': status}, '', function(){
        if (start_time) {
            $("input[name='start_time']").val(start_time);
        }
        if (end_time) {
            $("input[name='end_time']").val(end_time);
        }
        if (order_no) {
            $("input[name='order_no']").val(order_no);
        }
        //״̬
        if (status) {
            $("select[name='status']").find("option[value='" + status + "']").attr('selected', true);
        }
    });


    //ɸѡ
    $('.js-filter').live('click', function(){
        start_time = $("input[name='start_time']").val().trim();
        end_time   = $("input[name='end_time']").val().trim();
        order_no   = $("input[name='order_no']").val().trim();
        status     = $("select[name='status']").val();

        load_page('.app__content', load_url, {page: page_content, 'start_time': start_time, 'end_time': end_time, 'order_no': order_no, 'status': status}, '', function(){
            if (start_time) {
                $("input[name='start_time']").val(start_time)
            }
            if (end_time) {
                $("input[name='end_time']").val(end_time)
            }
            if (order_no) {
                $("input[name='order_no']").val(order_no)
            }
            //״̬
            if (status) {
                $("select[name='status']").find("option[value='" + status + "']").attr('selected', true);
            }
        });
    })

    //��ҳ
    $('.pagenavi > a').live('click', function(){
        page   = $(this).attr('data-page-num');
        start_time = $("input[name='start_time']").val().trim();
        end_time   = $("input[name='end_time']").val().trim();
        status = $("select[name='status']").val();
        load_page('.app__content', load_url, {page: page_content, 'p': page, 'start_time': start_time, 'end_time': end_time, 'status': status}, '', function(){
            if (start_time) {
                $("input[name='start_time']").val(start_time)
            }
            if (end_time) {
                $("input[name='end_time']").val(end_time)
            }
            if (order_no) {
                $("input[name='order_no']").val(order_no)
            }
            //״̬
            if (status) {
                $("select[name='status']").find("option[value='" + status + "']").attr('selected', true);
            }
        });
    })

    //��ʼʱ��
    $('#js-start-time').live('focus', function() {
        var options = {
            numberOfMonths: 2,
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
            showSecond: true,
            beforeShow: function() {
                if ($('#js-end-time').val() != '') {
                    $(this).datepicker('option', 'maxDate', new Date($('#js-end-time').val()));
                }
            },
            onSelect: function() {
                if ($('#js-start-time').val() != '') {
                    $('#js-end-time').datepicker('option', 'minDate', new Date($('#js-start-time').val()));
                }
            },
            onClose: function() {
                var flag = options._afterClose($(this).datepicker('getDate'), $('#js-end-time').datepicker('getDate'));
                if (!flag) {
                    $(this).datepicker('setDate', $('#js-end-time').datepicker('getDate'));
                }
            },
            _afterClose: function(date1, date2) {
                var starttime = 0;
                if (date1 != '' && date1 != undefined) {
                    starttime = new Date(date1).getTime();
                }
                var endtime = 0;
                if (date2 != '' && date2 != undefined) {
                    endtime = new Date(date2).getTime();
                }
                if (endtime > 0 && endtime < starttime) {
                    alert('��Ч��ʱ���');
                    return false;
                }
                return true;
            }
        };
        $('#js-start-time').datetimepicker(options);
    })


    //����ʱ��
    $('#js-end-time').live('focus', function(){
        var options = {
            numberOfMonths: 2,
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
            showSecond: true,
            beforeShow: function() {
                if ($('#js-start-time').val() != '') {
                    $(this).datepicker('option', 'minDate', new Date($('#js-start-time').val()));
                }
            },
            onSelect: function() {
                if ($('#js-end-time').val() != '') {
                    $('#js-start-time').datepicker('option', 'maxDate', new Date($('#js-end-time').val()));
                }
            },
            onClose: function() {
                var flag = options._afterClose($('#js-start-time').datepicker('getDate'), $(this).datepicker('getDate'));
                if (!flag) {
                    $(this).datepicker('setDate', $('#js-start-time').datepicker('getDate'));
                }
            },
            _afterClose: function(date1, date2) {
                var starttime = 0;
                if (date1 != '' && date1 != undefined) {
                    starttime = new Date(date1).getTime();
                }
                var endtime = 0;
                if (date2 != '' && date2 != undefined) {
                    endtime = new Date(date2).getTime();
                }
                if (starttime > 0 && endtime < starttime) {
                    alert('��Ч��ʱ���');
                    return false;
                }
                return true;
            }
        };
        $('#js-end-time').datetimepicker(options);
    })

    //���7���30��
    $('.date-quick-pick').live('click', function(){
        $(this).siblings('.date-quick-pick').removeClass('current');
        $(this).addClass('current');
        var tmp_days = $(this).attr('data-days');
        $('.js-start-time').val(changeDate(tmp_days).begin);
        $('.js-end-time').val(changeDate(tmp_days).end);
    })

})


function changeDate(days){
    var today=new Date(); // ��ȡ����ʱ��
    var begin;
    var endTime;
    if(days == 3){
        today.setTime(today.getTime()-2*24*3600*1000);
        begin = today.format('yyyy-MM-dd');
        today = new Date();
        today.setTime(today.getTime());
        end = today.format('yyyy-MM-dd');
    }else if(days == 7){
        today.setTime(today.getTime()-6*24*3600*1000);
        begin = today.format('yyyy-MM-dd');
        today = new Date();
        today.setTime(today.getTime());
        end = today.format('yyyy-MM-dd');
    }else if(days == 30){
        today.setTime(today.getTime()-29*24*3600*1000);
        begin = today.format('yyyy-MM-dd');
        today = new Date();
        today.setTime(today.getTime());
        end = today.format('yyyy-MM-dd');
    }
    return {'begin': begin + ' 00:00:00', 'end': end + ' 23:59:59'};
}

//��ʽ��ʱ��
Date.prototype.format = function(format){
    var o = {
        "M+" : this.getMonth()+1, //month
        "d+" : this.getDate(),    //day
        "h+" : this.getHours(),   //hour
        "m+" : this.getMinutes(), //minute
        "s+" : this.getSeconds(), //second
        "q+" : Math.floor((this.getMonth()+3)/3),  //quarter
        "S" : this.getMilliseconds() //millisecond
    }
    if(/(y+)/.test(format)) {
        format=format.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));
    }
    for(var k in o) {
        if(new RegExp("("+ k +")").test(format)) {
            format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length));
        }
    }
    return format;
}

function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}

function msg_hide() {
    $('.notifications').html('');
    clearTimeout(t);
}
