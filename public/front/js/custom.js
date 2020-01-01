////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// jQuery
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var automaticGeoLocation = false;
var resizeId;

$(document).ready(function($) {
    "use strict";

//  Geo Location button

    if( $(".geo-location").length > 0 && $(".map").length === 0 ){
        $("body").append("<div id='map-helper' style='display: none'></div>");
        var map = new google.maps.Map(document.getElementById("map-helper"));
        autoComplete(map);
    }

//  Selectize

    $("[data-enable-search=true]").each(function(){
        $(this).selectize({
            onDropdownOpen: dropdownOpen,
            onDropdownClose: dropdownClose,
            allowEmptyOption: false
        });
    });

    var select = $("select");
    select.selectize({
        onDropdownOpen: dropdownOpen,
        onDropdownClose: dropdownClose,
        allowEmptyOption: true,        
    });

    function dropdownOpen($dropdown){
        $dropdown.addClass("opening");
    }
    function dropdownClose($dropdown){
        $dropdown.removeClass("opening");
    }


//  Disable inputs in the non-active tab

    $(".form-slide:not(.active) input, .form-slide:not(.active) select, .form-slide:not(.active) textarea").prop("disabled", true);

//  Change tab button


    $("select.change-tab").each(function(){
        var _this = $(this);
        if( $(this).find(".item").attr("data-value") !== "" ){
            changeTab( _this );
        }
    });

    $(".change-tab").on("change", function() {
        changeTab( $(this) );
    });

    $(".box").each(function(){
        if( $(this).find(".background .background-image").length ) {
            $(this).css("background-color","transparent");
        }
    });

//  Star Rating

    $(".rating").each(function(){
        for( var i = 0; i <  5; i++ ){
            if( i < $(this).attr("data-rating") ){
                $(this).append("<i class='active fa fa-star'></i>")
            }
            else {
                $(this).append("<i class='fa fa-star'></i>")
            }
        }
    });

//  Button for class changing

    $(".change-class").on("click", function(e){
        e.preventDefault();
        var parentClass = $( "."+$(this).attr("data-parent-class") );
        parentClass.removeClass( $(this).attr("data-change-from-class") );
        parentClass.addClass( $(this).attr("data-change-to-class") );
        $(this).parent().find(".change-class").removeClass("active");
        $(this).addClass("active");
        readMore();
    });

    if( $(".masonry").length ){
        $(".items.masonry").masonry({
            itemSelector: ".item",
            transitionDuration: 0
        });
    }

    $(".ribbon-featured").each(function() {
        var thisText = $(this).text();
        $(this).html("");
        $(this).append(
            "<div class='ribbon-start'></div>" +
            "<div class='ribbon-content'>" + thisText + "</div>" +
            "<div class='ribbon-end'>" +
                "<figure class='ribbon-shadow'></figure>" +
            "</div>"
        );
    });

//  File input styling

    if( $("input[type=file].with-preview").length ){
        $("input.file-upload-input").MultiFile({
            list: ".file-upload-previews"
        });
    }

    $(".single-file-input input[type=file]").change(function() {
        previewImage(this);
    });

    $(".has-child a[href='#'].nav-link").on("click", function (e) {
        e.preventDefault();
       if( !$(this).parent().hasClass("hover") ){
           $(this).parent().addClass("hover");
       }
       else {
           $(this).parent().removeClass("hover");
       }
    });

    if( $(".owl-carousel").length ){
        var galleryCarousel = $(".gallery-carousel");

        galleryCarousel.owlCarousel({
            loop: false,
            margin: 0,
            nav: true,
            items: 1,
            navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            autoHeight: true,
            dots: false
        });

        $(".tabs-slider").owlCarousel({
            loop: false,
            margin: 0,
            nav: false,
            items: 1,
            autoHeight: true,
            dots: false,
            mouseDrag: true,
            touchDrag: false,
            pullDrag: false,
            freeDrag: false
        });

        $(".full-width-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 3,
            navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            autoHeight: false,
            center: true,
            dots: false,
            autoWidth:true,
            responsive: {
                768: {
                    items: 3
                },
                0 : {
                    items: 1,
                    center: false,
                    margin: 0,
                    autoWidth: false
                }
            }
        });

        $(".gallery-carousel-thumbs").owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            dots: true,
            items: 5,
            URLhashListener: true
        });

        $("a.owl-thumb").on("click", function () {
            $("a.owl-thumb").removeClass("active-thumb");
            $(this).addClass("active-thumb");
        });

        galleryCarousel.on('translated.owl.carousel', function() {
            var hash = $(this).find(".active").find("img").attr("data-hash");
            $(".gallery-carousel-thumbs").find("a[href='#" + hash + "']").trigger("click");
        });
    }

