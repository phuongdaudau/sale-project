var App = (function () {
    function list_price() {
        let slide_price1 = $(".owl-video");
        slide_price1.owlCarousel({
            items: 3,
            margin: 20,
            smartSpeed: 500,
            dot: false,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 2,
                    margin: 0,
                    nav: false,
                },
                768: {
                    items: 2,
                    dot: true,
                },
                991: {
                    items: 3,
                },
            },
        });
    }

    return {
        list_price: list_price,
    };
})();

$(document).ready(function () {
    $(".open-menu-mb").on("click", function () {
        var click = $(".open-menu-mb").attr("data-click");
        if (click == 0) {
            $(".list-menu").addClass("active");
            $(".open-menu-mb .line").addClass("active");
            $(".open-menu-mb").attr("data-click", "1");
            // $("body").css("overflow-y", "hidden");

            if (window.screen.width < 768) {
                $(".write-mb").fadeOut("slow");
                $(".login-mb").fadeIn("slow");

                // $(".write-mb").hide();
                // $(".login-mb").show();
            }
        }
        if (click == 1) {
            $(".list-menu").removeClass("active");
            $(".open-menu-mb .line").removeClass("active");
            $(".open-menu-mb").attr("data-click", "0");
            if (window.screen.width < 768) {
                $(".login-mb").fadeOut("slow");
                $(".write-mb").fadeIn("slow");

                // $(".login-mb").hide();
                // $(".write-mb").show();
            }
        }
    });

    $(".showmenu").on("click", function () {
        var click = $(this).attr("data-click");
        if (click == 0) {
            $(this).parent().find("ul").addClass("show");
            $(this).attr("data-click", "1");
        }
        if (click == 1) {
            $(this).parent().find("ul").removeClass("show");
            $(this).attr("data-click", "0");
        }
    });

    $(".search-btn").on("click", function () {
        $(this).parent().toggleClass("active");
        var elm = $(this).parent();
        if (elm.hasClass("active")) {
            elm.find("span").text("close");
        } else {
            elm.find("span").text("search");
        }

        // elm.toggleClass("active");
    });

    $(".write-post").on("click", function () {
        var isLog = $(this).attr("data-login");
        if (isLog == 1) {
            window.location = "/gui-bai";
        } else {
            $("#loginModal").modal();
        }
    });

    $(".scTieu").on("click", function () {
        var x = $("#tieu-diem").offset();
        $("html, body").animate({ scrollTop: x.top - 90 }, 1000);
    });

    $(".scTrend").on("click", function () {
        var x = $("#trending").offset();
        $("html, body").animate({ scrollTop: x.top - 80 }, 1000);
    });

    $(window).scroll(function () {
        /*handling backtop*/
        var rangeToTop = $(this).scrollTop();
        if (rangeToTop > 500) {
            $("#back-top").fadeIn("slow");
        } else {
            $("#back-top").fadeOut("slow");
        }
    });

    $("#back-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });

    // var trs = 0;
    // setInterval(function () {
    //   trs = trs-0.5;
    //   if(trs<-3000){
    //     trs =0;
    //   }
    //   $(".top-chart ul").css({"transform": "translateX("+trs+"px)"});
    // }, 30);
    //   count text input
    $(".count-length").keyup(function () {
        var name = $(this).attr("data-name");
        var number = parseInt($(this).attr("data-length"));
        var element = $("label[for='" + name + "']");
        var cElement = element.children("span").length;
        var curent_length = $(this).val().length;
        countChar(number, curent_length, element, cElement);
    });

    $(".count-length").focus(function () {
        var name = $(this).attr("data-name");
        var number = parseInt($(this).attr("data-length"));
        var element = $("label[for='" + name + "']");
        var cElement = element.children("span").length;
        var curent_length = $(this).val().length;
        countChar(number, curent_length, element, cElement);
    });
    //   end count text input

    $("#uploadAvatar").on("change", function () {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
        if (
            input.files &&
            input.files[0] &&
            (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
        ) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".avatarNews").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            $(".avatarNews").attr("src", "/images/default.jpg");
        }
    });

    $(".frame-login").on("click", function () {
        // alert(2);
        top.postMessage({ openPopup: 1 });
        return false;
    });

    $(".ic-heart").on("click", function () {
        // var giatri = $(this).attr("value");
        var newsid = $(this).attr("data-id");
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var heart = $(this);
        $.ajax({
            url: "/news/heart",
            type: "post",
            data: {
                _csrf_frontend: csrfToken,
                id: newsid,
                // giatri: giatri,
            },
            error: function (xhr, status, error) {
                console.log(error);
                console.log(xhr.responseText);
            },
            success: function (res) {
                // console.log(res);
                console.log($(this));
                var data = JSON.parse(res);
                if (data.stt == "heart") {
                    heart.find("svg").addClass("active");
                    heart.find(".count-heart").text(data.heart);
                }
                if (data.stt == "unheart") {
                    heart.find("svg").removeClass("active");
                    heart.find(".count-heart").text(data.heart);
                }
            },
        });
    });

    $('li a[href*="#"]').on("click", function (e) {
        var width = Math.max(window.screen.width, window.innerWidth);
        if (width < 768) {
            $("html,body").animate(
                {
                    scrollTop:
                        $($(this).attr("href").replace("/", "")).offset().top - 200,
                },

                500
            );
        } else {
            $("html,body").animate(
                {
                    scrollTop: $($(this).attr("href").replace("/", "")).offset().top - 85,
                },

                500
            );
        }

        e.preventDefault();
    });
});

