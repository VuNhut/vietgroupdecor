/**
 * Created with JetBrains PhpStorm.
 * User: Lak
 * Date: 11/2/13
 * Time: 11:46 AM
 * To change this template use File | Settings | File Templates.
 */
/*function getflight(encode,notice,fromdate,todate){
    $.ajax({
        url: myvar.flightinfo,
        cache:false,
        traditional: true,
        type: "POST",
        data:"enCode="+encode+"&fromdate="+fromdate+"&todate="+todate,
        dataType: "html",
        beforeSend: function () {
            $('#loadresultfirst').html(notice);
        },
        success: function(output){
            $("#mainDisplay").html(output);
        },
        complete: function(){
            $(".waitflight").hide();
        }
    });
}*/

var ArrayResult=new Array();
ArrayResult["count"]=0;

function getflight_info(vna,vj,js,notice,fromdate,todate){
    $('#loadresultfirst').html(notice);
    if(vna=='1') getresults(myvar.vna,fromdate,todate);
    if(vj=='1') getresults(myvar.vj,fromdate,todate);
    if(js=='1') getresults(myvar.js,fromdate,todate);
}

function getresults(airline,link,fromdate,todate){
    $.ajax({
        url: link,
        cache:false,
        traditional: true,
        type: "POST",
        data:"enCode="+SessionID,
        timeout:25000,
        dataType: "html",
        beforeSend: function () {
        },
        success: function(output){
            processResult(airline,output);
        },
        complete: function(){
            $(".waitflight").hide();
        },
        error: function(){
            CountActive--;
            if(CountActive==0 && ArrayResult.length==0){
                var emptyhtml=emptyflight();
                $("#result").html(emptyhtml);
            }
        }
    });
}

function processResult(data){
    //Xử Lý Add Row và hiện bản kết quả
    try{
        var org=JSON.parse(data);
        for(var data in org[0]){
            var airline="";
            if(org[0][data].airline=="Vietnam Airlines") airline="vna";
            if(org[0][data].airline=="Vietjet") airline="vj";
            if(org[0][data].airline=="Jetstar") airline="js";
            
            var newrow=addrow(airline,org[0][data],0);
            $("#result #OutBound>tbody").append(newrow);
            ArrayResult[data]=org[0][data];
            ArrayResult["count"]++;
    
            if (!$("#frmfilterflight li." + airline).is(":visible")) {
                $("#frmfilterflight li." + airline).show();
            }
        }
    
        if(Direction==0){
            for(var data in org[1]){
                var airline="";
                if(org[1][data].airline=="Vietnam Airlines") airline="vna";
                if(org[1][data].airline=="Vietjet") airline="vj";
                if(org[1][data].airline=="Jetstar") airline="js";
    
                var newrow=addrow(airline,org[1][data],1);
                $("#result #InBound>tbody").append(newrow);
                ArrayResult[data]=org[1][data];
                ArrayResult["count"]++;
                
                if (!$("#frmfilterflight li." + airline).is(":visible")) {
                    $("#frmfilterflight li." + airline).show();
                }
            }
        }
        
        if (ArrayResult["count"] > 0 && $('#loadresultfirst').is(":visible")) {
            $('#loadresultfirst').hide();
            $("#result").show();
            $("#flightsort").show();
            if (CountActive > 1) {
                if (!$("#filterflight").is(":visible"))
                    $("#filterflight").show();
            }
        }
    
        $("table.flightlist").trigger("update");
    
    } catch(err) {
        
        console.log("Error Log : " + err);
        
    } finally {

        CountActive--;
        if(CountActive==0 && ArrayResult["count"]==0){
            var emptyhtml=emptyflight();
            $("#mainDisplay").html(emptyhtml);
        }else if(CountActive==0 && ArrayResult["count"]>0){
            $("ul.date-picker").show();
            $(".sinfo .location").removeClass("contload");
        }
    
    }
    return false;
}

function getflight_inter(isdebug){

}

function parseDate(str) {
    var mdy = str.split('-');
    return new Date(mdy[2], mdy[1], mdy[0]);
}

function comparewithCurrentDate(str){
    var mdy = str.split('-');
    var x=new Date(mdy[2],mdy[1]-1,mdy[0],23,59,59);
    var today = new Date();
    if (x < today)
        return false;
    else
        return true;
}

function compareFromDatewithToDate(date1,date2){
    var mdydate1 = date1.split('-');
    var fromdate = new Date(mdydate1[2],mdydate1[1]-1,mdydate1[0]);

    var mdydate2 = date2.split('-');
    var todate = new Date(mdydate2[2],mdydate2[1]-1,mdydate2[0]);
    if(fromdate > todate)
        return false;
    else
        return true;
}

