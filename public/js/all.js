$(document).ready(function(){function t(){$("[name=increase]").unbind("click",a).bind("click",a),$("[name=delete]").unbind("click",n).bind("click",n),$("[name=edit]").unbind("click",e).bind("click",e)}function e(){var t=$(this).closest("tr").attr("id"),e=$(this).attr("data-table"),a=$(this).find("#cell_input_"+t),i=$(this).children("#cell_"+t);a.val();i.hide(),a.show(),$(this).change(function(){u.element(a)&&$.ajax({type:"PUT",url:"/"+e+"/"+t,data:a.serialize(),cache:!1,success:function(t){i.html(a.val()),a.hide(),i.show()}})})}function a(t){var e=$(this).closest("tr").next().clone(),n=e.attr("data-react");e.appendTo(".editable-table tbody[data-response="+n+"]"),e.show(),e.find("[name=save]").bind("click",i),$(this).unbind("click",a)}function i(e){var a=$(this).closest("tr"),i=a.attr("newrow"),n=a.children("td"),r=(n.eq(1).children("input[type=text]"),a.find("td input[type=text]")),s=r.serialize()+"&id="+a.attr("id")+"&data-react="+a.attr("data-react"),d=1;r.each(function(){0==u.element($(this))&&(d=!1)}),d&&$.ajax({type:"POST",url:"/"+i,data:s,cache:!1,success:function(e){$(" #"+e).load(location.href+" #"+e+">*",function(){t()})}})}function n(){var e=$(this).closest("tr"),a=e.attr("id"),i=$(this).closest("td").prev().attr("data-table");$.ajax({type:"DELETE",url:"/"+i+"/"+a,data:"",cache:!1,success:function(e){$(" #"+e).load(location.href+" #"+e+">*",function(){t()})}})}function r(){var t=$(this).val(),e="keyword="+t;$("input#table-search").off(),t.length>=0&&$.ajax({type:"GET",url:"/CV/search",data:e,cache:!1,success:function(e){$(" [data-reload=true]").html(e),$("ul.pagination").hide(),$("#number-result").show(),$(".tabs li").attr("data-keyword",t),$("input#table-search").bind("change blur",r)}})}function s(){var t=$(this).val(),e="keyword="+t;$("input#table-search").off(),t.length>=0&&$.ajax({type:"GET",url:"/User/search",data:e,cache:!1,success:function(e){$(" [data-reload=true]").html(e),$("ul.pagination").hide(),$("#number-result").show(),$(".tabs li").attr("data-keyword",t),$("[data-table=table-user] input#table-search").bind("change blur",s)}})}$("cv-forms").each(function(){$(this).data("validator").settings.success=!1});var d=$(".navbar"),c=$("body").offset().top;$(window).bind("scroll",function(){$(this).scrollTop()>c?d.addClass("nav_fixed"):(c=$("body").offset().top,d.removeClass("nav_fixed"))});var o=$("[slide-header=true]");o.next().hide(),o.first().next().show(),o.click(function(){var t=$(this).next();t.is(":visible")||($("[slide-toggle=true]").hide(),t.slideToggle(800))}),$("[editable=Rirekisho]").click(function(){var t=$(this).attr("id"),e=$(this).attr("name"),a=$("#s_"+e+"_"+t);a.hide()}).change(function(){var t=$(this).attr("id"),e=$(this).attr("name"),a=$("#s_"+e+"_"+t),i=$(this).val();i.length>0?$.ajax({type:"PUT",url:"/CV/"+t,data:$(this).serialize(),cache:!1,success:function(t){a.show(20)}}):alert("Enter something.")}),$("input[type=radio][editable=Rirekisho]").change(function(){var t=$(this).attr("id"),e=$(this).attr("name"),a=e+"="+this.value;$.ajax({type:"PUT",url:"/CV/"+t,data:a,cache:!1,success:function(t){}})}),$(".clickable li a").on("click",function(){var t=$(this).attr("name");$(".bd").hide(),$("#"+t).show(),$("#p-active").removeAttr("id"),$(this).children("i").attr("id","p-active")}),$(".skippable li a").on("click",function(){$(this).attr("href");$("#p-active").removeAttr("id"),$(this).children("i").attr("id","p-active")});var l=new Date,h=l.getFullYear(),u=$("#cv-forms").validate({rules:{Year:{required:!0,digits:!0,range:[1950,h]},Month:{required:!0,digits:!0,range:[1,12]},Content:{required:!0},study_time:{required:!0,digits:!0,min:1},work_time:{required:!0,digits:!0,min:1},name:{required:!0}},messages:{Year:{range:jQuery.validator.format("Năm phải lớn hơn {0} và nhỏ hơn số năm hiện tại "),required:"Bạn chưa điền đủ thông tin cho trường năm"},Content:{required:"Bạn chưa điền đủ thông tin cho các trường  "},Month:{required:"Bạn chưa điền đủ thông tin cho trường tháng "},name:{required:"Bạn chưa điền đủ thông tin cho trường tên kĩ năng "},study_time:{required:"Bạn chưa điền đủ thông tin cho trường thời gian học  "},work_time:{required:"Bạn chưa điền đủ thông tin cho trường thời gian làm việc "}},errorElement:"div",errorPlacement:function(t,e){var a=e.closest("tbody").attr("data-response");"Year"==e.attr("name")||"Month"==e.attr("name")||"Content"==e.attr("name")||"study_time"==e.attr("name")||"work_time"==e.attr("name")||"name"==e.attr("name")?t.insertAfter("#"+a+"_0"):t.insertAfter(e)}});jQuery.extend(jQuery.validator.messages,{required:"Bạn chưa điền đủ thông tin",remote:"Please fix this field.",email:"Please enter a valid email address.",url:"Please enter a valid URL.",date:"Please enter a valid date.",dateISO:"Please enter a valid date (ISO).",number:"Bạn phải điền số .",digits:"Bạn phải điền số.",ditcard:"Please enter a valid credit card number.",equalTo:"Please enter the same value again.",accept:"Please enter a value with a valid extension.",maxlength:jQuery.validator.format("Please enter no more than {0} characters."),minlength:jQuery.validator.format("Please enter at least {0} characters."),rangelength:jQuery.validator.format("Please enter a value between {0} and {1} characters long."),range:jQuery.validator.format("Điền số trong khoảng {0} đến {1}."),max:jQuery.validator.format("Please enter a value less than or equal to {0}."),min:jQuery.validator.format("Bạn phải điền số lớn hơn {0}.")}),$(document).mouseup(function(){$(".editbox").hide(),$(".jShow").show()}),t(),$("[data-table=table-resume] input#table-search").bind("change blur",r),$("[data-table=table-resume] .tabs li").on("click",function(){var t=$(this).attr("data-keyword"),e=$(this).attr("data-sort"),a=$(this).attr("data-field"),i="keyword="+t+"&data-sort="+e+"&data-field="+a;"desc"==e?$(this).attr("data-sort","asc"):$(this).attr("data-sort","desc"),$.ajax({type:"GET",url:"/CV/search",data:i,cache:!1,success:function(t){$(" [data-reload=true]").html(t)}})}),$("[data-table=table-user] input#table-search").bind("change blur",s),$("[data-table=table-user] .tabs li").on("click",function(){var t=$(this).attr("data-keyword"),e=$(this).attr("data-sort"),a=$(this).attr("data-field"),i="keyword="+t+"&data-sort="+e+"&data-field="+a;"desc"==e?$(this).attr("data-sort","asc"):$(this).attr("data-sort","desc"),$.ajax({type:"GET",url:"/User/search",data:i,cache:!1,success:function(t){$(" [data-reload=true]").html(t),$("ul.pagination").hide()}})}),$("#dropzone").on("dragover",function(){$(this).addClass("hover")}),$("#dropzone").on("dragleave",function(){$(this).removeClass("hover")}),$("#dropzone input").on("change",function(t){var e=this.files[0];if($("#dropzone").removeClass("hover"),this.accept&&-1==$.inArray(e.type,this.accept.split(/, ?/)))return alert("File type not allowed.");e.size;if($("#dropzone").addClass("dropped"),$("#dropzone img").remove(),/^image\/(gif|png|jpeg|jpg)$/i.test(e.type)){var a=new FileReader(e);a.readAsDataURL(e),a.onload=function(t){var e=t.target.result,a=$("<img />").attr("src",e).fadeIn();$("#dropzone").find("div").html(a)}}else{var i=e.name.split(".").pop();$("#dropzone").find("div").html(i)}})}),$(document).ready(function(){function t(){$("[name=increase]").unbind("click",a).bind("click",a),$("[name=delete]").unbind("click",n).bind("click",n),$("[name=edit]").unbind("click",e).bind("click",e)}function e(){var t=$(this).closest("tr").attr("id"),e=$(this).attr("data-table"),a=$(this).find("#cell_input_"+t),i=$(this).children("#cell_"+t);a.val();i.hide(),a.show(),$(this).change(function(){u.element(a)&&$.ajax({type:"PUT",url:"/"+e+"/"+t,data:a.serialize(),cache:!1,success:function(t){i.html(a.val()),a.hide(),i.show()}})})}function a(t){var e=$(this).closest("tr").next().clone(),n=e.attr("data-react");e.appendTo(".editable-table tbody[data-response="+n+"]"),e.show(),e.find("[name=save]").bind("click",i),$(this).unbind("click",a)}function i(e){var a=$(this).closest("tr"),i=a.attr("newrow"),n=a.children("td"),r=(n.eq(1).children("input[type=text]"),a.find("td input[type=text]")),s=r.serialize()+"&id="+a.attr("id")+"&data-react="+a.attr("data-react"),d=1;r.each(function(){0==u.element($(this))&&(d=!1)}),d&&$.ajax({type:"POST",url:"/"+i,data:s,cache:!1,success:function(e){$(" #"+e).load(location.href+" #"+e+">*",function(){t()})}})}function n(){var e=$(this).closest("tr"),a=e.attr("id"),i=$(this).closest("td").prev().attr("data-table");$.ajax({type:"DELETE",url:"/"+i+"/"+a,data:"",cache:!1,success:function(e){$(" #"+e).load(location.href+" #"+e+">*",function(){t()})}})}function r(){var t=$(this).val(),e="keyword="+t;$("input#table-search").off(),t.length>=0&&$.ajax({type:"GET",url:"/CV/search",data:e,cache:!1,success:function(e){$(" [data-reload=true]").html(e),$("ul.pagination").hide(),$("#number-result").show(),$(".tabs li").attr("data-keyword",t),$("input#table-search").bind("change blur",r)}})}function s(){var t=$(this).val(),e="keyword="+t;$("input#table-search").off(),t.length>=0&&$.ajax({type:"GET",url:"/User/search",data:e,cache:!1,success:function(e){$(" [data-reload=true]").html(e),$("ul.pagination").hide(),$("#number-result").show(),$(".tabs li").attr("data-keyword",t),$("[data-table=table-user] input#table-search").bind("change blur",s)}})}$("cv-forms").each(function(){$(this).data("validator").settings.success=!1});var d=$(".navbar"),c=$("body").offset().top;$(window).bind("scroll",function(){$(this).scrollTop()>c?d.addClass("nav_fixed"):(c=$("body").offset().top,d.removeClass("nav_fixed"))});var o=$("[slide-header=true]");o.next().hide(),o.first().next().show(),o.click(function(){var t=$(this).next();t.is(":visible")||($("[slide-toggle=true]").hide(),t.slideToggle(800))}),$("[editable=Rirekisho]").click(function(){var t=$(this).attr("id"),e=$(this).attr("name"),a=$("#s_"+e+"_"+t);a.hide()}).change(function(){var t=$(this).attr("id"),e=$(this).attr("name"),a=$("#s_"+e+"_"+t),i=$(this).val();i.length>0?$.ajax({type:"PUT",url:"/CV/"+t,data:$(this).serialize(),cache:!1,success:function(t){a.show(20)}}):alert("Enter something.")}),$("input[type=radio][editable=Rirekisho]").change(function(){var t=$(this).attr("id"),e=$(this).attr("name"),a=e+"="+this.value;$.ajax({type:"PUT",url:"/CV/"+t,data:a,cache:!1,success:function(t){}})}),$(".clickable li a").on("click",function(){var t=$(this).attr("name");$(".bd").hide(),$("#"+t).show(),$("#p-active").removeAttr("id"),$(this).children("i").attr("id","p-active")}),$(".skippable li a").on("click",function(){$(this).attr("href");$("#p-active").removeAttr("id"),$(this).children("i").attr("id","p-active")});var l=new Date,h=l.getFullYear(),u=$("#cv-forms").validate({rules:{Year:{required:!0,digits:!0,range:[1950,h]},Month:{required:!0,digits:!0,range:[1,12]},Content:{required:!0},study_time:{required:!0,digits:!0,min:1},work_time:{required:!0,digits:!0,min:1},name:{required:!0}},messages:{Year:{range:jQuery.validator.format("Năm phải lớn hơn {0} và nhỏ hơn số năm hiện tại "),required:"Bạn chưa điền đủ thông tin cho trường năm"},Content:{required:"Bạn chưa điền đủ thông tin cho các trường  "},Month:{required:"Bạn chưa điền đủ thông tin cho trường tháng "},name:{required:"Bạn chưa điền đủ thông tin cho trường tên kĩ năng "},study_time:{required:"Bạn chưa điền đủ thông tin cho trường thời gian học  "},work_time:{required:"Bạn chưa điền đủ thông tin cho trường thời gian làm việc "}},errorElement:"div",errorPlacement:function(t,e){var a=e.closest("tbody").attr("data-response");"Year"==e.attr("name")||"Month"==e.attr("name")||"Content"==e.attr("name")||"study_time"==e.attr("name")||"work_time"==e.attr("name")||"name"==e.attr("name")?t.insertAfter("#"+a+"_0"):t.insertAfter(e)}});jQuery.extend(jQuery.validator.messages,{required:"Bạn chưa điền đủ thông tin",remote:"Please fix this field.",email:"Please enter a valid email address.",url:"Please enter a valid URL.",date:"Please enter a valid date.",dateISO:"Please enter a valid date (ISO).",number:"Bạn phải điền số .",digits:"Bạn phải điền số.",ditcard:"Please enter a valid credit card number.",equalTo:"Please enter the same value again.",accept:"Please enter a value with a valid extension.",maxlength:jQuery.validator.format("Please enter no more than {0} characters."),minlength:jQuery.validator.format("Please enter at least {0} characters."),rangelength:jQuery.validator.format("Please enter a value between {0} and {1} characters long."),range:jQuery.validator.format("Điền số trong khoảng {0} đến {1}."),max:jQuery.validator.format("Please enter a value less than or equal to {0}."),min:jQuery.validator.format("Bạn phải điền số lớn hơn {0}.")}),$(document).mouseup(function(){$(".editbox").hide(),$(".jShow").show()}),t(),$("[data-table=table-resume] input#table-search").bind("change blur",r),$("[data-table=table-resume] .tabs li").on("click",function(){var t=$(this).attr("data-keyword"),e=$(this).attr("data-sort"),a=$(this).attr("data-field"),i="keyword="+t+"&data-sort="+e+"&data-field="+a;"desc"==e?$(this).attr("data-sort","asc"):$(this).attr("data-sort","desc"),$.ajax({type:"GET",url:"/CV/search",data:i,cache:!1,success:function(t){$(" [data-reload=true]").html(t)}})}),$("[data-table=table-user] input#table-search").bind("change blur",s),$("[data-table=table-user] .tabs li").on("click",function(){var t=$(this).attr("data-keyword"),e=$(this).attr("data-sort"),a=$(this).attr("data-field"),i="keyword="+t+"&data-sort="+e+"&data-field="+a;"desc"==e?$(this).attr("data-sort","asc"):$(this).attr("data-sort","desc"),$.ajax({type:"GET",url:"/User/search",data:i,cache:!1,success:function(t){$(" [data-reload=true]").html(t),$("ul.pagination").hide()}})}),$("#dropzone").on("dragover",function(){$(this).addClass("hover")}),$("#dropzone").on("dragleave",function(){$(this).removeClass("hover")}),$("#dropzone input").on("change",function(t){var e=this.files[0];if($("#dropzone").removeClass("hover"),this.accept&&-1==$.inArray(e.type,this.accept.split(/, ?/)))return alert("File type not allowed.");e.size;if($("#dropzone").addClass("dropped"),$("#dropzone img").remove(),/^image\/(gif|png|jpeg|jpg)$/i.test(e.type)){var a=new FileReader(e);a.readAsDataURL(e),a.onload=function(t){var e=t.target.result,a=$("<img />").attr("src",e).fadeIn();$("#dropzone").find("div").html(a)}}else{var i=e.name.split(".").pop();$("#dropzone").find("div").html(i)}})});