function countChar(maxLenght, curent_length, element, cElement) {
    if (cElement == 0) {
        element.append(
            "<span class='count'>" + curent_length + "/" + maxLenght + "</span>"
        );
    } else {
        if (curent_length > maxLenght) {
            element.children("span").addClass("countErr");
        } else {
            element.children("span").removeClass("countErr");
        }
        element.children("span").html(curent_length + "/" + maxLenght);
    }
}


$(function () {
    $(".new-com-bt").click(function (event) {
        $(".new-com-cnt.reply .bt-cancel-com").click();
        $(this).hide();
        $("#new-com-cnt").show();
        $("#the-new-com").focus();
        $("#name-com").val(getCookie("CM_NAME"));
        $("#mail-com").val(getCookie("CM_MAIL"));
    });

    $(".alert .close").click(function () {
        $(this).parents(".alert").addClass("hide");
        return false;
    });

    $(".like-comment i").each(function () {
        comment_id = $(this).data("id");
        cNameLike = "like_comment_" + comment_id;
        liked = getCookie(cNameLike);
        if (liked == 1) {
            $(this).removeClass("far");
            $(this).addClass("fas");
        }
    });



    $(".like-count-comment").each(function () {
        if ($(this).text() == 0) {
            $(this).css("visibility", "hidden");
        }
    });

    // $(".bt-add-com").click(function() {
    $(".bt-add-com").on("click", function () {
        var newsid = $("#newsid");
        var theCom = $("#the-new-com");
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        if (theCom.val().length < 20) {
            alert("Nội dung bình luận tối thiểu 20 kí tự");
            $("#the-new-com").focus();
        } else {
            $.ajax({
                type: "POST",
                url: "/news/comment",
                data: {
                    _csrf_frontend: csrfToken,
                    content: theCom.val(),
                    id: newsid.val(),
                },
                dataType: "html",
                success: function (msg) {
                    iscomment = 0;
                    $(".wrap-comment").html(msg);
                },
                error: function (request, error) {
                    iscomment = 0;
                },
            });
        }
    });

    function event_cm() {
        $(".js_cm").each(function () {
            var obj = $(this);
            $(this).removeClass("js_cm");
            var id = $(this).attr("data-id");
            var name = $(this).attr("data-name");
            console.log(id);
            console.log(name);
            $(this)
                .find(".btn_reply")
                .click(function () {
                    // an comment chinh
                    $(".new-com-cnt .bt-cancel-com-r").click();
                    $(".alert-block").remove();
                    var tpl = $(
                        `<div class="new-com-cnt reply">
                        <textarea class="the-new-com jsch"></textarea> 
                        <div style="clear: both;"></div>
                        <div class="bt-add-com-r ">
                          Gửi
                        </div>
                        <div class="bt-cancel-com-r">Hủy</div>
                        <div class="clear"></div>
                      </div>`
                    );

                    tpl.find(".bt-cancel-com-r").click(function () {
                        $(this).parents(".new-com-cnt").remove();
                    });

                    tpl.find(".bt-add-com-r").click(function () {
                        var newsid = $("#newsid");
                        var obj_child = $(this).parents(".new-com-cnt");
                        var theCom = tpl.find("textarea.the-new-com");
                        var csrfToken = $('meta[name="csrf-token"]').attr("content");

                        if (theCom.val().length < 20) {
                            alert("Nội dung bình luận tối thiểu 20 kí tự");
                            $(".the-new-com").focus();
                        } else {
                            $.ajax({
                                type: "POST",
                                type: "POST",
                                url: "/news/comment",
                                data: {
                                    _csrf_frontend: csrfToken,
                                    content: theCom.val(),
                                    id: newsid.val(),
                                    parent: id,
                                },
                                dataType: "html",
                                success: function (html) {
                                    if (html == "0") {
                                        alert("Sai captcha");
                                        return false;
                                    }
                                    obj_child.after(
                                        '<div class="alert alert-block alert-success fade in rep" id="alert-send-ok">Bạn đã gửi bình luận thành công, vui lòng chờ BQT duyệt bình luận của bạn ! </div>'
                                    );

                                    tpl.find(".bt-cancel-com-r").click();
                                },
                                error: function (request, error) {
                                    alert("Can't do because: " + error);
                                },
                            });
                        }
                    });
                    tpl.insertAfter(obj);
                    tpl.find("textarea.the-new-com").focus();
                });
        });
    }

    function event_like() {
        $(".like-comment.js")
            .removeClass("js")
            .click(function () {
                comment_id = $(this).parent().data("id");
                cname = "like_comment_" + comment_id;
                enable_like_comment = "enable_like_comment_" + comment_id;
                var csrfToken = $('meta[name="csrf-token"]').attr("content");

                if (getCookie(enable_like_comment) == "") {
                    setCookie(enable_like_comment, "1", "1");
                } else {
                    var enable_like_comment_val =
                        parseInt(getCookie(enable_like_comment)) + 1;
                    setCookie(enable_like_comment, enable_like_comment_val, "1");
                }

                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");

                    var likeCountComment =
                        parseInt($(".like-count-comment", this).text()) - 1;

                    $(".like-count-comment", this).text(likeCountComment);

                    if ($(".like-count-comment", this).text() == "0") {
                        $(".like-count-comment", this).css("visibility", "hidden");
                    }
                    deleteCookie(cname);
                    $.ajax({
                        url: "/news/like-comment",
                        type: "POST",
                        data: {
                            _csrf_frontend: csrfToken,
                            comment_id: comment_id,
                            action: "unlike",
                        },
                    });
                } else {
                    if (getCookie(enable_like_comment) > 20) {
                        alert(
                            "Bạn đã vượt quá số lượt thích trong ngày. Bạn phải đợi 24h nữa mới được thao tác tiếp!"
                        );
                    } else {
                        $(this).addClass("active");
                        var likeCountComment =
                            parseInt($(".like-count-comment", this).text()) + 1;
                        $(".like-count-comment", this)
                            .text(likeCountComment)
                            .css("visibility", "visible");
                        setCookie(cname, "1", "365");

                        $.ajax({
                            url: "/news/like-comment",
                            type: "POST",
                            data: {
                                _csrf_frontend: csrfToken,
                                comment_id: comment_id,
                                action: "like",
                            },
                        });
                    }
                }
            });
    }

    event_cm();
    event_like();
});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteCookie(cname) {
    document.cookie = cname + "=;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}

var timer;
$(".note-redirect").click(function () {
    $(".panel").hide();
    var tab = $(this).attr("href");
    $(tab).show();
});

$(".btn-social").click(function () {
    var platform = $(this).attr("data-platform");

    setCookie("backurl", window.location.href, "1");

    var child = window.open(
        "http://dff.vn/login/auth/?authclient=" + platform,
        "",
        "toolbar=0,status=0,width=500,height=500"
    );
    $("#text-login").html('<div class="loader"></div>');
    timer = setInterval(checkChild, 500);
    // console.log(timer);
    function checkChild() {
        if (child.closed) {
            $("#text-login").html("Đăng nhập");
            clearInterval(timer);
        }
    }
});

// đăng nhập
// $(".btn-sign-in").click(function () {
//     var csrfToken = $('meta[name="csrf-token"]').attr("content");
//     var email = $(".email").val();
//     var password = $(".password").val();
//     // if (email == "" || password == "") {
//     //   alert("Vui lòng nhập đầy đủ thông tin");
//     // }
//     $.ajax({
//         url: "/login/submit",
//         type: "post",
//         data: {
//             email: email,
//             password: password,
//             _csrf_frontend: csrfToken,
//         },
//
//         error: function (xhr, status, error) {
//             console.log(error);
//             console.log(xhr.responseText);
//         },
//         success: function (res) {
//             console.log(res);
//             if (res == "oke") {
//                 // alert("Đăng nhập thành công!");
//                 location.reload();
//             } else {
//                 alert("Đăng nhập thất bại, Vui lòng kiểm tra lại thông tin");
//             }
//         },
//     });
// });

// dùng enter
$("#pass").keypress(function (event) {
    if (event.keyCode === 13) {
        $("#btn-log").click();
    }
});

// đăng kí
// $(".btn-sign-up").click(function () {
//     var csrfToken = $('meta[name="csrf-token"]').attr("content");
//     var name = $(".signname").val();
//     var email = $(".signemail").val();
//     var phone = $(".signphone").val();
//     var password = $(".signpassword").val();
//     if (name == "") {
//         alert("Vui lòng nhập tên");
//     }
//     if (email == "") {
//         alert("Vui lòng nhập đầy đủ thông tin");
//     }
//     if (phone == "") {
//         alert("Vui lòng nhập đầy đủ thông tin");
//     }
//     if (password == "") {
//         alert("Vui lòng nhập đầy đủ thông tin");
//     }
//
//     $.ajax({
//         url: "/login/signup",
//         type: "post",
//         data: {
//             name: name,
//             email: email,
//             phone: phone,
//             password: password,
//             _csrf_frontend: csrfToken,
//         },
//
//         error: function (xhr, status, error) {
//             console.log(error);
//             console.log(xhr.responseText);
//         },
//         success: function (res, data) {
//             if (res == "oke") {
//                 alert("Đăng kí thành công, kiểm tra email của bạn để xác thực!");
//                 $("#login").show();
//                 $("#register").hide();
//             } else {
//                 alert("Đăng kí không thành công. Vui lòng kiểm tra lại thông tin!");
//                 mes = JSON.parse(res);
//                 $("#loginModal .pt-20 p").css("display", "block");
//                 if (mes && mes.message.email) {
//                     $("#email_error_unique").text("* " + mes.message.email);
//                 }
//                 if (mes && mes.message.validate_email) {
//                     $("#email_error_validate").text("* " + mes.message.validate_email);
//                 }
//                 if (mes && mes.message.phone) {
//                     $("#phone_error_unique").text("* " + mes.message.phone);
//                 }
//                 if (mes && mes.message.validate_phone) {
//                     $("#phone_error_validate").text("* " + mes.message.validate_phone);
//                 }
//             }
//         },
//     });
// });
//
// //quên mật khẩu
// $(".confirm").click(function () {
//     var csrfToken = $('meta[name="csrf-token"]').attr("content");
//     var email = $(".fogotemail").val();
//     $.ajax({
//         url: "/login/fogot",
//         type: "post",
//         data: {
//             email: email,
//             _csrf_frontend: csrfToken,
//         },
//
//         error: function (xhr, status, error) {
//             console.log(error);
//             console.log(xhr.responseText);
//         },
//         success: function (res) {
//             console.log(res);
//             if (res == "oke") {
//                 alert("Đổi mật khẩu thành công. Vui lòng kiểm tra email của bạn.");
//                 location.reload();
//             } else {
//                 alert("Không tim thấy thông tin email, vui lòng kiểm tra lại.");
//             }
//         },
//     });
// });

$("#success-alert")
    .fadeTo(2000, 500)
    .slideUp(500, function () {
        $("#success-alert").slideUp(500);
    });

// $(".btn-social1").click(function() {
//   window.opener.CallParent();
// });

// window.onbeforeunload = function() {
//   if (pasteEditorChange) {
//     var btn = confirm('Do You Want to Save the Changess?');
//     if (btn === true) {
//       // SavetoEdit(); //your function call
//     } else {
//       // windowClose(); //your function call
//     }
//   } else {
//     // windowClose(); //your function call
//   }
// };

// function CallParent() {
//   alert(" Parent window Alert");
// }

if (getCookie("backurl") != "" && getCookie("backurl") != "undefine") {
    // console.log("redirect");
    // console.log(getCookie("backurl"));
    setCookie("backurl", "", "1");
    // window.history.back();
} else {
    // console.log("no redirect");
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function validateEmail(email) {
    var re =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

$(document).ready(function () {
    "use strict";

    var row = 1;
    if ($(window).width() < 768) {
        row = 2;
    }
    // $(".slide-video").slick({
    //   rows: 1,
    //   dots: false,
    //   infinite: true,
    //   speed: 300,
    //   slidesToShow: 4,
    //   slidesToScroll: 4,
    //   rows: 2,
    //   padding: "50px",
    //   nextArrow: ".next_caro",
    //   prevArrow: ".previous_caro",
    //   responsive: [
    //     {
    //       breakpoint: 768,
    //       settings: {
    //         slidesToShow: 2,
    //         slidesToScroll: 2,
    //         rows: 2,
    //       },
    //     },
    //   ],
    // });

    $("#menu_main ul li.open-menu-big-destop ul li")
        .after()
        .on("click", function () {
            $(this).toggleClass("open");
        });

    $(".galery-sidebar").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        navText: [
            "<div class='nav-btn prev-slide'></div>",
            "<div class='nav-btn next-slide'></div>",
        ],
        dots: false,
        items: 1,
    });
    $(".slide-blog-bot").owlCarousel({
        loop: true,
        margin: 15,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1200: {
                items: 4,
            },
        },
    });

    $(".backtop").on("click", function () {
        $(window).scrollTop(0);
    });

    $(".write-post").on("click", function () {
        var isLog = $(this).attr("data-login");
        console.log(isLog);
        if (isLog == 1) {
            window.location = "/gui-bai";
        } else {
            $("#loginModal").modal();
        }
    });

    //   count text input
    $(".count-length").keyup(function () {
        var name = $(this).attr("data-name");
        var number = parseInt($(this).attr("data-length"));
        var element = $("label[for='" + name + "']");
        var cElement = element.children("span").length;
        var curent_length = $(this).val().length;
        countChar(number, curent_length, element, cElement);
    });

    $(".count-length").focus(function () {
        var name = $(this).attr("data-name");
        var number = parseInt($(this).attr("data-length"));
        var element = $("label[for='" + name + "']");
        var cElement = element.children("span").length;
        var curent_length = $(this).val().length;
        countChar(number, curent_length, element, cElement);
    });
    //   end count text input
});

