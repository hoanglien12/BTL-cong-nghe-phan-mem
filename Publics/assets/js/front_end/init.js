function base_url(){
    return $('#base_url').val();
}
jQuery( window ).load(function() {
    caculate_init();
});
function caculate_init(){
    $('.title_main_1 > h2 >a').each(function(){
        ah = $(this).height();
        if(ah > 20){
            $(this).parent().addClass('tit-center');
        }
    });
}
function qtl_up(){
    var qtl = document.getElementById("txtQty").value;
    var newVal = parseFloat(qtl) + 1;
    $('#txtQty').val(newVal);
    $('#txtqty').val(newVal);
    console.log(newVal);
}
function qtl_dow(){
    var qtl = $('#txtQty').val();
    if(qtl <= 1){
        return false;
    }else{
        var newVal = parseFloat(qtl) - 1;
        $('#txtQty').val(newVal);
        $('#txtqty').val(newVal);
    }
}
function login() {

    var valid = jQuery("#loginform").validationEngine('validate');
    jQuery('#loginform').validationEngine({ focusFirstField: true });
    if(valid){

        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url() + 'dang-nhap',
            data: {email: $('#username').val(), pass: $('#password').val()},
            success: function (result) {
                if (result.check == true) {
                    location.reload(base_url());
                }
                if (result.check == false) {
                    $('#login-alert').html(result.mess);
                    $('#login-alert').show();
                }
            }
        });
    }
}

function loginModal(){
    $('.modal').remove();
    $.ajax({
        url:base_url() + 'modal/login',
        dataType:"html",
        type:"POST",
        data:{status:1},
        success:function(res){
            $('body').append(res);
            $("#loginModal").modal();
        }
    });
}
function registerModal(){
    $('.modal').remove();
    $.ajax({
        url:base_url() + 'modal/register',
        dataType:"html",
        type:"POST",
        data:{status:1},
        success:function(res){
            $('body').append(res);
            $("#myModal").modal();
        }
    });
}
function changePassModal(){
    $('.modal').remove();
    $.ajax({
        url:base_url() + 'modal/changePass',
        dataType:"html",
        type:"POST",
        data:{status:1},
        success:function(res){
            $('body').append(res);
            $("#myModal").modal();
        }
    });
}

function check_mail(val){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'users/check_email',
        data: {email:val},
        success: function (result) {
            if(result.check==false){
//                        alert (result.mss);
                var ms='<div class="form-validation-field-1formError parentFormloginform formError"\
                        style="opacity: 0.87; position: absolute; top: 0px; left: 376px; margin-top: -31px;">\
                            <div class="formErrorContent">* '+result.mss+'<br></div>\
                            <div class="formErrorArrow">\
                            <div class="line10"> </div><div class="line9"></div><div class="line8">\
                            </div><div class="line7"></div><div class="line6"></div><div class="line5">\
                            </div><div class="line4"></div><div class="line3"></div><div class="line2"></div>\
                            <div class="line1"></div></div>\
                            </div>';

                $('#show_error').html(ms);
                $('#show_error2').html(ms);
                $('#btn-signups').attr('disabled','true');
                $('#status_check').attr('value','2');
            }else if(result.check==true){
                $('#btn-signups').removeAttr('disabled');
                $('#btn-signups').prop('disabled', false);
                $('#show_error').empty();
                $('#status_check').attr('value','1');
            }
        }
    })
}
function getModalForgotPass()
{
    $('.modal').remove();
    $.ajax({
        url:base_url() + 'modal/forgotPass',
        dataType:"html",
        type:"POST",
        data:{status:1},
        success:function(res){
            $('body').append(res);
            $("#myModal").modal();
        }
    });
}
$(document.body).on('click',function(){
    jQuery('.autosearch').hide();;
});