//  Bootstrap tooltip initialization

    $('[data-toggle="tooltip"]').tooltip();

//  iCheck

    $("input[type=checkbox], input[type=radio]").iCheck();

    var framedInputRadio = $(".framed input[type=radio]");
    framedInputRadio.on('ifChecked', function(){
        $(this).closest(".framed").addClass("active");
    });
    framedInputRadio.on('ifUnchecked', function(){
        $(this).closest(".framed").removeClass("active");
    });

//  "img" into "background-image" transfer

    $("[data-background-image]").each(function() {
        $(this).css("background-image", "url("+ $(this).attr("data-background-image") +")" );
    });

    $(".background-image").each(function() {
        $(this).css("background-image", "url("+ $(this).find("img").attr("src") +")" );
    });

//  Custom background color

    $("[data-background-color]").each(function() {
        $(this).css("background-color", $(this).attr("data-background-color") );
    });

//  Form Validation

    $(".form.email .btn[type='submit']").on("click", function(e){
        var button = $(this);
        var form = $(this).closest("form");
        button.prepend("<div class='status'></div>");
        form.validate({
            submitHandler: function() {
                $.post("front/php/email.php", form.serialize(),  function(response) {
                    button.find(".status").append(response);
                    form.addClass("submitted");
                });
                return false;
            }
        });
    });

//  No UI Slider -------------------------------------------------------------------------------------------------------

    if( $('.ui-slider').length > 0 ){

        $.getScript( "front/js/jquery.nouislider.all.min.js", function() {
            $('.ui-slider').each(function() {
                if( $("body").hasClass("rtl") ) var rtl = "rtl";
                else rtl = "ltr";

                var step;
                if( $(this).attr('data-step') ) {
                    step = parseInt( $(this).attr('data-step') );
                }
                else {
                    step = 10;
                }
                var sliderElement = $(this).attr('id');
                var element = $( '#' + sliderElement);
                var valueMin = parseInt( $(this).attr('data-value-min') );
                var valueMax = parseInt( $(this).attr('data-value-max') );
                $(this).noUiSlider({
                    start: [ valueMin, valueMax ],
                    connect: true,
                    direction: rtl,
                    range: {
                        'min': valueMin,
                        'max': valueMax
                    },
                    step: step
                });
                if( $(this).attr('data-value-type') == 'price' ) {
                    if( $(this).attr('data-currency-placement') == 'before' ) {
                        $(this).Link('lower').to( $(this).children('.values').children('.value-min'), null, wNumb({ prefix: $(this).attr('data-currency'), decimals: 0, thousand: '.' }));
                        $(this).Link('upper').to( $(this).children('.values').children('.value-max'), null, wNumb({ prefix: $(this).attr('data-currency'), decimals: 0, thousand: '.' }));
                    }
                    else if( $(this).attr('data-currency-placement') == 'after' ){
                        $(this).Link('lower').to( $(this).children('.values').children('.value-min'), null, wNumb({ postfix: $(this).attr('data-currency'), decimals: 0, thousand: ' ' }));
                        $(this).Link('upper').to( $(this).children('.values').children('.value-max'), null, wNumb({ postfix: $(this).attr('data-currency'), decimals: 0, thousand: ' ' }));
                    }
                }
                else {
                    $(this).Link('lower').to( $(this).children('.values').children('.value-min'), null, wNumb({ decimals: 0 }));
                    $(this).Link('upper').to( $(this).children('.values').children('.value-max'), null, wNumb({ decimals: 0 }));
                }
            });
        });
    }

