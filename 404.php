<!DOCTYPE html>
<html>
<head>
  <title>Error 404</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #000;
    }

    .img {
      position: absolute;
      z-index: 1;
      margin: 7.5em 27em 0em;
    }

    #container {
      display: inline-block;
      width: content-box;
      height: content-box;
      margin: 0 auto;
      position: relative;
    }

    #canvas {
      position: relative;
      z-index: 20;
    }
  </style>
</head>

<body>
  <div id="container">
    <img class="img" src="https://i.imgur.com/5SzodBW.png" alt="" />
    <canvas id="canvas"></canvas>
  </div>
  <iframe allowtransparency='false' frameborder='0' marginheight='0' marginwidth='0' scrolling='no' src='http://audio-play.blogspot.com/p/lluvia.html'
    style='height:0; width:0;'></iframe>

  <script>
    (function() {
      var canvas = document.getElementById('canvas');
      /*altura y ancho del canvas*/
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;

      if (canvas.getContext) {
        var ctx = canvas.getContext('2d');
        var w = canvas.width;
        var h = canvas.height;
        ctx.strokeStyle = 'rgba(174,194,224,0.5)'; /*Color de lluvia*/
        ctx.lineWidth = 1.1; /*tama�o de trazo*/
        ctx.lineCap = 'round';

        /*cantidad de lluvia*/
        var init = [];
        var maxParts = 2000;
        for (var a = 0; a < maxParts; a++) {
          init.push({
            x: Math.random() * w,
            y: Math.random() * h,
            l: Math.random() * 1,
            xs: -4 + Math.random() * 4 + 6,
            ys: Math.random() * 10 + 24
          });
        }

        var particles = [];
        for (var b = 0; b < maxParts; b++) {
          particles[b] = init[b];
        }
        /*dibujar la lluvia*/
        function draw() {
          ctx.clearRect(0, 0, w, h);
          for (var c = 0; c < particles.length; c++) {
            var p = particles[c];
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(p.x + p.l * p.xs, p.y + p.l * p.ys);
            ctx.stroke();
          }
          move();
        }
        /*mover la lluvia*/
        function move() {
          for (var b = 0; b < particles.length; b++) {
            var p = particles[b];
            p.x += p.xs;
            p.y += p.ys;
            if (p.x > w || p.y > h) {
              p.x = Math.random() * w;
              p.y = -20;
            }
          }
        }

        setInterval(draw, 30);

      }
    })();
  </script>
</body>
</html>
