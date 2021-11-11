// Sticky navbar
// =========================
            $(document).ready(function () {
                // Custom function which toggles between sticky class (is-sticky)
                var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
                    var stickyHeight = sticky.outerHeight();
                    var stickyTop = stickyWrapper.offset().top;
                    if (scrollElement.scrollTop() >= stickyTop) {
                        stickyWrapper.height(stickyHeight);
                        sticky.addClass("is-sticky");
                    }
                    else {
                        sticky.removeClass("is-sticky");
                        stickyWrapper.height('auto');
                    }
                };

                // Find all data-toggle="sticky-onscroll" elements
                $('[data-toggle="sticky-onscroll"]').each(function () {
                    var sticky = $(this);
                    var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
                    sticky.before(stickyWrapper);
                    sticky.addClass('sticky');

                    // Scroll & resize events
                    $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
                        stickyToggle(sticky, stickyWrapper, $(this));
                    });

                    // On page load
                    stickyToggle(sticky, stickyWrapper, $(window));
                });
            });


            $('.count').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
});
            // Wol slider
     $(document).ready(function() {
     var one = $("#one");
     var two = $("#two");
     one.owlCarousel({
         loop: true,
         dots:false,
         autoplay: true,
         autoplayHoverPause: false,
         margin: 10,
         responsiveClass: true,
         responsive: {
             0: {
                 items: 1,
                 nav: true
             },
             600: {
                 items: 3,
                 nav: false
             },
             1000: {
                 items: 3,
                 nav: true,
                 loop: false
             }
         }
     });

     two.owlCarousel({
         nav    : true,
         loop: false,
         margin: 10,
         autoplay: false,
         autoplayTimeout: 1000,
         responsiveClass: true,
         responsive: {
             0: {
                 items: 1,
                 nav: true
             },
             600: {
                 items: 3,
                 nav: false
             },
             1000: {
                 items: 4,
                 nav: true,
                 loop: false
             }
         }
     });

 });
$(window).on("load", function() {
        var $container = $('.portfolio-container');
        if ($.isFunction($.fn.isotope)) { $container.isotope({ filter: '*', animationOptions: { queue: true } }); }
        $('.portfolio-nav li').on('click', function() { $('.portfolio-nav .current').removeClass('current');
            $(this).addClass('current'); if ($.isFunction($.fn.isotope)) { var selector = $(this).attr('data-filter');
                $container.isotope({ filter: selector, animationOptions: { queue: true } }); return false; } });
    });
    $(window).on("load", function() {
        var $courseContainer = $('.reptro-course-isotope');
        if ($.isFunction($.fn.isotope)) { $courseContainer.isotope({ filter: '*', animationOptions: { queue: true } }); }
        $('.reptro-category-items li').on('click', function() { $('.reptro-category-items .active').removeClass('active');
            $(this).addClass('active'); if ($.isFunction($.fn.isotope)) { var CourseCatSelector = $(this).attr('data-filter');
                $courseContainer.isotope({ filter: CourseCatSelector, animationOptions: { queue: true } }); return false; } });
    });/*!
 * Isotope PACKAGED v3.0.1
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * http://isotope.metafizzy.co
 * Copyright 2016 Metafizzy
 */
(function(window,factory){'use strict';if(typeof define=='function'&&define.amd){define('jquery-bridget/jquery-bridget',['jquery'],function(jQuery){factory(window,jQuery);});}else if(typeof module=='object'&&module.exports){module.exports=factory(window,require('jquery'));}else{window.jQueryBridget=factory(window,window.jQuery);}}(window,function factory(window,jQuery){'use strict';var arraySlice=Array.prototype.slice;var console=window.console;var logError=typeof console=='undefined'?function(){}:function(message){console.error(message);};function jQueryBridget(namespace,PluginClass,$){$=$||jQuery||window.jQuery;if(!$){return;}
if(!PluginClass.prototype.option){PluginClass.prototype.option=function(opts){if(!$.isPlainObject(opts)){return;}
this.options=$.extend(true,this.options,opts);};}
$.fn[namespace]=function(arg0){if(typeof arg0=='string'){var args=arraySlice.call(arguments,1);return methodCall(this,arg0,args);}
plainCall(this,arg0);return this;};function methodCall($elems,methodName,args){var returnValue;var pluginMethodStr='$().'+namespace+'("'+methodName+'")';$elems.each(function(i,elem){var instance=$.data(elem,namespace);if(!instance){logError(namespace+' not initialized. Cannot call methods, i.e. '+
pluginMethodStr);return;}
var method=instance[methodName];if(!method||methodName.charAt(0)=='_'){logError(pluginMethodStr+' is not a valid method');return;}
var value=method.apply(instance,args);returnValue=returnValue===undefined?value:returnValue;});return returnValue!==undefined?returnValue:$elems;}
function plainCall($elems,options){$elems.each(function(i,elem){var instance=$.data(elem,namespace);if(instance){instance.option(options);instance._init();}else{instance=new PluginClass(elem,options);$.data(elem,namespace,instance);}});}
updateJQuery($);}
function updateJQuery($){if(!$||($&&$.bridget)){return;}
$.bridget=jQueryBridget;}
updateJQuery(jQuery||window.jQuery);return jQueryBridget;}));(function(global,factory){if(typeof define=='function'&&define.amd){define('ev-emitter/ev-emitter',factory);}else if(typeof module=='object'&&module.exports){module.exports=factory();}else{global.EvEmitter=factory();}}(typeof window!='undefined'?window:this,function(){function EvEmitter(){}
var proto=EvEmitter.prototype;proto.on=function(eventName,listener){if(!eventName||!listener){return;}
var events=this._events=this._events||{};var listeners=events[eventName]=events[eventName]||[];if(listeners.indexOf(listener)==-1){listeners.push(listener);}
return this;};proto.once=function(eventName,listener){if(!eventName||!listener){return;}
this.on(eventName,listener);var onceEvents=this._onceEvents=this._onceEvents||{};var onceListeners=onceEvents[eventName]=onceEvents[eventName]||{};onceListeners[listener]=true;return this;};proto.off=function(eventName,listener){var listeners=this._events&&this._events[eventName];if(!listeners||!listeners.length){return;}
var index=listeners.indexOf(listener);if(index!=-1){listeners.splice(index,1);}
return this;};proto.emitEvent=function(eventName,args){var listeners=this._events&&this._events[eventName];if(!listeners||!listeners.length){return;}
var i=0;var listener=listeners[i];args=args||[];var onceListeners=this._onceEvents&&this._onceEvents[eventName];while(listener){var isOnce=onceListeners&&onceListeners[listener];if(isOnce){this.off(eventName,listener);delete onceListeners[listener];}
listener.apply(this,args);i+=isOnce?0:1;listener=listeners[i];}
return this;};return EvEmitter;}));
// $(document).ready(function() {
//             $('.portfolio-nav li').on('click', function() {
//                 $('.portfolio-nav .current').removeClass('current');
//                 $(this).addClass('current');
//                 if ($.isFunction($.fn.isotope)) {
//                     var selector = $(this).attr('data-filter');
//                     $container.isotope({ filter: selector, animationOptions: { queue: true } });
//                     return false;
//                 }
//             });
//         });

// $(window).on("load", function() { 
//     var $container = $('.portfolio-container'); 
//     if ($.isFunction($.fn.isotope)) { $container.isotope({ filter: '*', animationOptions: { queue: true } }); }
//     });