//  Read More

    readMore();

    footerHeight();

    $("form").each(function(){
        $(this).validate();
    });
      // Back to top
      $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    }); 
    $('.back-to-top').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 300);
        return false;
    });
        //Sticky
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
    
            if (scroll >= 80) {
                $(".defaultscroll").addClass("scroll");
            } else {
                $(".defaultscroll").removeClass("scroll");
            }
        });
});

$(window).on("resize", function(){
    clearTimeout(resizeId);
    resizeId = setTimeout(doneResizing, 250);
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Do after resize

function doneResizing(){
    footerHeight();
}

// Change Tab

function changeTab(_this){
    var parameters = _this.data("selectize").items[0];
    var changeTarget = $("#" + _this.attr("data-change-tab-target"));
    var slide = changeTarget.find(".form-slide");
    if( parameters === "" ){
        slide.removeClass("active");
        slide.first().addClass("default");
        changeTarget.find("input").prop("disabled", true);
        changeTarget.find("select").prop("disabled", true);
        changeTarget.find("textarea").prop("disabled", true);
    }
    else {
        slide.removeClass("default");
        slide.removeClass("active");
        changeTarget.find("input").prop("disabled", true);
        changeTarget.find("select").prop("disabled", true);
        changeTarget.find("textarea").prop("disabled", true);
        changeTarget.find( "#" + parameters ).addClass("active");
        changeTarget.find( "#" + parameters + " input").prop("disabled", false);
        changeTarget.find( "#" + parameters + " textarea").prop("disabled", false);
        changeTarget.find( "#" + parameters + " select").prop("disabled", false);
    }
}

// Footer Height

function footerHeight(){
    if( !viewport.is("xs") ) {
        var footer = $(".footer");
        var footerHeight = footer.height() + parseInt( footer.css("padding-top"), 10 ) + parseInt( footer.css("padding-bottom"), 10 ) ;
        $(".page >.content").css("margin-bottom", footerHeight + "px");
    }
    else if(viewport.is("xs")) {
        $(".page >.content").css("margin-bottom", "0px");
    }
}

// Read More

function readMore() {
    $(".read-more").each(function(){
        var readMoreLink = $(this).attr("data-read-more-link-more");
        var readLessLink = $(this).attr("data-read-more-link-less");
        var collapseHeight = $(this).find(".item:first").height() + parseInt( $(this).find(".item:first").css("margin-bottom"), 10 );
        $(".read-more").readmore({
            moreLink: '<div class="center"><a href="#" class="btn btn-primary btn-rounded btn-framed">' + readMoreLink + '</a></div>',
            lessLink: '<div class="center"><a href="#" class="btn btn-primary btn-rounded btn-framed">' + readLessLink + '</a></div>',
            collapsedHeight: 500
        });
    });
}

// Google Map

function simpleMap(latitude, longitude, markerImage, mapTheme, mapElement, markerDrag){
    if (!markerDrag){
        markerDrag = false;
    }
    if ( mapTheme === "light" ){
        var mapStyles = [{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#c79c60"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#c79c60"},{"saturation":-52},{"lightness":-10},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#c79c60"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#c79c60"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#c79c60"},{"saturation":-52},{"lightness":-10},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#c79c60"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#c79c60"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]}];
    }
    else if ( mapTheme === "dark" ){
        mapStyles = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
    }
    var mapCenter = new google.maps.LatLng(latitude,longitude);
    var mapOptions = {
        zoom: 13,
        center: mapCenter,
        disableDefaultUI: false,
        scrollwheel: false,
        styles: mapStyles
    };
    var element = document.getElementById(mapElement);
    var map = new google.maps.Map(element, mapOptions);
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(latitude,longitude),
        map: map,
        icon: markerImage,
        draggable: markerDrag
    });

    google.maps.event.addListener(marker, 'dragend', function(){
        var latitudeInput = $('#latitude');
        var longitudeInput = $("#longitude");
        if( latitudeInput.length ){
            latitudeInput.val( marker.getPosition().lat() );
        }
        if( longitudeInput.length ){
            longitudeInput.val( marker.getPosition().lng() );
        }
    });

    autoComplete(map, marker);

}

//Autocomplete ---------------------------------------------------------------------------------------------------------

function autoComplete(map, marker){
    if( $("#input-location").length ){
        if( !map ){
            map = new google.maps.Map(document.getElementById("input-location"));
        }
        var mapCenter;
        var input = document.getElementById('input-location');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            mapCenter = place.geometry.location;
            if( marker ){
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                $('#latitude').val( marker.getPosition().lat() );
                $('#longitude').val( marker.getPosition().lng() );
            }
            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });

        $('.geo-location').on("click", function(e) {
            e.preventDefault();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success);
            } else {
                console.log('Geo Location is not supported');
            }
        });

        function success(position) {
            var locationCenter = new google.maps.LatLng( position.coords.latitude, position.coords.longitude);
            map.setCenter( locationCenter );
            map.setZoom(14);
            if(marker){
                marker.setPosition(locationCenter);
            }

            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                "latLng": locationCenter
            }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    var lat = results[0].geometry.location.lat(),
                        lng = results[0].geometry.location.lng(),
                        placeName = results[0].address_components[0].long_name,
                        latlng = new google.maps.LatLng(lat, lng);

                    $("#input-location").val(results[0].formatted_address);
                    var latitudeInput = $('#latitude');
                    var longitudeInput = $("#longitude");
                    if( latitudeInput.length ){
                        latitudeInput.val( marker.getPosition().lat() );
                    }
                    if( longitudeInput.length ){
                        longitudeInput.val( marker.getPosition().lng() );
                    }
                }
            });

        }
    }

}