$(window).scroll(function () {
    /*handling backtop*/
    var rangeToTop = $(this).scrollTop();

    /*handling fixtop menu*/
    if (rangeToTop >= $(".header-top").outerHeight()) {
        $(".header-bottom").addClass("fixtop");
    } else {
        $(".header-bottom").removeClass("fixtop");
    }
    /*end*/
});
$("#uploadAvatar").on("change", function () {
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
    if (
        input.files &&
        input.files[0] &&
        (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
    ) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".avatarNews").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        $(".avatarNews").attr("src", "/images/default.jpg");
    }
});

var Detect;
Detect = {
    isMob: function () {
        return !window.matchMedia("(min-width: 1023px)").matches;
    },
};

function LoadBanners(codes) {

    var ads = $(Detect.isMob() ? ".admob" + " .banner" : ".adweb" + " .banner");

    $.each(codes, function (index, value) {

        if (value.code) {

            ads.each(function (j, val) {

                if (((val = $(val)), val.attr("banner-adpos") === value.pos)) {

                    val.html(value.code);
                }
            });
        }
    });
}

var isLoad = 0;
var page = 1;
function loadMore(id, item) {
    if (isLoad == 0) {
        isLoad = 1;

        $("#wrap-loading").html(
            '<div class="loading"><img src="/img/loading.svg" width="80px" /></div>'
        );

        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            type: "POST",
            url: "/category/ajax-get-new-cate",
            data: { _csrf_frontend: csrfToken, cateid: id, page: page, item: item },
            dataType: "html",
            success: function (msg) {
                $(".loading").hide();
                isLoad = 0;
                page = page + 1;

                if (msg == "false") {
                    $("#wrap-loading").html(
                        "<p style='text-align:center;font-size:15px; color:red'> Không còn tin để hiển thị</p>"
                    );
                } else {
                    $("#wrap-loading").remove();
                    $("#list-cate").append(msg);
                }
            },
            error: function (request, error) {},
        });
    }
}

