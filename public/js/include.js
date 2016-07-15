$(document).ready(function () {
    
    var url = '';
    
        /*************************fix navbar*************************************/
        var nav = $('.navbar');
        var num = $('body').offset().top;
        $(window).bind('scroll', function () {
            if ($(this).scrollTop() > num) {
                nav.addClass("nav_fixed");
            } else {
                num = $('body').offset().top;
                nav.removeClass("nav_fixed");
            }
        });
        var notify = $('[notification=true]'), timer;
        $(document).ajaxStart(function () {

            timer && clearTimeout(timer);
            timer = setTimeout(function () {
                //notify.html("Loading...");
                notify.show();
            }, 10000);
        });

        $(document).ajaxStop(function () {
            clearTimeout(timer);
            notify.hide();
        });
        $(document).ajaxComplete(function (status, text) {

        });

        /*******************slide toggle *************************/
        $('[slide-header=true]').next().hide();
        $('[slide-header=true]').first().next().show();
        $('[slide-header=true]').click(function () {
            $content = $(this).next();
            if (!($content.is(":visible"))) {   //no - its hidden - slide all the other open tabs to hide        
                $('[slide-toggle=true]').hide();
                // open up the content needed         
                $content.slideToggle(800);
            }
        });
        /***************Auto-submit*******************************/

        $("[editable=Rirekisho]").click(function () {

            var key = $(this).attr('id');
            var name = $(this).attr("name");
            var sucess_status = $("#s_" + name + "_" + key);
            sucess_status.hide();
        }).change(function () {
            var key = $(this).attr('id');
            var name = $(this).attr("name");
            var sucess_status = $("#s_" + name + "_" + key);
            var value = $(this).val();
            var dataString = name + '=' + value;
            console.log(dataString);
            if (value.length > 0) {
                $.ajax({
                    //type: "GET",
                    //url: "/CV/"+key+"/edit",
                    type: "PUT",
                    url: url + "/CV/" + key,
                    data: dataString,
                    cache: false,
                    success: function (html) {
                        sucess_status.show(20);
                    }
                });
            }
            else {
                alert('Enter something.');
            }

        });
        /******************radio button********************/
        $('input[type=radio][editable=Rirekisho]').change(function () {
            var key = $(this).attr('id');
            var name = $(this).attr("name");
            var dataString = name + '=' + this.value;
            $.ajax({
                type: "PUT",
                url: url + "/CV/" + key,
                data: dataString,
                cache: false,
                success: function (html) {

                }
            });
        });

        /******************Editable Table********************/
        $('[editable=Record]').click(function () {
            var ID = $(this).closest('tr').attr('id');//record id
            $(this).find("#cell_" + ID).hide();
            $(this).find("#cell_input_" + ID).show();
        }).change(function () {
            var ID = $(this).closest('tr').attr('id');
            var cell = $(this).find("#cell_input_" + ID).val();
            var name = $(this).find("#cell_input_" + ID).attr("name");
            var cell2 = $(this).children("#cell_" + ID);
            if (cell.length > 0) {
                $.ajax({
                    type: "PUT",
                    url: url + "/Record/" + ID,
                    data: name + '=' + cell,
                    cache: false,
                    success: function (html) {
                        cell2.html(cell);
                    }
                });
            }
            else {
                alert('Enter something.');
            }

        });
        $(".clickable li a").on('click', function () {
            var name = $(this).attr('name');//show
            $(".bd").hide();
            $("#" + name).show();
            $("#p-active").removeAttr('id');
            $(this).children('i').attr("id", "p-active");
        });
        $(".skippable li a").on('click', function () {
            var name = $(this).attr('href');

            $("#p-active").removeAttr('id');
            $(this).children('i').attr("id", "p-active");
        });


        $(document).mouseup(function () {
            $(".editbox").hide();
            $(".jShow").show();
        });

        /******************New row********************/

        $("[name=delete]").bind("click", Delete);
        $('[name=increase]').bind("click", Add);
        function Add() {
            var elements = $('[newrow=true]').clone();
            elements.appendTo('.editable-table tbody');
            elements.removeAttr("newrow");
            elements.show();
            $("[name=save]").bind("click", Save);
            $("[name=increase]").unbind("click");
        };

        function Save() {
            var tr_e = $(this).closest('tr');
            var tdButtons = tr_e.children("td:nth-child(4)");
            var tds = tr_e.children("td");
            var input1 = tds.eq(1).children("input[type=text]");//year
            var input2 = tds.eq(2).children("input[type=text]");//month
            var input3 = tds.eq(3).children("input[type=text]");
            var dataString = input1.attr('name') + "=" + input1.val()
                + "&" + input2.attr('name') + "=" + input2.val()
                + "&" + input3.attr('name') + "=" + input3.val()
                + "&id=" + tr_e.attr('id') + "&data-react=" + tr_e.attr('data-react');
            //id - key 
            if (input3.val().length > 0) {
                $.ajax({
                    type: "GET",
                    url: url + "/Record/create",
                    data: dataString,
                    cache: false,
                    success: function (react) {
                        $(" #" + react).load(location.href + " #" + react + ">*", function () {
                            $('[name=increase]').bind("click", Add);
                            $("[name=delete]").bind("click", Delete);

                        });
                    }

                });
            } else {
                alert('Enter something.');
            }
            $("[name=delete]").bind("click", Delete);
        };

        function Delete() {
            var tr_e = $(this).closest('tr'); //tr 
            var ID = tr_e.attr('id');//record id
            $.ajax({
                type: "DELETE",
                url: url + "/Record/" + ID,
                data: "",
                cache: false,
                success: function (react) {
                    $(" #" + react).load(location.href + " #" + react + ">*", function () {
                        $("[name=delete]").bind("click", Delete);
                        $('[name=increase]').bind("click", Add);
                    });

                }
            });
        };
        /**********************************End editable*********************************/
        $('[data-table=table-resume] input#table-search').bind("change blur", Search);
        function Search() {
            //$('input#table-search').bind("blur", Search); 
            var value = $(this).val();
            var dataString = 'keyword=' + value;
            $('input#table-search').off();
            if (value.length >= 0) {
                $.ajax({
                    type: "GET",
                    url: url + "/CV/search",
                    data: dataString,
                    cache: false,
                    success: function (html) {
                        $(" [data-reload=true]").html(html);
                        $("ul.pagination").hide();// hide pagination
                        $("#number-result").show();
                        $(".tabs li").attr("data-keyword", value);
                        $('input#table-search').bind("change blur", Search);
                    }
                });
            }
        };
        $("[data-table=table-resume] .tabs li").on('click', function () {
            var value = $(this).attr("data-keyword");
            var dataSort = $(this).attr("data-sort");
            var dataField = $(this).attr("data-field");
            dataString = 'keyword=' + value + "&data-sort=" + dataSort + "&data-field=" + dataField;
            if (dataSort == "desc") {
                $(this).attr("data-sort", "asc");
            }
            else $(this).attr("data-sort", "desc");
            if (1) {

                $.ajax({
                    type: "GET",
                    url: url + "/CV/search",
                    data: dataString,
                    cache: false,
                    success: function (html) {
                        $(" [data-reload=true]").html(html);
                    }
                });

            }
        });

        /*$("[data-table=table-user] .tabs li").on('click', function()
         {
         var value = $(this).attr("data-keyword") ;
         var dataSort = $(this).attr("data-sort");
         var dataField = $(this).attr("data-field");
         dataString = 'keyword='+value+"&data-sort="+dataSort +"&data-field="+dataField;

         window.location.replace("/User/search?"+dataString);

         if(dataSort == "desc"){$(this).attr("data-sort","asc");}
         else $(this).attr("data-sort","desc");
         });
         $('[data-table=table-user] input#table-search').bind("change blur", Search1);
         function Search1()
         {
         var value = $(this).val() ;
         var dataString = 'keyword='+value ;
         $('this').off();
         if(value.length>=0)
         {
         window.location.replace("/User/search?"+dataString);
         $(".tabs li").attr("data-keyword", value);
         $('this').bind("change blur", Search1);

         }

         };*/
        /*
         *
         *
         ******/
        $('[data-table=table-user] input#table-search').bind("change blur", Search1);
        function Search1() {
            //$('input#table-search').bind("blur", Search); 
            var value = $(this).val();
            var dataString = 'keyword=' + value;
            $('input#table-search').off();
            if (value.length >= 0) {
                $.ajax({
                    type: "GET",
                    url: url + "/User/search",
                    data: dataString,
                    cache: false,
                    success: function (html) {
                        $(" [data-reload=true]").html(html);
                        $("ul.pagination").hide();
                        $("#number-result").show();
                        $(".tabs li").attr("data-keyword", value);
                        $('[data-table=table-user] input#table-search').bind("change blur", Search1);
                    }
                });
            }

        };
        $("[data-table=table-user] .tabs li").on('click', function () {
            var value = $(this).attr("data-keyword");
            var dataSort = $(this).attr("data-sort");
            var dataField = $(this).attr("data-field");
            dataString = 'keyword=' + value + "&data-sort=" + dataSort + "&data-field=" + dataField;
            if (dataSort == "desc") {
                $(this).attr("data-sort", "asc");
            }
            else $(this).attr("data-sort", "desc");
            if (1) {

                $.ajax({
                    type: "GET",
                    url: url + "/User/search",
                    data: dataString,
                    cache: false,
                    success: function (html) {
                        $(" [data-reload=true]").html(html);
                        $("ul.pagination").hide();
                    }
                });

            }
        });
        /***************User profile**********************/

        //dropzone handle 
        $('#dropzone').on('dragover', function () {
            $(this).addClass('hover');
        });

        $('#dropzone').on('dragleave', function () {
            $(this).removeClass('hover');
        });

        $('#dropzone input').on('change', function (e) {
            var file = this.files[0];

            $('#dropzone').removeClass('hover');
            //validation 
            if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
                return alert('File type not allowed.');
            }
            var size = file.size;

            //end validation 
            $('#dropzone').addClass('dropped');
            $('#dropzone img').remove();

            if ((/^image\/(gif|png|jpeg|jpg)$/i).test(file.type)) {
                var reader = new FileReader(file);

                reader.readAsDataURL(file);
                reader.onload = function (e) {
                    var data = e.target.result,
                        $img = $('<img />').attr('src', data).fadeIn();

                    $('#dropzone div').html($img);
                };

            } else {
                var ext = file.name.split('.').pop();

                $('#dropzone div').html(ext);
            }
        });


    }
);


