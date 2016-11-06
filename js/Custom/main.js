(function($){

  $(function() {
    $("#header-fnav").hide();
    $("#header-fnav-area").hover(function(){
      $("#header-fnav").fadeIn('fast');
    }, function(){
      $("#header-fnav").fadeOut('fast');
    });
  });


  // グローバルナビ-サブメニュー
  $(function(){
    $(".sub-menu").css('display', 'none');
    $("#gnav-ul li").hover(function(){
      $(this).children('ul').fadeIn('fast');
    }, function(){
      $(this).children('ul').fadeOut('fast');
    });
  });

  // トップページメインビジュアル
  $(function(){
    h = $(window).height();
    h = h/2; //追加
    hp = h * .3;
    $("#main_visual").css("height", h + "px");
    $("#main_visual .wrap").css("padding-top", hp + "px");
    //main_visualをパーティクルに
    if(window.location.href === "http://hpptms.dip.jp/"){
      $("#main_visual").particleground({
        dotColor: "#5cbdaa",
        lineColor: "#5cbdaa",
        parallax: false
      })
    }

  });

  $(function(){
    if(window.innerWidth < 768) {
      h = $(window).height();
      h = h/2; //追加
      hp = h * .2;
      $("#main_visual").css("height", h + "px");
      $("#main_visual .wrap").css("padding-top", hp + "px");
    }
  });

  // sp-nav
  $(function(){
    var header_h = $("#header").height();
    $("#gnav-sp").hide();
    $("#gnav-sp").css("top", header_h);
    $("#header-nav-btn a").click(function(){
      $("#gnav-sp").slideToggle();
      $("body").append('<p class="dummy"></p>');
    });
    $("body").on('click touchend', '.dummy', function() {
      $("#gnav-sp").slideUp();
      $("p.dummy").remove();
      return false;
    });
  });

})(jQuery);
