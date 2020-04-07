<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Embedded Facebook Page Photo Gallery with jQuery</title>
    <style type='text/css'> #thumbs{float:left;width:200px;} #thumbs img{display:block;margin:0 0 10px;cursor:pointer;} #viewer{float:left;} </style>
  </head>
  <body>
    <h1>Embedded Facebook Page Photo Gallery with jQuery</h1>
        
    <h2></h2>
    <nav id='thumbs'></nav>
    <img id='viewer'>
 
    <script src="//code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>  
    <script type="text/javascript">
      (function (gallery_id) {
        var title = $('h2'),
            viewer = $('#viewer'),
            thumbs = $('#thumbs');
        
        // album info
        $.getJSON('//graph.facebook.com/' + gallery_id + '?callback=?', function(json, status, xhr) {
          title.html('<a href="' + json.link + '">' + json.name + '</a> from ' + json.from.name);
        });
 
        // images
        $.getJSON('//graph.facebook.com/' + gallery_id + '/photos?callback=?', function(json, status, xhr) {
          var imgs = json.data;
 
          viewer.attr('src', imgs[0].images[0].source)
 
          for (var i = 0, l = imgs.length - 1; i < l; i++) {
            $('<img src="' + imgs[i].images[3].source + '" data-fullsize="' + imgs[i].images[0].source + '">').appendTo(thumbs);
          }
      
          $('img', thumbs).bind('click', function(e) {
            e.preventDefault();
            viewer.attr('src', $(this).attr('data-fullsize'));
          });
        });
      })('426067170422'); // let's go -- put the gallery ID here
    </script>
  </body>
</html>

<!-- 
https://developers.facebook.com/tools/explorer/?method=GET&path=10150146071791729 
https://developers.facebook.com/docs/reference/api/album/
https://developers.facebook.com/
-->