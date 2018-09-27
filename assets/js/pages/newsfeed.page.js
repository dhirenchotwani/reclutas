$(".reasons_list").select2()

var clicked = 0;
var postCount = 10;
$(".show_link").on("click", function(){
    if(clicked){
        $("#link_div").attr("hidden", "true");
        $("#news_feed_name").val("");
        $("#select_image").removeAttr("hidden");
    } else{
        $("#link_div").removeAttr("hidden");
    }
    clicked = !clicked;
    console.log(clicked);
});
$(document).ready(function(){
    $("#status").fadeOut();
    $("#preloader_newsfeed").fadeOut("slow");
});

$("#news_feed_media").on("change",function(e){
    if(e.target.files[0].name != ""){
        $("#news_feed_name").val("");
        $(".show_link").attr("hidden" , true);
        $("#link_div").attr("hidden", true);
        $("#image_name_container").removeAttr("hidden");
        $("#image_name").val(e.target.files[0].name);
        $("#post_status").addClass("mt-3");
    }else{
        $("#image_name").val("");
        $(".show_link").removeAttr("hidden");
        $("#image_name_container").attr("hidden", true);
        $("#post_status").removeClass("mt-3");
    }
});

$("#news_feed_name").on("keyup" , function(){
    if(($("#news_feed_name").val()) == ""){
        $("#select_image").removeAttr("hidden");
    }else{
        $("#select_image").attr("hidden" , true);
    }
});

$("#removeSelectedFile").on("click", function(){
    $("#image_name").val("");
    $(".show_link").removeAttr("hidden");
    $("#image_name_container").attr("hidden", true);
    $("#post_status").removeClass("mt-3");
});

$(".like_post").on("click",function(e){
    var post_id = $(this).data("post_id");
    //window.alert(post);
    var fd = new FormData();
    fd.append("post_id",post_id);

    $.ajax({
        type: "POST",
        url: "../ajaxhelper/like_post/" + post_id,
        data: fd,
        processData: false,
        contentType: false
    }).done(function(response){
        $span = $("span[data-post_id="+post_id+"]");
        $span.text(response);
        //console.log($(this));
    }).fail(function(response){
        console.log(response);
    })
});

var post_id;

$(".report_post").on("click",function(e){
    post_id = $(this).data("post_id");
    //window.alert(post_id);
});

$(".share_post").on("click",function(e){
    post = $(this).data("post_id");
    //window.alert(post);
});

$("#report_news_feed_button").on("click",function(){
    //window.alert("JHI");
    var report_reason_id = $("#report_reason_id").val();
    //window.alert(report_reason_id + "ID OF POST = " + post_id);

    $.ajax({
        type: "POST",
        url: "../ajaxhelper/report_post/" + post_id + "/" + report_reason_id,
        processData: false,
        contentType: false
    }).done(function(response){
        window.location.href = response;
    }).fail(function(response){
        console.log(response);
    })



});

var waypoint = new Waypoint({
    element: document.getElementById('load-more-button'),
    handler: function(direction) {
        if(direction == "down"){

            // alert("Waypoints Triggered down");
            $.ajax({
                type: "POST",
                url: "../post/infiniteLoad/" + postCount + "/true",
                processData: false,
                contentType: false
            }).done(function(response){
                // console.log($(this));
                // console.log(response);
                $("#ajaxLoadInfo").append(response);
                $(".report_post").on("click",function(e){
                    post_id = $(this).data("post_id");
                    /*window.alert(post_id);*/
                });
                postCount += 10;
                console.log(postCount);
            }).fail(function(response){
                console.log(response);
            })
        }
    },
    offset: function () {
        return this.context.innerHeight() - this.adapter.outerHeight() + 100
    },
});
$(document).ready(function(){
   var post;
$(".delete_post").on("click",function(e) {
    post = $(this).data("post_id");
    window.alert(post);
});

$("#delete_post").on("click",function(e){
   window.alert("Hi");
    var fd = new FormData();
    fd.append("post_id",post);

    $.ajax({
        type: "POST",
        url: "../Dashboard/deletePost/" + post,
        data: fd,
        processData: false,
        contentType: false
    }).done(function(response){
        window.location.href = "../post/show_newsfeed?show_notification=1&postdeleted=1";
    }).fail(function(response){
        console.log(response);
    })
});

$("#delete_skill").on("click",function(e){
    var fd = new FormData();
    fd.append("post_id",post);

    $.ajax({
        type: "POST",
        url: "../Dashboard/deleteSkill/" + post,
        data: fd,
        processData: false,
        contentType: false
    }).done(function(response){
        window.location.href = "../dashboard/show_profile_about?show_notification=1&postdeleted=1";
    }).fail(function(response){
        console.log(response);
    })
});
 
});
