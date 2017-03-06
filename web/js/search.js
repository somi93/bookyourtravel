(function($){

    var $loading = $('#loading-div');
	$(document).ready(function () {
        $("#search-button").click(function () {
            $loading.removeClass('hidden');
            $('.hotel-search-results').html("");
            var city = $("#city").val();
            var star = $("#ddl-star").val();
            var tennis_court = $("#chb_tennis_court").is(":checked");
            var wifi = $("#chb_wifi").is(":checked");
            var library = $("#chb_library").is(":checked");
            var bar = $("#chb_bar").is(":checked");
            var luggage_store = $("#chb_luggage_store").is(":checked");
            var concierge_services = $("#chb_concierge_services").is(":checked");
            var smoke_free_property = $("#chb_smoke_free_property").is(":checked");
            var laundry_service = $("#chb_laundry_service").is(":checked");
            var elevator = $("#chb_elevator").is(":checked");
            var garden = $("#chb_garden").is(":checked");
            var sauna = $("#chb_sauna").is(":checked");
            var massage = $("#chb_massage").is(":checked");
            var free_parking = $("#chb_free_parking").is(":checked");
            var fitness_centre = $("#chb_fitness_centre").is(":checked");
            var conference_space = $("#chb_conference_space").is(":checked");
            var terrace = $("#chb_terrace").is(":checked");
            var restaurant = $("#chb_restaurant").is(":checked");
            var indoor_pool = $("#chb_indoor_pool").is(":checked");
            var spa = $("#chb_spa").is(":checked");
            var hair_salon = $("#chb_hair_salon").is(":checked");
            var shop = $("#chb_shop").is(":checked");
            var wedding_service = $("#chb_wedding_service").is(":checked");
            var min_avg_temperature = $("#min_avg_temperature").val();
            var max_avg_temperature = $("#max_avg_temperature").val();
            var anchor = $(this).attr('name');
            var page = 1;
            var order="";
            var column="";
            $('.order').each(function () {
                if($(this).hasClass('current')){
                    order = $(this).data('order');
                    column = $(this).data('column');
                }
            })

            $.ajax({
                url : anchor,
                type : 'POST',
                data : {city:city, star:star, tennis_court:tennis_court, wifi:wifi, library:library, bar:bar,
                        luggage_store:luggage_store, concierge_services:concierge_services, smoke_free_property:smoke_free_property,
                        laundry_service:laundry_service, elevator:elevator, garden:garden, sauna:sauna, massage:massage,
                        free_parking:free_parking, fitness_centre:fitness_centre, conference_space:conference_space,
                        terrace:terrace, restaurant:restaurant, indoor_pool:indoor_pool, spa:spa, hair_salon:hair_salon,
                        shop:shop, wedding_service:wedding_service, min_avg_temperature:min_avg_temperature,
                        max_avg_temperature:max_avg_temperature, page:page, order:order, column:column},
                success : function (msg) {
                    var total = $("#totalResults").val();
                    $("#a_total_links").html(total);
                    $loading.addClass('hidden');
                    $('.hotel-search-results').html(msg);
                }
            })
        })
        $("body").on('click', '.page_link', function (event) {
            event.preventDefault();
            $loading.removeClass('hidden');
            $('.hotel-search-results').html("");
            var page = $(this).data('page');
            var city = $("#city").val();
            var star = $("#ddl-star").val();
            var tennis_court = $("#chb_tennis_court").is(":checked");
            var wifi = $("#chb_wifi").is(":checked");
            var library = $("#chb_library").is(":checked");
            var bar = $("#chb_bar").is(":checked");
            var luggage_store = $("#chb_luggage_store").is(":checked");
            var concierge_services = $("#chb_concierge_services").is(":checked");
            var smoke_free_property = $("#chb_smoke_free_property").is(":checked");
            var laundry_service = $("#chb_laundry_service").is(":checked");
            var elevator = $("#chb_elevator").is(":checked");
            var garden = $("#chb_garden").is(":checked");
            var sauna = $("#chb_sauna").is(":checked");
            var massage = $("#chb_massage").is(":checked");
            var free_parking = $("#chb_free_parking").is(":checked");
            var fitness_centre = $("#chb_fitness_centre").is(":checked");
            var conference_space = $("#chb_conference_space").is(":checked");
            var terrace = $("#chb_terrace").is(":checked");
            var restaurant = $("#chb_restaurant").is(":checked");
            var indoor_pool = $("#chb_indoor_pool").is(":checked");
            var spa = $("#chb_spa").is(":checked");
            var hair_salon = $("#chb_hair_salon").is(":checked");
            var shop = $("#chb_shop").is(":checked");
            var wedding_service = $("#chb_wedding_service").is(":checked");
            var min_avg_temperature = $("#min_avg_temperature").val();
            var max_avg_temperature = $("#max_avg_temperature").val();
            var anchor = $("#search-button").attr('name');
            var order="";
            var column="";
            $('.order').each(function () {
                if($(this).hasClass('current')){
                    order = $(this).data('order');
                    column = $(this).data('column');
                }
            })
            $.ajax({
                url : anchor,
                type : 'POST',
                data : {city:city, star:star, tennis_court:tennis_court, wifi:wifi, library:library, bar:bar,
                    luggage_store:luggage_store, concierge_services:concierge_services, smoke_free_property:smoke_free_property,
                    laundry_service:laundry_service, elevator:elevator, garden:garden, sauna:sauna, massage:massage,
                    free_parking:free_parking, fitness_centre:fitness_centre, conference_space:conference_space,
                    terrace:terrace, restaurant:restaurant, indoor_pool:indoor_pool, spa:spa, hair_salon:hair_salon,
                    shop:shop, wedding_service:wedding_service, min_avg_temperature:min_avg_temperature,
                    max_avg_temperature:max_avg_temperature, page:page, order:order, column:column},
                success : function (msg) {
                    var total = $("#totalResults").val();
                    $("#a_total_links").html(total);
                    $loading.addClass('hidden');
                    $('.hotel-search-results').html(msg);
                }
            })
        })
        $("body").on('click', '.order' ,function (event) {
            event.preventDefault();
            $loading.removeClass('hidden');
            var page = $('.pager > .current').data('page');
            var city = $("#city").val();
            var star = $("#ddl-star").val();
            var tennis_court = $("#chb_tennis_court").is(":checked");
            var wifi = $("#chb_wifi").is(":checked");
            var library = $("#chb_library").is(":checked");
            var bar = $("#chb_bar").is(":checked");
            var luggage_store = $("#chb_luggage_store").is(":checked");
            var concierge_services = $("#chb_concierge_services").is(":checked");
            var smoke_free_property = $("#chb_smoke_free_property").is(":checked");
            var laundry_service = $("#chb_laundry_service").is(":checked");
            var elevator = $("#chb_elevator").is(":checked");
            var garden = $("#chb_garden").is(":checked");
            var sauna = $("#chb_sauna").is(":checked");
            var massage = $("#chb_massage").is(":checked");
            var free_parking = $("#chb_free_parking").is(":checked");
            var fitness_centre = $("#chb_fitness_centre").is(":checked");
            var conference_space = $("#chb_conference_space").is(":checked");
            var terrace = $("#chb_terrace").is(":checked");
            var restaurant = $("#chb_restaurant").is(":checked");
            var indoor_pool = $("#chb_indoor_pool").is(":checked");
            var spa = $("#chb_spa").is(":checked");
            var hair_salon = $("#chb_hair_salon").is(":checked");
            var shop = $("#chb_shop").is(":checked");
            var wedding_service = $("#chb_wedding_service").is(":checked");
            var min_avg_temperature = $("#min_avg_temperature").val();
            var max_avg_temperature = $("#max_avg_temperature").val();
            var anchor = $("#search-button").attr('name');
            $('.order').removeClass('current');
            $('.order').removeClass('current_asc');
            $('.order').removeClass('current_desc');
            var order=$(this).data('order');
            var column=$(this).data('column');
            $(this).addClass('current');
            if(order=='asc'){
                $(this).addClass('current_asc');
            } else {
                $(this).addClass('current_desc');
            }
            $('.hotel-search-results').html("");
            $.ajax({
                url : anchor,
                type : 'POST',
                data : {city:city, star:star, tennis_court:tennis_court, wifi:wifi, library:library, bar:bar,
                    luggage_store:luggage_store, concierge_services:concierge_services, smoke_free_property:smoke_free_property,
                    laundry_service:laundry_service, elevator:elevator, garden:garden, sauna:sauna, massage:massage,
                    free_parking:free_parking, fitness_centre:fitness_centre, conference_space:conference_space,
                    terrace:terrace, restaurant:restaurant, indoor_pool:indoor_pool, spa:spa, hair_salon:hair_salon,
                    shop:shop, wedding_service:wedding_service, min_avg_temperature:min_avg_temperature,
                    max_avg_temperature:max_avg_temperature, page:page, order:order, column:column},
                success : function (msg) {
                    var total = $("#totalResults").val();
                    $("#a_total_links").html(total);
                    $loading.addClass('hidden');
                    $('.hotel-search-results').html(msg);
                }
            })
        })
    })

	"use strict";
	
	$(document).ready(function () {
		search.init();
	});
	
	var search = {
	
		init: function () {
			
			// LIST AND GRID VIEW TOGGLE
			$('.view-type li:first-child').addClass('active');
				
			$('.grid-view').click(function() {
				$('.three-fourth article').attr("class", "one-third");
				$('.view-type li').removeClass("active");
				$(this).addClass("active");
			});
			
			$('.list-view').click(function() {
				$('.three-fourth article').attr("class", "full-width");
				$('.view-type li').removeClass("active");
				$(this).addClass("active");
			});
			
			
			//STAR RATING
			$('#star').raty({
				score    : 3,
				path     : 'images/ico/',
				starOff  : 'star-rating-off.png',
				starOn  : 'star-rating-on.png'
			});
		}
	}

})(jQuery);