/*
if( $("#input-location2").length ){
	if( !map ){
		var map = new google.maps.Map(document.getElementById("input-location2"));
	}
	var mapCenter;
	var input = document.getElementById('input-location2');
	var autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.bindTo('bounds', map);
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			return;
		}
	});       
}
*/

function previewImage(input) {
    var ext = $(input).val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['gif','png','jpg','jpeg']) === -1) {
        alert('invalid extension!');
    }
    else {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parents(".profile-image").find(".image").attr("style", "background-image: url('" + e.target.result + "');" );
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
}

// Viewport ------------------------------------------------------------------------------------------------------------

var viewport = (function() {
    var viewPorts = ['xs', 'sm', 'md', 'lg'];

    var viewPortSize = function() {
        return window.getComputedStyle(document.body, ':before').content.replace(/"/g, '');
    };

    var is = function(size) {
        if ( viewPorts.indexOf(size) === -1 ) throw "no valid viewport name given";
        return viewPortSize() === size;
    };

    var isEqualOrGreaterThan = function(size) {
        if ( viewPorts.indexOf(size) === -1 ) throw "no valid viewport name given";
        return viewPorts.indexOf(viewPortSize()) >= viewPorts.indexOf(size);
    };

    // Public API
    return {
        is: is,
        isEqualOrGreaterThan: isEqualOrGreaterThan
    }
})();


"use strict";

function _defineProperty(e, t, i) {
    return t in e ? Object.defineProperty(e, t, {
        value: i,
        enumerable: !0,
        configurable: !0,
        writable: !0
    }) : e[t] = i, e
}

function setBackground() {
    $("[setBackground]").each(function () {
        var e = $(this).attr("setBackground");
        $(this).css({
            "background-image": "url(" + e + ")",
            "background-size": "cover",
            "background-position": "center center"
        })
    }), $("[setBackgroundRepeat]").each(function () {
        var e = $(this).attr("setBackgroundRepeat");
        $(this).css({
            "background-image": "url(" + e + ")",
            "background-repeat": "repeat"
        })
    })
}

function toggleMenu() {
    $(".mobile-toggle").on("click", function () {
        $(".mobile-toggle").toggleClass("active"), $(".mobile-menu").toggleClass("active"), $(".back-drop").toggleClass("active"), $("body").toggleClass("over-hidden")
    }), $(".back-drop").on("click", function () {
        $(".mobile-toggle").removeClass("active"), $(".mobile-menu").removeClass("active"), $(".back-drop").removeClass("active"), $("body").removeClass("over-hidden")
    })
}

function toolNavMapping() {
    try {
        return new MappingListener({
            selector: ".header .main-menu",
            mobileWrapper: ".header .mobile-menu",
            mobileMethod: "appendTo",
            desktopWrapper: ".header .main-wrap .right",
            desktopMethod: "prependTo",
            breakpoint: 1025
        }).watch()
    } catch (e) {}
}

function Headers() {
    var e = 0;
    $(window).scroll(function () {
        var t = $(window).scrollTop();
        $("body header").toggleClass("hide", t > e), e = $(window).scrollTop(), t > 0 ? $("header .header__top").addClass("hidden") : $("header .header__top").removeClass("hidden"), t > 0 ? $("header .header__bottom").addClass("bg") : $("header .header__bottom").removeClass("bg"), $(window).scrollTop() >= $(document).height() - $(window).height() && $(".load-more").trigger("click")
    })
}

function Aos() {
    var e;
    AOS.init((_defineProperty(e = {
        disable: "phone"
    }, "disable", "mobile"), _defineProperty(e, "startEvent", "DOMContentLoaded"), _defineProperty(e, "initClassName", "aos-init"), _defineProperty(e, "animatedClassName", "aos-animate"), _defineProperty(e, "delay", 0), _defineProperty(e, "duration", 700), _defineProperty(e, "easing", "ease"), _defineProperty(e, "once", !0), _defineProperty(e, "mirror", !1), _defineProperty(e, "anchorPlacement", "top-bottom"), e))
}

function compareZoom() {
    $(".box-compare .zoom").click(function () {
        $(this).hasClass("in") ? ($(this).removeClass("in"), $(".box-compare").removeClass("active"), $(this).addClass("out")) : ($(this).removeClass("out"), $(".box-compare").addClass("active"), $(this).addClass("in"))
    })
}

function swiperInit() {
    new Swiper(".home-banner .swiper-container", {
        speed: 1e3,
        navigation: {
            clickable: !0,
            nextEl: ".home-banner .swiper-next",
            prevEl: ".home-banner .swiper-prev"
        },
        pagination: {
            el: ".home-banner .swiper-pagination",
            clickable: !0
        }
    });
    var e = new Swiper(".project-detail .gallery-thumbs", {
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: !0,
        watchSlidesVisibility: !0,
        watchSlidesProgress: !0
    });
    new Swiper(".project-detail .gallery-top", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".gallery-top .swiper-button-next",
            prevEl: ".gallery-top .swiper-button-prev"
        },
        thumbs: {
            swiper: e
        }
    })
}