function CurrentDate(){
    var currentTime = new Date();
    var month = currentTime.getMonth() + 1;
    var day = currentTime.getDate();
    var year = currentTime.getFullYear();
    var strDate = day + "-" + month + "-" + year ;

    return strDate;
}

$(document).ajaxComplete(function() {
        if($("table.flightlist tbody tr").length > 0){
            $("table.flightlist").trigger("update");
            var sorting = [[0,0]];
            $("table.flightlist").trigger("sorton", [sorting]);
        }
        $(".flightlist").tablesorter({ 
            sortInitialOrder: 'desc',
            sortList: [[2,0]],
            headers:{
            2:{sorter:'thousands'}
            }

        }); 
    });
    
$(document).ready(function(){

    $.tablesorter.addParser({
        id: 'thousands',
        is: function(s) {
            return false;
        },
        format: function(s) {
            return s.replace(' VND','').replace(/,/g,'');
        },
        type: 'numeric'
    });
    $("table.flightlist").tablesorter({
        headers:{
            2:{sorter:'thousands'},
            3:{sorter:false},
            4:{sorter:false}
        }
    });

    $("table.flightlist").live("sortStart",function(){
        $(".flight-detail").remove();
    })

    $(".rdsort").live("click",function(){
        $("#frmsoftflight li label").removeAttr("style");
        $(this).parent().find("label").attr("style","font-weight:bold;")
        sort_val=$(this).val();
        if(sort_val=="price")
            sorting = [[2,0]];
        if(sort_val=="airline")
            sorting = [[0,0]];
        if(sort_val=="time")
            sorting = [[1,0]];
        //alert(sort_val);
        $("table.flightlist").trigger("sorton",[sorting]);
    })

    $(".flightfilter").live("click",function(){
        $(".flight-detail").remove();
        cr_val=$(this).val();
        if(cr_val=="all"){
            if($(this).attr("checked")){
                $(".flightfilter").each(function(index){
                    $(this).attr("checked","checked");
                    $("table.flightlist .lineresult-main").show();

                })
            }else{
                $(".flightfilter").each(function(index){
                    $(this).removeAttr("checked");
                    $("table.flightlist .lineresult-main").hide();
                })
            }
        }else{
            if($(".flightfilter:checked").length==4){
                $("#filterall").attr("checked","checked");
                $("table.flightlist .lineresult-main").show();
            }else{
                $("#filterall").removeAttr("checked");

                if($(this).attr("checked")){
                    $(".lineresult-main."+cr_val).show();
                }else{
                    $(".lineresult-main."+cr_val).hide();
                }
            }
        }
    })

    $('#frm_requestflight').submit(function(){
        $(':submit', this).click(function() {
            return false;
        });
    });

    $('#sm_request').live("click",function(){
        if($('#fullname').val() == ''){
            $('#fullname').focus();
            return false;
        }else if($('#phone').val() == ''){
            $('#phone').focus();
            return false;
        }else{
            return true;
        }
    })


})


$( function() {
    $('tr.lineresult-main').live("click",function(){
        $(this).parents('table').find('tr').each( function( index, element ) {
            $(element).removeClass('marked');
        } );
        $(this).addClass('marked');
    });


    /***
     CHANGE DEPART DAY
     ***/
    $(".changedepartflight").click(function(){

        var departchange = $(this).attr('rel');
        var todate = Returndate;

        if(todate == '' || (todate != '' & compareFromDatewithToDate(departchange, todate)) ){
            generateform(departchange,Returndate);
            $("#frmchangedate").submit();
            return;
        }else{
            alert('Ngày khởi hành không được lớn hơn ngày về');
            return false;
        }

    });


    /***
     CHANGE RETURN DAY
     ***/
    $(".changereturnflight").click(function(){
        var fromdate = Departdate;
        var returnchange = $(this).attr('rel');
        if(compareFromDatewithToDate(fromdate,returnchange)){
            generateform(Departdate,returnchange);
            $("#frmchangedate").submit();
        }else{
            alert('Ngày về không được nhỏ hơn ngày khởi hành');
            return false;
        }
    });

    /***
     CHON CHUYEN BAY
     ***/
    $(".selectflight").live("click",function(){
        var direction=$(this).closest(".flightlist").attr("id");
        $("#"+direction+" .dep-active").removeClass("dep-active");
        var key = $(this).val();

        if($("#flightdetail"+key).length){

        }else{
            $("#"+direction+" .flight-detail").remove();
            $(this).closest("tr").after('<tr class="flight-detail" id="flightdetail'+key+'"></tr>');
            showdetail(false,key,direction);
        }
    })

    /***
     XEM CHI TIET
     ***/
    $(".viewdetail").live("click",function(){
        var direction=$(this).closest(".flightlist").attr("id");
        $("#"+direction+" .dep-active").removeClass("dep-active");

        var keyactive = $(this).attr('rel');

        if($(this).hasClass("on")){
            /*Xoa cai khac di*/
            $("#"+direction+" .flight-detail").remove();
            $(this).removeClass("on");
        }else{
            $("#"+direction+" .flight-detail").remove();
            $("#"+direction+" .live").removeClass("on");
            $(this).addClass("on");
            $(this).closest("tr").after('<tr class="flight-detail" id="flightdetail'+keyactive+'"></tr>');
            showdetail(false,keyactive,direction);
        }
        return false;
    })

    /***
     CHECK SUBMIT
     <div class="noneselect">Bạn chưa chọn chuyến bay lượt đi hoặc lượt về</div>
     ***/
    $("#frmSelectFlight").submit(function(){
        var way_flight = Direction;
        if(way_flight == 1){
            if(!$('input[name="selectflightdep"]:checked').val())
            {
            $(".noneselect").text('Bạn chưa chọn chuyến bay');
            $(".noneselect").show();
            $(".noneselect").fadeOut(2000);
            return false;
            }
        }
        else{
            if(!$('input[name="selectflightdep"]:checked').val() || !$('input[name="selectflightret"]:checked').val())
            {
            $(".noneselect").text('Bạn chưa chọn chuyến bay lượt đi hoặc lượt về');
            $(".noneselect").show();
            $(".noneselect").fadeOut(2000);
            return false;
            }
        }
        for(i=0;i<XhrRequest.length;i++){
            if(XhrRequest[i] && XhrRequest[i].readystate != 4)
                XhrRequest[i].abort();
        }
        $("#result").hide();
        $("#mainDisplay").append('<p style="text-align: center;padding: 5px;">Quý khách vui lòng chờ trong giây lát..</p>')
        return true;
    });
});

