    <!-- Slick Slider --> 
<style>
	
.container-fluid
	{
/*		display:none;*/
	}
</style>  
       
        <script>
      $('.slick-carousal1').slick({
		  infinite: true,
		  autoplay: true,
		  autoplaySpeed: 6000,
		  arrows: false,
		  speed: 1,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				dots: true
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		  ]
		});
    </script>
        <script>
      $('.slick-carousal2').slick({
		  infinite: true,
		  autoplay: true,
		  autoplaySpeed: 6000,
		  arrows: false,
		  speed: 1,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				dots: true
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		  ]
		});
    </script>

	<footer id="site-footer">
		<div class="container">
			<div id="copyright">
			Copyright &copy; <?php echo date("Y"); ?> by <a href="http://adslive.com/">African Directory Services</a>. All Rights Reserved. </div>
			<nav>
				<a href="<?php echo HTTP_BASE_PATH; ?>home/about">About Us</a> |
				<a href="<?php echo HTTP_BASE_PATH; ?>home/contact">Contact Us</a> |
				<a href="<?php echo HTTP_BASE_PATH; ?>home/terms">Terms &amp; Conditions</a> |
				<a href="<?php echo HTTP_BASE_PATH; ?>home/terms">Privacy Policy</a>
			</nav>
		</div><!-- /container -->
	</footer><!-- /site-footer -->

	</body>
</html>