function autorun() {
    $(".home-utilities .cicre span").each(function () {
        $(this).prop("Counter", 0).animate({
            Counter: $(this).text()
        }, {
            duration: 5e3,
            easing: "swing",
            step: function (e) {
                $(this).text(Math.ceil(e)), $(".big").addClass("active")
            }
        })
    })
}

function showmore() {
    $(".home-news .list-item .item").slice(0, 6).show(), $(".view-more").click(function (e) {
        e.preventDefault(), $(".home-news .list-item .item:hidden").slice(0, 3).fadeIn("slow"), 0 == $(".home-news .list-item .item:hidden").length && $(".view-more").fadeOut("slow")
    })
}

function gotop() {
    $("#gotop").on("click", function () {
        $("html,body").animate({
            scrollTop: 0
        }, 1e3)
    })
}

function sidebarMenu() {
    $(".has-submenu").on("click", function () {
        $(this).find("ul").is(":hidden") ? ($(this).find("ul").slideDown(), $(this).addClass("active")) : ($(this).find("ul").slideUp(), $(this).removeClass("active"))
    }), $(".sidebar-menu .side-menu-mobile-header").on("click", function () {
        $(".sidebar-menu .menu-list").slideToggle()
    })
}

function CustomSelect() {
	var x, i, j, selElmnt, a, b, c;
	/*look for any elements with the class "custom-select":*/
	x = document.getElementsByClassName("custom-sl");
	for (i = 0; i < x.length; i++) {
	  selElmnt = x[i].getElementsByTagName("select")[0];
	  /*for each element, create a new DIV that will act as the selected item:*/
	  a = document.createElement("DIV");
	  a.setAttribute("class", "select-selected");
	  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	  x[i].appendChild(a);
	  /*for each element, create a new DIV that will contain the option list:*/
	  b = document.createElement("DIV");
	  b.setAttribute("class", "select-items select-hide");
	  for (j = 1; j < selElmnt.length; j++) {
		/*for each option in the original select element,
		create a new DIV that will act as an option item:*/
		c = document.createElement("a");
		c.innerHTML = selElmnt.options[j].innerHTML;
		c.setAttribute('value', selElmnt.options[j].value)
		c.addEventListener("click", function (e) {
		  /*when an item is clicked, update the original select box,
		  and the selected item:*/
		  var y, i, k, s, h;
		  s = this.parentNode.parentNode.getElementsByTagName("select")[0];
		  h = this.parentNode.previousSibling;
		  for (i = 0; i < s.length; i++) {
			if (s.options[i].innerHTML == this.innerHTML) {
			  s.selectedIndex = i;
			  h.innerHTML = this.innerHTML;
			  y = this.parentNode.getElementsByClassName("same-as-selected");
			  for (k = 0; k < y.length; k++) {
				y[k].removeAttribute("class");
			  }
			  this.setAttribute("class", "same-as-selected");
			  break;
			}
		  }
		  h.click();
		});
		b.appendChild(c);
	  }
	  x[i].appendChild(b);
	  a.addEventListener("click", function (e) {
		/*when the select box is clicked, close any other select boxes,
		and open/close the current select box:*/
		e.stopPropagation();
		closeAllSelect(this);
		this.nextSibling.classList.toggle("select-hide");
		this.classList.toggle("select-arrow-active");
	  });
	}
  
	function closeAllSelect(elmnt) {
	  /*a function that will close all select boxes in the document,
	  except the current select box:*/
	  var x, y, i, arrNo = [];
	  x = document.getElementsByClassName("select-items");
	  y = document.getElementsByClassName("select-selected");
	  for (i = 0; i < y.length; i++) {
		if (elmnt == y[i]) {
		  arrNo.push(i)
		} else {
		  y[i].classList.remove("select-arrow-active");
		}
	  }
	  for (i = 0; i < x.length; i++) {
		if (arrNo.indexOf(i)) {
		  x[i].classList.add("select-hide");
		}
	  }
	}
	/*if the user clicks anywhere outside the select box,
	then close all select boxes:*/
	document.addEventListener("click", closeAllSelect);
  }