function showdetail(isselect,flightid,direction){

    $("#flightdetail"+flightid).show();
    var rowdetail=addrowdetail("",ArrayResult[flightid]);

    $("#flightdetail"+flightid).html(rowdetail);

}

function addrow(airline,obj,direction){

    var sltname=(direction==0)?"selectflightdep":"selectflightret";
    logo_class="";
    if(airline == 'vna'){
        logo_class = 'bg_vnal';
    }
    else if(airline == 'js'){
        logo_class = 'bg_js';
    }
    else if(airline == 'vj'){
        logo_class = 'bg_vj';
    }

    var newrow='<tr class="lineresult-main '+airline+'"> \
                    <td class="f_code '+logo_class+'">'+obj.flightno+'</td> \
                    <td class="f_time">'+obj.deptime+' - '+obj.arvtime+'</td> \
                    <td class="f_price">'+formatNumber(obj.baseprice)+' VND </td> \
                    <td class="f_detail"><a href="#" class="viewdetail" rel="'+obj.flightid+'">Chi tiết</a> </td> \
                    <td class="f_select"> \
                        <div style="position:relative"> \
                            <input type="radio" name="'+sltname+'" class="selectflight" value="'+obj.flightid+'" id="selectflightret'+obj.flightid+'" /> \
                            <label for="selectflightret'+obj.flightid+'">Chọn</label> \
                        </div>\
                    </td>\
                </tr>';
    return newrow;
}

