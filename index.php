<!DOCTYPE html>
<html>
<head>
	<title>SleekSites</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<style type="text/css">
		.loading {
  background-color:#ce3635;
  text-align: center;
  color:#fff;
  padding-top:10em;
  width: 100%;
  height: 100%
}
* { color:#fff; text-decoration: none;}
	</style>
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	
</head>
<body>
<div class="loading">
<font face="Comic sans MS" >
<h1>
  <div href="" class="typewrite" data-period="600" data-type='[ "Hi.", "Welcome to SleekSites", "I Love Design.", "I Love to Develop." ]'>
    <span class="wrap"></span>
  </div>
</h1></font>
</div>
<script type="text/javascript">
 var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 8) || 1000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 150;

        if (this.isDeleting) { delta /= 4; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>
</body>
<script>
  var body_html,head_html;
    $(document).ready( function() {

    	$.ajax({
            type: 'post',
            url: 'http://localhost/ss/body.php',
            success: function(responseb) {
                // response = data which has been received and passed on to the 'success' function.
               		//$("body").attr("id","page-top")
                  body_html = responseb;
               		//$(document).html(response);
               		//document.write(response)
            }
        });
        $.ajax({
            type: 'post',
            url: 'http://localhost/ss/head.php',
            success: function(responseh) {

                // response = data which has been received and passed on to the 'success' function.
                  head_html = responseh;
               		//$("head").html(responseh)
               		//$(document).html(response);
               		//document.write(response)
            }
        });
        setTimeout(function(){
          $("body").hide();
        $("body").html(body_html);
        $("head").html(head_html);
        $("body").show();
        $(".menu_disp_none").show();
        },2000)
    });
</script>
</html>