function tabActive() {
    $(".menu-list li").click(function () {
        var e = $(this).attr("data-tab");
        $(".menu-list li").removeClass("active"), $(".tab-content").removeClass("active"), $(this).addClass("active"), $("#" + e).addClass("active")
    })
}

function readURL(e) {
    if (e.files && e.files[0]) {
        var t = new FileReader;
        t.onload = function (e) {
            $("#imagePreview").css("background-image", "url(" + e.target.result + ")"), $("#imagePreview").hide(), $("#imagePreview").fadeIn(650)
        }, t.readAsDataURL(e.files[0])
    }
}

function userToggle() {
    $(function () {
        $(".account-after .user").on("click", function (e) {
            $(".account-after .list-item").toggleClass("active"), e.stopPropagation()
        }), $(document).on("click", function (e) {
            !1 === $(e.target).is(".account-after .list-item") && $(".account-after .list-item").removeClass("active")
        })
    })
}
$(document).ready(function () {
    swiperInit(), setBackground(), toggleMenu(), userToggle(), toolNavMapping(), compareZoom(), autorun(), showmore(), gotop(), sidebarMenu(), tabActive(), CustomSelect();
    var e = document.querySelector(".list-view-button"),
        t = document.querySelector(".grid-view-button"),
        i = document.querySelector(".list");
    e.onclick = function () {
        i.classList.remove("grid-view-filter"), i.classList.add("list-view-filter"), t.classList.remove("active"), e.classList.add("active")
    }, t.onclick = function () {
        i.classList.remove("list-view-filter"), i.classList.add("grid-view-filter"), t.classList.add("active"), e.classList.remove("active")
    }
});
//# sourceMappingURL=main.min.js.map