function addrowdetail(airline,obj){
    var rowdetail=' <td colspan="5" class="flight-detail-content"> \
        <table class="flight_info"> \
        <tr style="font-weight:bold" class="thead"> \
            <td width="40%" style="font-weight:bold;">Khởi hành</td> \
            <td width="40%" style="">Điểm đến</td> \
            <td width="20%" style="">Chuyến bay</td> \
        </tr> \
        <tr> \
        <td>từ <strong style="color: #e8382a;">'+obj.depcity+'</strong>, Việt nam</td> \
        <td>đến <strong style="color: #e8382a;">'+obj.descity+'</strong>, Việt nam</td> \
            <td><strong style="color: #e8382a;">'+obj.airline+'</strong></td> \
        </tr>\
        <tr>\
            <td>Sân bay: <strong>'+obj.depairport+'</strong></td>\
            <td>Sân bay: <strong>'+obj.desairport+'</strong></td>\
            <td><strong>('+obj.flightno+')</strong></td>\
        </tr>\
        <tr>\
            <td>Thời gian: <strong style="color: #e8382a;">'+obj.deptime+'</strong>, '+obj.depdate+'</td>\
            <td>Thời gian: <strong style="color: #e8382a;">'+obj.arvtime+'</strong>, '+obj.arvdate+'</td>\
            <td>Loại vé: <strong>'+obj.faretype+'</strong></td>\
        </tr>\
    </table>';
    //if(stop != 0 ) rowdetail+='<div class="note">'+obj.note+'</div>';

    rowdetail+='<table class="flight_info tblprice" style="text-align:center">\
            <tr style="font-weight:bold;color:#747474;font-size: 12px;">\
                <td>Hành khách</td>\
                <td>Số lượng vé</td>\
                <td>Giá mỗi vé</td>\
                <td>Thuế & Phí</td>\
                <td>Tổng giá</td>\
            </tr>\
            <tr>\
                <td>Người lớn</td>\
                <td><b>'+Adult+'</b></td>\
                <td><b>'+formatNumber(obj.baseprice)+' VND</b></td>\
                <td><b>'+formatNumber(obj.adult.taxfee)+' VND</b></td>\
                <td><b>'+formatNumber(obj.adult.total)+' VND</b></td>\
            </tr>';
        if(Child != 0){
            rowdetail+='<tr>\
                <td>Trẻ em</td>\
                <td><b>'+Child+'</b></td>\
                <td><b>'+formatNumber(obj.child.baseprice)+' VND</b></td>\
                <td><b>'+formatNumber(obj.child.taxfee)+' VND</b></td>\
                <td><b>'+formatNumber(obj.child.total)+' VND</b></td>\
            </tr>';
        }
        if(Infant != 0){
            rowdetail+='<tr>\
                <td>Trẻ sơ sinh</td>\
                <td><b>'+Infant+'</b></td>\
                <td><b>'+formatNumber(obj.infant.baseprice)+' VND</b></td>\
                <td><b>'+formatNumber(obj.infant.taxfee)+' VND</b></td>\
                <td><b>'+formatNumber(obj.infant.total)+' VND</b></td>\
            </tr>';
        }
            rowdetail+='<tr>\
                <td colspan="4" style="border-top: 1px dashed #ccc;padding-top: 10px;"><b>Tổng cộng<b/></td>\
                    <td style="text-align: left;font-weight: bold;border-top: 1px dashed #ccc;padding-top: 10px;">'+formatNumber(obj.subtotal)+' VND</td>\
                </tr>\
            </table>\
        </td> ';

    return rowdetail;
}

function emptyflight(){
    var html='<div class="empty_flight">\
        <h3>Chuyến bay bạn yêu cầu hiện tại đã hết !</h3>\
        <p><strong>Thông báo:</strong> chuyến bay khởi hành từ <strong>'+SourceCity+'</strong> đi <strong>'+DesCity+'</strong> trong ngày <strong>'+Departdate+'</strong> của các hãng hàng không trên hệ thông đặt vé online đã hết.</p>\
        <p>Bạn có thể thay đổi <strong>ngày đi</strong>, hoặc <strong>ngày về</strong> để tìm chuyến bay khác.</p>\
        <p>Nếu bạn muốn <strong>đặt vé máy bay theo yêu cầu</strong> trên, bạn có thể gửi yêu cầu theo <strong>biểu mẫu bên dưới</strong> hoặc gọi tới số điện thoại <strong style="font-size:16px;color:#E00;">'+Hotline+'</strong>. Nhân viên của chúng tôi sẽ <strong>tìm vé máy bay theo yêu cầu</strong> của bạn </p>\
        <div class="request_block">\
            <form method="post" action="" id="frm_requestflight">\
                <table>\
                    <caption>Đặt vé theo yêu cầu</caption>\
                    <tr>\
                        <td><label for="fullname">Họ tên:</label></td><td><input type="text" name="fullname" id="fullname" /></td>\
                    </tr>\
                    <tr>\
                        <td><label for="phone">Điện thoại:</label></td><td><input type="text" name="phone" id="phone" /></td>\
                    </tr>\
                    <tr>\
                        <td><label for="content_request">Nội dung:</label></td>\
                        <td><textarea name="content_request" id="content_request" style="height:80px;">Tôi muốn tìm vé cho chuyến bay từ '+SourceCity+' đi '+DesCity+' vào ngày '+Departdate+' cho '+PassengerText+' </textarea></td>\
                    </tr>\
                    <tr>\
                        <td></td><td><input type="submit" name="sm_request" id="sm_request" value="Gửi" class="btn_send btn-flat-red"/></td>\
                    </tr>\
                </table>\
            </form>\
        </div>\
    </div>';
    return html;
}

function generateform(depdate,retdate){
    var htmlform='<input name="loaive" value="'+Direction+'">\
                    <input name="departCity_hidden1" value="'+Source+'">\
                    <input name="returnCity_hidden1" value="'+Destination+'">\
                    <input name="flights-checkin" value="'+depdate+'">\
                    <input name="flights-checkout" value="'+retdate+'">\
                    <input name="adt_nd" value="'+Adult+'">\
                    <input name="chd_nd" value="'+Child+'">\
                    <input name="INF" value="'+Infant+'">\
                    <input name="departCity" value="'+SourceCity+'">\
                    <input name="returnCity" value="'+DesCity+'">';
    $("#frmchangedate").html(htmlform);
}