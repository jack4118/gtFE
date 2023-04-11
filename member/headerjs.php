<script type="text/javascript">
    $(document).ready(function() {

        $(window).scroll(function () { 
            if( $(window).scrollTop() > 1 ) {
                $(".homepageHeader").addClass("scrolled");
            } else {
                $(".homepageHeader").removeClass("scrolled");
            }
        })

        $(document).click(function(e){
            var container = $(".headerMenuDropdown.active, .headerMenuDropdownBox");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.removeClass("active");
            }
            
            var container2 = $(".headerMenuDropdown2.active, .headerMenuDropdownBox2");
            if (!container2.is(e.target) && container2.has(e.target).length === 0) {
                container2.removeClass("active");
            }
        });


        $(".headerMenuDropdown").click(function(){
            // $(".headerMenuDropdown").parent().find(".headerMenuDropdownBox").css("height", "0px");
            // $(".headerMenuDropdown2").parent().find(".headerMenuDropdownBox2").css("height", "0px");
            if ($(this).hasClass("active")) {
                $(".headerMenuDropdown").removeClass("active");
            } else {
                $(".headerMenuDropdown").removeClass("active");
                $(this).addClass("active");
                // var getDropdownItems = $(this).parent().find('.headerMenuDropdownBox .headerMenuDropdownItem').not('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                // var dropdownItemCount = getDropdownItems*30;
                // $(this).parent().find(".headerMenuDropdownBox").css("height", dropdownItemCount+"px");
            }
        });

        $(".headerMenuDropdown2").click(function(){
            // $(".headerMenuDropdown2").parent().find(".headerMenuDropdownBox2").css("height", "0px");
            if ($(this).hasClass("active")) {
                $(".headerMenuDropdown2").removeClass("active");

                // if ( $(window).width() < 768 ) {
                //     var getDropdownItems1 = $(this).parent().parent().parent().find('.headerMenuDropdownBox .headerMenuDropdownItem').not('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                //     var dropdownItemCount1 = getDropdownItems1*30;
                //     $(this).parent().parent().parent().find(".headerMenuDropdownBox").css("height", dropdownItemCount1+"px");
                // }
            } else {
                $(".headerMenuDropdown2").removeClass("active");
                $(this).addClass("active");

                // if ( $(window).width() < 768 ) {
                //     var getDropdownItems1 = $(this).parent().parent().parent().find('.headerMenuDropdownBox .headerMenuDropdownItem').not('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                //     var getDropdownItems2 = $(this).parent().find('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                //     var dropdownItemCount1 = getDropdownItems1+getDropdownItems2;
                //     var dropdownItemCount2 = dropdownItemCount1*30;
                //     var dropdownItemCount3 = getDropdownItems2*30;
                //     $(this).parent().parent().parent().find(".headerMenuDropdownBox").css("height", dropdownItemCount2+"px");
                //     $(this).parent().find(".headerMenuDropdownBox2").css("height", dropdownItemCount3+"px");
                // } else {
                //     var getDropdownItems2 = $(this).parent().find('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                //     var dropdownItemCount3 = getDropdownItems2*30;
                //     $(this).parent().find(".headerMenuDropdownBox2").css("height", dropdownItemCount3+"px");
                // }

            }
        });

        $(".headerBurgerBtn").click(function(){
            if ($(this).hasClass("active")) {
                $(".headerBurgerBtn").removeClass("active");
            } else {
                $(".headerBurgerBtn").addClass("active");
                $(".sidebarMenuWrapper").addClass("active");
            }
        });

        $(".headerMenuClose").click(function(){
            $(".headerBurgerBtn").removeClass("active");
            $(".sidebarMenuWrapper").removeClass("active");
        });

        $(".homepageHeaderBlackBG").click(function(){
            $(".headerBurgerBtn").removeClass("active");
            $(".sidebarMenuWrapper").removeClass("active");
        });

        // $(".menuBtn").each(function(){
        //     var currentImg = $(this).find(".sidebarImg").attr("src");

        //     $(this).hover(function () {
        //         $(this).find(".sidebarImg").attr("src",currentImg.replace("gray","white"));
        //     }, function () {
        //         if(this.href != window.location.href)
        //             $(this).find(".sidebarImg").attr("src",currentImg.replace("white","gray"));

        //         if($(this).hasClass('active')){
        //             $(this).find(".sidebarImg").attr("src",currentImg.replace("gray","white"));
        //             $(this).children().find('sideBarText').css({"color":"white"});
        //         }

        //         if($(this).hasClass('open')){
        //             $(this).addClass('active');
        //             $(this).find(".sidebarImg").attr("src",currentImg.replace("gray","white"));
        //             $(this).children().find('sideBarText').css({"color":"white"});
        //         }

        //         if($(this).siblings().hasClass('sideBarMenuDropdown') && !$(this).hasClass('open')){
        //             $(this).removeClass('active');
        //             $(this).find(".sidebarImg").attr("src",currentImg.replace("white","gray"));
        //             $(this).children().find('sideBarText').css({"color":"#a5a7af"});
        //         }
        //     });


        //     if (this.href == window.location.href){
        //         $(this).addClass("active");
        //         $(this).find(".sidebarImg").attr("src",currentImg.replace("gray","white"));
        //     }
        // });

        // $(".sideBarMenuDropdownItem").each(function(){
        //     var currentImg = $(this).parent().prev().find(".sidebarImg").attr("src");
        //     if (this.href == window.location.href){
        //         $(this).parent().prev().addClass("active");
        //         $(this).parent().prev().addClass("open");
        //         $(this).children().find(".sideBarText").css({"color":"black"});
        //         $(this).parent().prev().find(".sidebarImg").attr("src",currentImg.replace("gray","white"));
        //     }
        // });
    });
</script>