$('#ctl00_pageBody_btnApplyCouponCode').on("click",function(){

});
function checkCode(){
    var code = $('#ctl00_pageBody_txtCouponCode').val();
    $.ajax({
        type: "POST",
        url: base_url() + 'cart/checkCode',
        dataType: "json",
        data:{code:code},
        success:function(res){
            if(res.check==false){
                alert('Mã không chính xác ! vui lòng thử lại');
            }else{
                $('.discount-money').removeClass('hidden');
                $('.price-code').html(res.price_code);
                $('#total_cart').html(res.total);
            }
        }
    });
}
function updateCart(rowid,qty){
    $.ajax({
        url: base_url() + 'cart/updateQuantity',
        type:"POST",
        dataType:"html",
        data:{qty:qty,rowid:rowid},
        beforeSend:function(){
            $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
        },
        success:function(res){
            viewCart();
            $("#cart-content").html(res);
        },
        complete: function() {
            $('#ajax_loader').remove();
        }
    });
}
function displayCart(rowid,qty){
    $.ajax({
        url: base_url() + 'cart/displayCart',
        type:"POST",
        dataType:"html",
        data:{qty:qty,rowid:rowid},
        success:function(res){
            $("#head-cart-box").html(res);
        }
    });
}
function viewCart(){
    $.ajax({
        url: base_url() + 'cart/displayCart',
        type:"POST",
        dataType:"html",
        data:{id:1},
        success:function(res){
            $("#head-cart-box").html(res);
        }
    });
}
function upQuantity(obj){
    var rowid = $(obj).data('bind');
    var qtl = document.getElementById("qty-"+rowid).value;
    var newVal = parseFloat(qtl) + 1;
    $('#qty-'+rowid).val(newVal);
    updateCart(rowid,newVal);
    displayCart(rowid,newVal);
}
function downQuantiy(obj){
    var rowid = $(obj).data('bind');
    var qtl = $('#qty-'+rowid).val();
    if(qtl <= 1){
        return false;
    }else{
        var newVal = parseFloat(qtl) - 1;
        $('#qty-'+rowid).val(newVal);
        updateCart(rowid,newVal);
        displayCart(rowid,newVal);
    }
}
function addToCart(){
    var qty = $('#txtQty').val();
    var id = $('#item_select_id').val();
    console.log(qty);
    $.ajax({
        url:base_url() + 'cart/addCartItemSelect',
        type:"POST",
        dataType:"html",
        data:{id:id,qty:qty},
        beforeSend:function(){
            $("#myModal").remove();
            $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
        },
        success:function(res){
            viewCart();
            $('body').append(res);
            $("#myModal").modal();
        },
        complete: function() {
            $('#ajax_loader').remove();
        }
    });
}
function updateCartP(rowid,qty){
    $.ajax({
        url: base_url() + 'cart/updateQuantityP',
        type:"POST",
        dataType:"html",
        data:{qty:qty,rowid:rowid},
        beforeSend:function(){
            $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
        },
        success:function(res){
            viewCart();
            $("#cart-content").html(res);
        },
        complete: function() {
            $('#ajax_loader').remove();
        }
    });
}
function upQuantityP(obj){
    var rowid = $(obj).data('bind');
    var qtl = document.getElementById("qty-"+rowid).value;
    var newVal = parseFloat(qtl) + 1;
    $('#qty-'+rowid).val(newVal);
    updateCartP(rowid,newVal);
    viewCart();
}
function upQuantityP1(obj){
    var rowid = $(obj).data('bind');
    var qtl = document.getElementById("qty-"+rowid).value;
    var newVal = parseFloat(qtl);
    $('#qty-'+rowid).val(newVal);
    updateCartP(rowid,newVal);
    viewCart();
}


function downQuantiyP(obj){
    var rowid = $(obj).data('bind');
    var qtl = $('#qty-'+rowid).val();
    if(qtl <= 1){
        return false;
    }else{
        var newVal = parseFloat(qtl) - 1;
        $('#qty-'+rowid).val(newVal);
        updateCartP(rowid,newVal);
        viewCart();
    }
}
function auto_complete(obj){
    $('.autosearch').remove();
    var name = $(obj).val();
    $.ajax({
        type: "POST",
        dataType: "html",
        url: base_url() +"get-data-search",
        data: {name:name},
        success: function (result){
            $('.search_query').after(result);
            $('.autosearch').dropdown('toggle');
        }
    })
}
/*$(function(){
    $('.search-input').on("click input",function(e){
        e.preventDefault();
        $('.autosearch').remove();
        var name = jQuery(this).val();
        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: base_url() +"get-data-search",
            data: {name:name},
            success: function (result){
                jQuery('.search_query').after(result);
                jQuery('.search_query').dropdown();
            }
        })
    });

});*/
if (window.innerWidth > 768) {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('.sticky-headerz').addClass('fixedz');
        } else {
            $('.sticky-headerz').removeClass('fixedz');
        }
    });
}
if (window.innerWidth > 320) {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('.sticky-headerz').addClass('clearfixz');
        } else {
            $('.sticky-headerz').removeClass('clearfixz');
        }
    });
}
if (window.innerWidth < 667) {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('.label-search').addClass('none');
        } else {
            $('.label-search').removeClass('none');
        }
    });
}
$(function(){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        $(this).attr("href").replace("#","");
        var param = $(this).data('value');
        var concept = $(this).text();
        $('.search-panel #search_concept').html(concept);
        $('.input-group #cate_id').val(param);
    });
});
$(function(){
    $('.m-search').click(function(){
        $('.label-search').toggleClass('show');
    });
});
