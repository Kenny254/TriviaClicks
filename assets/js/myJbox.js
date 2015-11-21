$(document).ready(function() {
    var jb_this;
    var jb_this1;
    var toolId;
    var followw;
    var toolName;
    $('.button0').hover(function() {
        jb_this = $(this);
    });

    $('.others').jBox('Tooltip', {
                //content: $("#toolbar-options"),
                //title: 'Please Select...',
                pointer: 'right: 30, center: 0',
                animation: {open: 'zoomIn', close: 'zoomOut'},
                position: {x: 'center', y: 'bottom'},
                theme: 'TooltipDark',
                offset: {x: 0, y: 12},
                closeOnMouseleave: true,
                getContent: 'data-name'
            });
    
    $('.button0').jBox('Tooltip', {
                //content: $("#toolbar-options"),
                //title: 'Please Select...',
                pointer: 'right: 30, center: 0',
                animation: {open: 'flip', close: 'flip'},
                position: {x: 'center', y: 'bottom'},
                width: 190,
                offset: {x: 0, y: 12},
                closeOnMouseleave: true,
                onOpen: function () {
                    toolId = $(jb_this).data('id');
                    lilImage = $(jb_this).data('img');
                    toolName = $(jb_this).data('name');
                    followw = $(jb_this).data('follow');
                    $("#toolbar-options").attr('class', "class-"+toolId);
                            $('#followId').attr(
                                "value", toolId
                            );
                            $('#playButton').attr(
                                "href", "Ingame/play/"+toolId
                            );
                            $('.lilImg').attr('src', lilImage);
                            $('.follow').html(followw);

                            this.setTitle(toolName);
                            this.setContent($(".class-"+toolId));
                }
            });
    //$('#business').hide();
    //$('.busAppend').hide();
    //
    //
    
    //
    //
    //
    //Ajax Query for the "Business" Bar.
    //This call all images along with their properties from the db onPageLoad :).
    //
    $.ajax({
        url: 'Topics/busQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button1' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner1').hide();
                $('#business').append(options);
                $('.button1').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button1').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name');
                            lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    );
                                    $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    //
    //
    ////Ajax Query for the "Educational" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/eduQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button2' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner2').hide();
                $('#educ').append(options);
                $('.button2').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button2').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name');
                            lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    );
                                    $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    //
    //
    ////Ajax Query for the "Entertainment" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/entQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button3'  data-img='"+val['objUrl']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner3').hide();
                $('#ent').append(options);
                $('.button3').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button3').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name');
                            followw = $(jb_this).data('follow');  lilImage = $(jb_this).data('img');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    );  $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });

    //
    //
    ////Ajax Query for the "Food and drinks" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/foodQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button4' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner4').hide();
                $('#food').append(options);
                $('.button4').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button4').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });

    //
    //
    ////Ajax Query for the "Game" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/gameQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button5' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner5').hide();
                $('#game').append(options);
                $('.button5').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button5').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name');
                            followw = $(jb_this).data('follow'); lilImage = $(jb_this).data('img');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    
    //
    //
    ////Ajax Query for the "General" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/artQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button6' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner6').hide();
                $('#art').append(options);
                $('.button6').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button6').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    
    //
    //
    ////Ajax Query for the "History" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/histQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button7' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner7').hide();
                $('#hist').append(options);
                $('.button7').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button7').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });

    //
    //
    ////Ajax Query for the "Literature" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/litQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button8' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner8').hide();
                $('#lit').append(options);
                $('.button8').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button8').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    })
    
    //
    //
    ////Ajax Query for the "Movies" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/movQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button9' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner9').hide();
                $('#mov').append(options);
                $('.button9').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button9').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    
    //
    //
    ////Ajax Query for the "Music" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/musQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button10' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner10').hide();
                $('#mus').append(options);
                $('.button10').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button10').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    
    //
    //
    ////Ajax Query for the "Nature" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/natQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button11' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner11').hide();
                $('#nat').append(options);
                $('.button11').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button11').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    
    //
    //
    ////Ajax Query for the "Science" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/sciQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button12' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner12').hide();
                $('#sci').append(options);
                $('.button12').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button12').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    
    //
    //
    ////Ajax Query for the "Sports" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/spoQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button13' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner13').hide();
                $('#spo').append(options);
                $('.button13').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button13').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    
    //
    //
    ////Ajax Query for the "Tv" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/tvQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button14' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner14').hide();
                $('#tv').append(options);
                $('.button14').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button14').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });
    
    //
    //
    ////Ajax Query for the "The World" Bar.
    //This call all images along with their properties from the db onPageLoad :)
    $.ajax({
        url: 'Topics/worldQuery',
        type: 'GET',
        success: function(data) {
            var sdata = jQuery.parseJSON(data);
                var options = "";
                $.each(sdata, function(index, val) {
                    //console.log(sdata);
                    //<img src="" alt="">
                    //alert(val['objFollow']);
                    options+="<span value='' class='button15' data-img='"+val['lilImg']+"' data-follow='"+val['objFollow']+"' data-id='"+val['objId']+"' data-name='"+val['objName']+"' style='margin-right: 4px; cursor: pointer;'><img src="+val['objUrl']+" alt=''></span>";
                });
                $('#spinner15').hide();
                $('#world').append(options);
                $('.button15').mouseover(function() {
                    jb_this = $(this);
                });
                $('.button15').jBox('Tooltip', {
                        //content: $("#toolbar-options"),
                        //title: 'Please Select...',
                        pointer: 'right: 30, center: 0',
                        animation: {open: 'flip', close: 'flip'},
                        width: 190,
                        position: {x: 'center', y: 'bottom'},
                        offset: {x: 0, y: 12},
                        closeOnMouseleave: true,
                        onOpen: function () {
                            toolId = $(jb_this).data('id');
                            toolName = $(jb_this).data('name'); lilImage = $(jb_this).data('img');
                            followw = $(jb_this).data('follow');
                            $("#toolbar-options").attr('class', "class-"+toolId);
                                    $('#followId').attr(
                                        "value", toolId
                                    );
                                    $('#playButton').attr(
                                        "href", "Ingame/play/"+toolId
                                    ); $('.lilImg').attr('src', lilImage);
                                    $('.follow').html(followw);
                                    //alert(toolId);
                                    this.setTitle(toolName);
                                    this.setContent($(".class-"+toolId));
                        }
                });
            
            console.log(sdata);
            
        
        },
        error: function (xhr) {
        //alert(xhr);
        }
    });

    // $('.follow').hover(function(){
    //     $(this).attr("src", "../assets/images/follow2.png");
    // },
    // function(){
    //     $(this).attr("src", "../assets/images/follow1.png");
    // });

    $('.play').hover(function(){
        $(this).attr("src", "../assets/images/play2.png");
    },
    function(){
        $(this).attr("src", "../assets/images/play1.png");
    });

    
    $('.follow').click(function() {
        /* Act on the event */
        
        var followButton = $(this).html();
        var followId = $('#followId').attr("value");
        var theUrl = $(this).data('url');
        var theSecondUrl = $(this).data('uri');
        //$('#btnSpan').html('<b>Please Wait..</b>');

        if(followButton.indexOf("Follow") > -1){
            //alert(theUrl+" Unfollowing");
            //
            // $(jb_this).data('follow', 'Unfollow');
            //
            //
            var async1 = $.ajax({
                url: theUrl,
                type: 'GET',
                data: 'val='+followId,
                success: function(data){
                    //console.log(data);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });

            $.when(async1).done(function(result) {
            // ... do this when it's are successful ...
                if(JSON.stringify(result).indexOf('true') > -1){
                        $(jb_this).data('follow', 'Unfollow');  
                        $('.follow').html('Unfollow');
                    }else{
                        $(jb_this).data('follow', 'Follow');
                        $('.follow').html('Follow');
                    }
            });

        }else{
            //$(jb_this).data('follow', 'Follow');
            var async2 = $.ajax({
                url: theSecondUrl,
                type: 'GET',
                data: 'val='+followId,
                success: function(data){
                    // if(JSON.stringify(data).indexOf('true') > -1){  
                    //     $(jb_this).data('follow', 'Follow');
                    //     $('.follow').html('Follow');
                    // }else{
                    //     $('.follow').html('Unfollow');
                    // }
                    // console.log(data);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });

            $.when(async2).done(function(result2) {
            // ... do this when it's are successful ...
                if(JSON.stringify(result2).indexOf('true') > -1){
                        $(jb_this).data('follow', 'Follow');  
                        $('.follow').html('Follow');
                    }else{
                        $(jb_this).data('follow', 'unFollow');
                        $('.follow').html('Unfollow');
                    }
            });
            
        }
    });

});