/*! Copyright 2011, Ben Lin (http://dreamerslab.com/)
* Licensed under the MIT License (LICENSE.txt).
*
* Version: 1.0.7
*
* Requires: 
* jQuery 1.3.0+, 
* jQuery Center plugin 1.0.0+ https://github.com/dreamerslab/jquery.center
*/
// wrap all the code in an anonymous function to prevent global vars
;( function( $, doc ){

  // global configs to be use accross the whole page
  var globalConfigs = {},
  
  // global var to store the auto generate msgID
  msgID = 0,
  
  // global var to store the setTimeout function,
  // it would be call later with clearTimeout
  autoUnblock,

  // a global var to store the beforeUnblock event handler for each msg
  beforeUnblock = [ function(){}];

  // the jquery plugin
  $.msg = function(){
    var $overlay, $content, options, type, configs, _, publicMethods;
    
    options = [].shift.call( arguments );
    type = {}.toString.call( options );
    
    // merge default setting with globalConfigs
    configs = $.extend({
      // after block event handler
      afterBlock : function(){},
      autoUnblock : true,
      
      // options for $.center( center ) plugin
      center : { topPercentage : 0.4 },
      css : {},
      
      // click overlay to unblock
      clickUnblock : true,
      content : "Please wait..." ,
      fadeIn : 200,
      fadeOut : 300,
      bgPath : '',
      
      // default theme
      klass : 'black-on-white',
      
      // jquery methodds, can be appendTo, after, before...
      method : 'appendTo',
      
      // DOM target to be insert into the msg
      target : 'body',
      
      // default auto unblock count down
      timeOut : 2400,
      
      // default z-index of the overlay
      z : 1000

    }, globalConfigs );
    
    // merge default setting with user options
    type === '[object Object]' && $.extend( configs, options );
    
    // private methods
    _ = {
      // private unblock method
      unblock : function(){
        // remove msg after fade out
        $overlay = $( '#jquery-msg-overlay' ).fadeOut( configs.fadeOut, function(){

          // beforeUnblock event callback
          beforeUnblock[ configs.msgID ]( $overlay );
          $overlay.remove();
        });
        
        // clear the auto unblock function
        clearTimeout( autoUnblock );
      }
    };

    publicMethods = {
      
      // unblock the screen
      unblock : function( ms, _msgID ){
        
        // default unblock delay is 0 ms
        var _ms = ms === undefined ? 0 : ms;
        
        // set msgID
        configs.msgID = _msgID === undefined ? msgID : _msgID;
        
        setTimeout( function(){
          _.unblock();
        }, _ms );
      },
      
      // replace current content in the msg
      replace : function( content ){
        if({}.toString.call( content ) !== '[object String]' ){
          throw '$.msg(\'replace\'); error: second argument has to be a string';
        }
        
        // replace old contant with new content and set the msg box to center
        $( '#jquery-msg-content' ).empty().
          html( content ).
          center( configs.center );
      },
      
      overwriteGlobal : function( name, config ){
        globalConfigs[ name ] = config;
      }
    };
    
    // generate msgID
    msgID--;
    
    // if not specified use the auto generate msgID
    configs.msgID = configs.msgID === undefined ? 
      msgID : 
      configs.msgID;
    
    // check if the beforeUnblock event handler is defined in the user option
    // otherwise assign it a empty function
    beforeUnblock[ configs.msgID ] = configs.beforeUnblock === undefined ? 
      function(){} :
      configs.beforeUnblock;

    // if options is a string execute public method
    if( type === '[object String]' ){
      publicMethods[ options ].apply( publicMethods, arguments );
    }else{
      
      // DOM el
      // for ie fade in trans we have to use img instead of div
      $overlay = $(
        '<div id="jquery-msg-overlay" class="' + configs.klass + '" style="position:absolute; z-index:' + configs.z + '; top:0px; right:0px; left:0px; height:' + $( doc ).height() + 'px;">' +
          '<img src="' + configs.bgPath + 'blank.gif" id="jquery-msg-bg" style="width: 100%; height: 100%; top: 0px; left: 0px;"/>' +
          '<div id="jquery-msg-content" class="jquery-msg-content" style="position:absolute;">' +
            configs.content +
          '</div>' +
        '</div>'
      );
      
      // configs.method can be appendTo, after ...
      $overlay[ configs.method ]( configs.target );
      
      // set content ( msg ) to center before hiding
      // and apply user option css if any
      $content = $( '#jquery-msg-content' ).
        center( configs.center ).
        css( configs.css ).
        hide();
      
      // fadein the content after fade in the bg
      // then trigger afterBlock event handler
      $overlay.
        hide().
        fadeIn( configs.fadeIn, function(){
          $content.fadeIn( 'fast' ).children().andSelf().bind( 'click', function( e ){
            e.stopPropagation();
          });
          
          // execute afterBlock callback
          configs.afterBlock.call( publicMethods, $overlay );

          // apply click unblock if the config set to true
          configs.clickUnblock &&
            $overlay.bind( 'click', function( e ){
              e.stopPropagation();
              _.unblock();
            });
          
          // apply auto unblock if the config set to true
          if( configs.autoUnblock ){
            autoUnblock = setTimeout( _.unblock , configs.timeOut );
          }
        });
    }

    // return this to enable chaining
    return this;
  };

})( jQuery, document );