var postCount = 10;
var waypoint = new Waypoint({
    element: document.getElementById('load-more-button-profile'),
    handler: function(direction) {
        if(direction == "down"){

//             alert("Waypoints Triggered down");
            $.ajax({
                type: "POST",
                url: "../post/infiniteLoad/" + postCount + "/true",
                processData: false,
                contentType: false
            }).done(function(response){
                // console.log($(this));
//                 console.log(response);
                $("#ajaxLoadinfoProfile").append(response);
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