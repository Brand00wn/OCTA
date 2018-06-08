var elements = [$(".intro1"), $(".username"), $(".password"), $(".submit"), $("#info .row")];
TweenMax.set($(".avatar"), {"opacity": 0, "display": "none"});

TweenMax.set([$(".wrapper"), elements], {"scale": 0, "opacity": 0});
TweenMax.set(elements, {"scale": 0, "opacity": 0});
TweenMax.set([$(".loading"), $(".success"), $(".failure")], {"scale": 0, "display": "none", "opacity": 0});

$(document).ready(function() {				
	TweenMax.to($(".wrapper"), 1.5, {"opacity":1, "scale":"1", ease: Power4.easeInOut, delay: 0.75});
	TweenMax.staggerTo(elements, 1, {"opacity":1, "scale":"1", ease:Expo.easeOut, delay: 1.75}, 0.1);
});

/* Click on the SUBMIT button */
$(".submit input[type='submit']").click(function(e) {
	e.preventDefault();

	var buttonAnim = $(".morphButton");
	buttonAnim.css({
		'width'		: $(this).outerWidth(),
		'height'	: $(this).outerHeight(),
		'position'	: 'absolute',
		'top'		: $(this).offset().top,
		'left'		: $(this).offset().left,
		'z-index'	: 999,
		'overflow'	: 'hidden'
	});

	var keepMeCentered = (($(".submit input[type='submit']").offset().left + (buttonAnim.width() / 2))) - $(".morphButton").height()/2;

	// if successful
	if($("#username").val() == "john@doe.com" && $("#password").val() == "test") {
		var timeline = new TimelineMax();
		timeline.to($(".morphButton"), 0, {"opacity": 1} )
				.to($(this), 0, {"opacity": 0, "visibility": "hidden"})
				.to($(".morphButton"), 0.5, {"width": $(".morphButton").height(), "left": keepMeCentered, ease:Back.easeInOut, onComplete:function(){
					TweenMax.to($(".loading"), 0.3, {"scale": "1", "display": "inline-block", "opacity": 1, ease: Power4.easeInOut, onComplete:function(){
						setTimeout(morphSuccess, 300) /* Faking a little the loading process */
					}});
				}}
		);
	}
	else {
		var timeline = new TimelineMax();
		timeline.to($(".morphButton"), 0, {"opacity": 1} )
				.to($(this), 0, {"opacity": 0, "visibility": "hidden"})
				.to($(".morphButton"), 0.5, {"width": $(".morphButton").height(), "left": keepMeCentered, ease:Back.easeInOut, onComplete:function(){
					TweenMax.to($(".loading"), 0.3, {"scale": "1", "display": "inline-block", "opacity": 1, ease: Power4.easeInOut, onComplete:function(){
						setTimeout(morphFail, 300) /* Faking a little the loading process */
					}});
				}}
		);
	}
});

function morphSuccess() {
	TweenMax.to($(".intro2"), 1, {"opacity": 0});
	var elements = [$(".username"), $(".password"), $(".submit")];

	var timeline = new TimelineMax();
	timeline.to($(".loading"), 1.5, {"scale": "0", "opacity": "0", ease: Elastic.easeIn, onComplete:function(){ $(".loading").css("display", "none"); } })
			.to($(".morphButton"), 0.5, {"backgroundColor": "#0f9d58", ease:Back.easeInOut})
			.to($(".success"), 1, {"scale": "1", "opacity": "1", "display": "inline-block", ease: Elastic.easeOut}, "-=0.3")
			.staggerTo(elements, 0.5, {"scale": 0, "opacity": 0, ease:Back.easeIn, onComplete:function(){
				var headerAnim = $(".morphHeader");
				headerAnim.css({
					'width'		: $(".wrapper").outerWidth(),
					'height'	: $(".header").outerHeight(),
					'position'	: 'absolute',
					'top'		: $(".wrapper").offset().top,
					'left'		: $(".wrapper").offset().left,
					'z-index'	: 100,
					'overflow'	: 'hidden',
					'opacity'	: 1
				});
				TweenMax.set($(".header"), {"opacity": 0});
				TweenMax.to($(".morphHeader span"), 0.5, {"opacity": 0});
				TweenMax.to($(".morphHeader"), 0.5, {"padding": 0, "height": ($(".wrapper").outerHeight()+"px"), "line-height": (($(".wrapper").outerHeight()-150)+"px"), onComplete:function(){
					$(".morphHeader span").html("Welcome John!");
					TweenMax.to($(".morphHeader span"), 0.25, {"opacity": 1})
					TweenMax.to($(".success"), 0.5, {"opacity": 0, onComplete:function(){
						$(".success").css("display", "none");
						$(".avatar").css("display", "block");
						TweenMax.to($(".avatar"), 1, {"opacity": 1});
						TweenMax.to($(".morphButton"), 0.5, {
							"left": ($(".morphButton").offset().left - 55)+"px",
							"top": ($(".morphButton").offset().top - 130)+"px",
							"width": "150px", "height": "150px", ease: Power4.easeInOut
						});
					}})
				}});
			}}, 0.1)
	;
}

function morphFail() {
	var timeline = new TimelineMax();
	timeline.to($(".loading"), 1.5, {"scale": "0", "opacity": "0", ease: Elastic.easeIn, onComplete:function(){ $(".loading").css("display", "none"); } })
			.to($(".morphButton"), 0.5, {"backgroundColor": "#cc231a", ease:Back.easeInOut, onComplete:function() {
				TweenMax.to($(".failure"), 0.5, {"scale": "1", "opacity": "1", "display": "inline-block", ease: Elastic.easeOut}, "-=0.3"); TweenMax.to([$(".wrapper"), $(".morphButton")], 0.1, {x:"+=10", yoyo:true, repeat:5, ease:Power4.easeInOut});
			}})
			.to([$(".failure"), $(".morphButton")], 0.5, {"opacity": "0", delay: 1})
			.to($(".morphButton"), 0.3, {"width": $(".submit input[type='submit']").outerWidth(), "backgroundColor": "#1677bb", "left": "-1000px"})
			.set([$(".success"), $(".failure")], {"display": "none"})
			.to($(".submit input[type='submit']"), 0, {"opacity": 1, "visibility": "visible", onComplete:function(){
				TweenMax.to($(".intro1"), 1, {"opacity": 0})
				TweenMax.to($(".intro2"), 1, {"opacity": 1})
			}})
	;
}

$(window).resize(function(){
	$(".morphButton").css("left", (($(".submit input[type='submit']").offset().left + ($(".morphButton").width() / 2) ) - $(".morphButton").height()/2)+"px");
	$(".morphButton").css("top", $(".submit input[type='submit']").offset().top);
});