/**
 * Created by pigcms_21 on 2015/2/5.
 */
var name  = '';
var level = '';
var page  = 1; //ҳ��
$(function() {

    if (getQueryString('name')) {
        name = getQueryString('name').replace('+', ' ');
    }

    if (getQueryString('level')) {
        status = getQueryString('level');
    }

    load_page('.app__content', load_url, {page: page_content, 'name': name, 'level': level}, '', function(){
        if (name) {
            $("input[name='name']").val(name);
        }
        //����
        if (level) {
            $("select[name='level']").find("option[value='" + level + "']").attr('selected', true);
        }
    });


    //ɸѡ
    $('.js-filter').live('click', function(){
        name  = $("input[name='name']").val().trim();
        level = $("select[name='level']").val();

        load_page('.app__content', load_url, {page: page_content, 'name': name, 'level': level}, '', function(){
            if (name) {
                $("input[name='name']").val(name)
            }
            //����
            if (level) {
                $("select[name='level']").find("option[value='" + level + "']").attr('selected', true);
            }
        });
    })

    //��ҳ
    $('.pagenavi > a').live('click', function(){
        page  = $(this).attr('data-page-num');
        name  = $("input[name='name']").val().trim();
        level = $("select[name='level']").val();
        load_page('.app__content', load_url, {page: page_content, 'p': page, 'name': name, 'level': level}, '', function(){
            if (name) {
                $("input[name='name']").val(name)
            }
            //����
            if (level) {
                $("select[name='level']").find("option[value='" + level + "']").attr('selected', true);
            }
        });
    })

})

function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}

function msg_hide() {
    $('.notifications').html('');
    clearTimeout(t);
}
