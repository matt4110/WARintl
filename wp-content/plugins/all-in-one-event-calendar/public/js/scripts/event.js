timely.define(["jquery_timely","domReady","ai1ec_config","scripts/event/gmaps_helper"],function(e,t,n,r){var i=function(){e("#ai1ec-gmap-canvas").length>0&&timely.require(["libs/gmaps"],function(e){e(r.init_gmaps)})},s=function(){e(".ai1ec-gmap-placeholder:first").click(r.handle_show_map_when_clicking_on_placeholder)},o=function(){e("#timely-description img[data-ai1ec-hidden]").each(function(){var t=e(this),n=e("#timely-event-poster img").attr("src");t.attr("src")!=n&&t.removeAttr("data-ai1ec-hidden")})},u=function(){t(function(){i(),s(),o(),e(document).trigger("event_page_ready.ai1ec"),e("body").addClass("ai1ec-event-details-ready")})};return{start:u}});