$(document).ready(function () {
        $("cv-forms").each(function () {
            $(this).data("validator").settings.success = false;
        });
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
        /*
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
         //noinspection JSUnresolvedFunction
         $(document).ajaxComplete(function (status, text) {

         });

         /*******************slide toggle *************************/
        var slideHeader = $('[slide-header=true]');
        slideHeader.next().hide();
        slideHeader.first().next().show();
        slideHeader.click(function () {
            var content = $(this).next();
            if (!(content.is(":visible"))) {   //no - its hidden - slide all the other open tabs to hide 
                $('[slide-toggle=true]').hide();
                // open up the content needed         
                content.slideToggle(800);
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
            if (value.length > 0) {
                $.ajax({
                    //type: "GET",
                    //url: "/CV/"+key+"/edit",
                    type: "PUT",
                    url: "/CV/" + key,
                    data: $(this).serialize(),
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
                url: "/CV/" + key,
                data: dataString,
                cache: false,
                success: function (html) {

                }
            });
        });
        /*****************show CV*************************/
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
        /********************************** validate ***********************************/
        var currentTime = new Date();
        var year = currentTime.getFullYear();
        var validator = $("#cv-forms").validate(
            {
                rules: {
                    Year: {
                        required: true,
                        digits: true,
                        range: [1950, year]
                    },
                    Month: {
                        required: true,
                        digits: true,
                        range: [1, 12]

                    },
                    Content: {
                        required: true
                    },
                    "study_time": {
                        required: true,
                        digits: true,
                        min: 1
                    },
                    "work_time": {
                        required: true,
                        digits: true,
                        min: 1
                    },
                    name: {
                        required: true
                    }
                },
                messages: {
                    Year: {
                        range: jQuery.validator.format("Năm phải lớn hơn {0} và nhỏ hơn số năm hiện tại "),
                        required: "Bạn chưa điền đủ thông tin cho trường năm"
                    },
                    Content : {
                        required: "Bạn chưa điền đủ thông tin cho các trường  "
                    },
                    Month: {
                        required: "Bạn chưa điền đủ thông tin cho trường tháng "
                    },
                    name : {
                        required: "Bạn chưa điền đủ thông tin cho trường tên kĩ năng ",
                    },
                    study_time : {
                        required: "Bạn chưa điền đủ thông tin cho trường thời gian học  ",
                    },
                    work_time : {
                        required: "Bạn chưa điền đủ thông tin cho trường thời gian làm việc ",
                    }
                },
                errorElement: "div",
                errorPlacement: function (error, element) {
                    var react = element.closest('tbody').attr('data-response');
                    if (element.attr("name") == "Year" || element.attr("name") == "Month" || element.attr("name") == "Content" || element.attr("name") == "study_time" || element.attr("name") == "work_time" || element.attr("name") == "name") {
                        error.insertAfter("#" + react + "_0");
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

        jQuery.extend(jQuery.validator.messages, {
            required: "Bạn chưa điền đủ thông tin",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "Bạn phải điền số .",
            digits: "Bạn phải điền số.",
            ditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            accept: "Please enter a value with a valid extension.",
            maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
            minlength: jQuery.validator.format("Please enter at least {0} characters."),
            rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
            range: jQuery.validator.format("Điền số trong khoảng {0} đến {1}."),
            max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
            min: jQuery.validator.format("Bạn phải điền số lớn hơn {0}.")
        });
        /******************Editable Table********************/
        // records table
        $(document).mouseup(function () {
            $(".editbox").hide();
            $(".jShow").show();
        });

    function resetTable() {
            //prevent repeat binding or bind only local element
            $('[name=increase]')
                .unbind("click", Add)
                .bind("click", Add);
            $('[name=delete]')
                .unbind("click", Delete)
                .bind("click", Delete);
            $('[name=edit]')
                .unbind("click", editCell)
                .bind("click", editCell);
        }

        resetTable();
        function editCell() {
            var ID = $(this).closest('tr').attr('id');//record/skill id
            var url = $(this).attr('data-table');
            var cell = $(this).find("#cell_input_" + ID);
            var cellContent = $(this).children('#cell_' + ID);
            var old = cell.val();
            cellContent.hide();
            cell.show();
            $(this).change(function () {
                if (validator.element(cell)) {

                    $.ajax({
                        type: "PUT",
                        url: "/" + url + "/" + ID,
                        data: cell.serialize(),
                        cache: false,
                        success: function (html) {
                            cellContent.html(cell.val());
                            cell.hide();
                            cellContent.show();

                        }
                    });
                }

            });

        }


        function Add(e) {

            var elements = $(this).closest('tr').next().clone();
            var dataReact = elements.attr('data-react');
            elements.appendTo('.editable-table tbody[data-response=' + dataReact + ']');
            elements.show();
            elements.find("[name=save]").bind("click", Save);
            $(this).unbind("click", Add);
        }

        function Save(e) {

            var tr_e = $(this).closest('tr');
            var url = tr_e.attr('newrow');
            var tds = tr_e.children("td");
            var input1 = tds.eq(1).children("input[type=text]");//year
            var inputs = tr_e.find("td input[type=text]");
            var dataString = inputs.serialize()
                + "&id=" + tr_e.attr('id') + "&data-react=" + tr_e.attr('data-react');
            //id - cv
            var t = 1;
            inputs.each(function () {
                if (validator.element($(this)) == false) t = false;
            });
            if (t) {
                $.ajax({
                    type: "POST",
                    url: "/" + url,
                   data: dataString,
                    cache: false,
                    success: function (react) {
                        $(" #" + react).load(location.href + " #" + react + ">*", function () {
                            resetTable();
                        });
                    }
                });
            }
        }

        function Delete() {
            var tr_e = $(this).closest('tr'); //tr 
            var ID = tr_e.attr('id');//record id
            var url = $(this).closest('td').prev().attr('data-table');
            $.ajax({
                type: "DELETE",
                url: "/" + url + "/" + ID,
                data: "",
                cache: false,
                success: function (react) {
                    $(" #" + react).load(location.href + " #" + react + ">*", function () {
                        resetTable();
                    });

                }
            });
        }


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
                    url: "/CV/search",
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
        }

        //sort
        $("[data-table=table-resume] .tabs li").on('click', function () {
            var value = $(this).attr("data-keyword");
            var dataSort = $(this).attr("data-sort");
            var dataField = $(this).attr("data-field");
            var dataString = 'keyword=' + value + "&data-sort=" + dataSort + "&data-field=" + dataField;
            if (dataSort == "desc") {
                $(this).attr("data-sort", "asc");
            }
            else $(this).attr("data-sort", "desc");
            if (1) {

                $.ajax({
                    type: "GET",
                    url: "/CV/search",
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
                    url: "/User/search",
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

        }

        //sort
        $("[data-table=table-user] .tabs li").on('click', function () {
            var value = $(this).attr("data-keyword");
            var dataSort = $(this).attr("data-sort");
            var dataField = $(this).attr("data-field");
            var dataString = 'keyword=' + value + "&data-sort=" + dataSort + "&data-field=" + dataField;
            if (dataSort == "desc") {
                $(this).attr("data-sort", "asc");
            }
            else $(this).attr("data-sort", "desc");
            if (1) {

                $.ajax({
                    type: "GET",
                    url: "/User/search",
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

                    $('#dropzone').find('div').html($img);
                };

            } else {
                var ext = file.name.split('.').pop();

                $('#dropzone').find('div').html(ext);
            }
        });


    }
);


