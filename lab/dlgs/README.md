# jQuery MSG Plugin

A jQuery BlockUI alternative plugin.



## Description
This is a simple jQuery plugin to show messages. The styles are all in jquery.msg.css file, therefore it is very easy to customize the look.



## Demo
 - Please see demo.html
 - Live demo please take a look at [this](http://dreamerslab.com/demos/jquery-blockui-alternative-with-jquery-msg-plugin)



## Documentation
  - There is a syntax highlight version, please see [this post](http://dreamerslab.com/blog/en/jquery-blockui-alternative-with-jquery-msg-plugin/)
  - For chinese version please go [here](http://dreamerslab.com/blog/tw/jquery-blockui-alternative-with-jquery-msg-plugin/)



## Requires
  - jQuery 1.3.0+
  - [jQuery center plugin](https://github.com/dreamerslab/jquery.center) v1.0.0+
  - [CSS3PIE](http://css3pie.com/)( for box-shadow and border-radius in IE. Remove it if your custom theme does not need these styles )



## Browser Compatibility
  - [Firefox](http://mzl.la/RNaI) 2.0+
  - [Internet Explorer](http://bit.ly/9fMgIQ) 6+
  - [Safari](http://bit.ly/gMhzVR) 3+
  - [Opera](http://bit.ly/fWJzaC) 10.6+
  - [Chrome](http://bit.ly/ePHvYZ) 8+



## Installation
  - First, make sure you are using valid [DOCTYPE](http://bit.ly/hQK1Rk)
  - copy blank.gif to your image folder and set the path. ex. `$.msg({ bgPath : '/images/' });`
  - Include nessesary JS files

<!-- -->

      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
      <script type="text/javascript" src="path-to-file/jquery.center.js"></script>
      <script type="text/javascript" src="path-to-file/jquery.msg.js"></script>

  - Include CSS file

<!-- -->

      <link media="screen" href="path-to-file/jquery.msg.css" rel="stylesheet" type="text/css">



## Options

#### autoUnblock
  - description: auto unblock the screen
  - data type: bool
  - default value: true
  - possible value: true, false
  - example code

<!-- -->

    $.msg({ autoUnblock : false });

#### bgPath
  - description: background image for the overlay
  - data type: 'string'
  - default value: ''
  - possible value: '/images/', '/img/', '/' ...
  - example code

<!-- -->

    $.msg({ bgPath : '/' });

#### center
  - description: options for jQuery center plugin
  - data type: object
  - default value: { topPercentage : 0.4 }
  - possible value: please check [jQuery center plugin](https://github.com/dreamerslab/jquery.center) for detail
  - example code

<!-- -->

    $.msg({
      center : {
        topPercentage : 0.5
      }
    });

#### css
  - description: extra css style for the msg content
  - data type: object
  - default value: {} (none)
  - possible value: please check [jquery.css()](http://api.jquery.com/css/)
  - example code

<!-- -->

    $.msg({
      css : {
        background : 'blue',
        border : '1px solid #cccccc'
      }
    });

#### clickUnblock
  - description: click the overlay to unblock the screen
  - data type: bool
  - default value: true
  - possible value: true, false
  - example code

<!-- -->

    $.msg({ clickUnblock : false });

#### content
  - description: the message content
  - data type: string
  - default value: "Please wait..."
  - example code

<!-- -->

    $.msg({
      content : '<img src="loading.gif"/> Sending mail :)'
    });

#### fadeIn
  - description: message fade in speed
  - data type: integer
  - default value: 200
  - example code

<!-- -->

    $.msg({ fadeIn : 500 });

#### fadeOut
  - description: message fade out speed
  - data type: integer
  - default value: 300
  - example code

<!-- -->

    $.msg({ fadeOut : 200 });

#### klass
  - description: extra class to message content, separate multiple class with space. use this option to apply custom theme
  - data type: string
  - default value: 'black-on-white'
  - example value: 'round-corner shadow'
  - example code

<!-- -->

    $.msg({ klass : 'round-corner shadow' });

#### method
  - description: jquery manipulation method to determinate how you want the message to appear
  - data type: string
  - default value: 'appendTo'
  - possible value: 'appendTo', 'prependTo', 'insertAfter', 'insertBefore'
  - example code

<!-- -->

    $.msg({ method : 'insertAfter' });

#### msgID
  - description: give this msg a ID. This is useful when you want to call a specific beforeUnblock event handler somewhere outside this msg
  - data type: integer
  - possible value: 1, 2, 3 ... must be greater than 0
  - example code

<!-- -->

    // set up a message with a ID
    $.msg({
      msgID : 1,
      beforeUnblock : function(){
        // do something here
      }
    });

    // call to unblock the screen and execute the beforeUnblock event handler with msgID = 1
    $.msg( 'unblock', 3000, 1 );

#### target
  - description: the target DOM element that the message appendTo( or 'prependTo', 'insertAfter', 'insertBefore')
  - data type: string
  - default value: 'body'
  - example value: '#layer', '#content', '#footer .nav'
  - example code

<!-- -->

    $.msg({ target : '#layer' });

#### timeOut
  - description: screen block time out
  - data type: integer
  - default value: 2400
  - example code

<!-- -->

    $.msg({ timeOut : 5000 });

#### z
  - description: the z-index of jQuery MSG element
  - data type: integer
  - default value: 1000
  - example code

<!-- -->

    $.msg({ z : 5000 });



## Events

#### afterBlock
  - description: callback function for the afterBlock event
  - example code

<!-- -->

    // show msg and replace message content woth a ajax call after block the screen
    $.msg({
      autoUnblock : false,
      afterBlock : function(){
        $.getJSON('msg/reply.json', function( rsp ){
          $.msg( 'replace', rsp );
      }
    });

#### beforeUnblock
  - description: callback function for the beforeUnblock event
  - example code

<!-- -->

    // clear all input value before screen unblock
    $.msg({
      beforeUnblock : function(){
        $( 'input' ).val( '' );
      }
    });



## Methods

#### overwriteGlobal
  - description: set global options for all `$.msg()`
  - syntax: $.msg( 'overwriteGlobal', name, config ); 'name' has to be string, and can be any options, methods or events that mentioned above; config is the value for the 'name'( option )
  - example code

<!-- -->

    // use new-cooler-theme for all messages
    $.msg( 'overwriteGlobal', 'klass', 'new-cooler-theme' );

#### replace
  - description: replace message content
  - syntax: $.msg( 'replace', content ); content has to be string
  - example code

<!-- -->

    $.msg( 'replace', '<p>This is the replaced content</>' );

#### unblock
  - description: manually unblock the screen
  - syntax: $.msg( 'unblock', microSecond, msgID ); 'microSecond' is the delay time to unblock the screen. It has to be integer, default value is 0. pass 'msgID' argument to execute specific 'beforeUnblock' event handler
  - example code

<!-- -->

    $.msg( 'unblock', 3000, 1 );



## Theme
All styles are separate from js files in jquery.msg.css. Default themes use [css3pie](http://css3pie.com/) to apply border-radius and box-shadow to IE. You can easily edit or add your custom theme.



#### Default HTML layout

    <div id="jquery-msg-overlay" class="black-on-white" style="position:absolute; z-index:1000; top:0px; right:0px; left:0px;">
      <img src="blank.gif" id="jquery-msg-bg" style="width: 100%; height: 100%; top: 0px; left: 0px;"/>
      <div id="jquery-msg-content" class="jquery-msg-content" style="position:absolute;">
        Please wait...
      </div>
    </div>



## License

The expandable plugin is licensed under the MIT License (LICENSE.txt).

Copyright (c) 2011 [Ben Lin](http://dreamerslab.com)