function loadMoreVideo() {
    if (isLoad == 0) {
        isLoad = 1;

        $("#wrap-loading").html(
            '<div class="loading"><img src="/img/loading.svg" width="80px" /></div>'
        );

        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            type: "POST",
            url: "/ajax-loadmore-video",
            data: { _csrf_frontend: csrfToken, page: page },
            dataType: "html",
            success: function (msg) {
                $(".loading").hide();
                isLoad = 0;
                page = page + 1;

                if (msg == "false") {
                    $("#wrap-loading").html(
                        "<p style='text-align:center;font-size:15px; color:red'> Không còn video để hiển thị</p>"
                    );
                } else {
                    $("#wrap-loading").remove();
                    $("#list-cate").append(msg);
                }
            },
            error: function (request, error) {},
        });
    }
}
function countChar(maxLenght, curent_length, element, cElement) {
    if (cElement == 0) {
        element.append(
            "<span class='count'>" + curent_length + "/" + maxLenght + "</span>"
        );
    } else {
        if (curent_length > maxLenght) {
            element.children("span").addClass("countErr");
        } else {
            element.children("span").removeClass("countErr");
        }
        element.children("span").html(curent_length + "/" + maxLenght);
    }
}
$(document).ready(function () {
    $.get($('#box-gold').data('url'), function (data) {
        console.log('#box-gold', data)
        $('#box-gold').html(data);
    }, 'html');

    $.get($('#box-coin').data('url'), function (data) {
        $('#box-coin').html(data);
    }, 'html');
});

