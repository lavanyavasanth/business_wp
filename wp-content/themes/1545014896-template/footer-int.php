<?php
/**
 * The template for displaying the footer
 */
?>

		</div>
<!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<div id="iksamh" class="footer">
<div id="il1qtv" class="footer">
<div id="iawq5k" class="footer-left">
<a href="https://themesgenerator.com/" target="_blank" title="Landing Page" id="iwq7gj" class="footer-link">
<span id="tgimg-9">
<img <?php if( get_theme_mod( "tgimg-9") != "" ) {echo "src='".get_theme_mod( "tgimg-9")."'";} else {echo " src='".get_template_directory_uri()."/images/output-onlinepngtools6-406.png'";} ?>
  id="ib1icl" class="footer-image" />
</span>
</a>
</div>
<div id="ihceuv" class="footer-right">
<a title="Twitter" href="www.twitter.com" target="_blank" id="i72b0x" class="twitter-link">
<span id="tgimg-10">
<img <?php if( get_theme_mod( "tgimg-10") != "" ) {echo "src='".get_theme_mod( "tgimg-10")."'";} else {echo " src='".get_template_directory_uri()."/images/index-267.png'";} ?>
  id="i4p2t6" class="twitter" />
</span>
</a>
<a title="Instagram" href="www.instagram.com" target="_blank" id="i0nlyt" class="insta-link">
<span id="tgimg-11">
<img <?php if( get_theme_mod( "tgimg-11") != "" ) {echo "src='".get_theme_mod( "tgimg-11")."'";} else {echo " src='".get_template_directory_uri()."/images/Instagram-Logo-c50.jpg'";} ?>
  id="ib0c2t" class="insta" />
</span>
</a>
<a title="Facebook" href="www.facebook.com" target="_blank" id="i8exqc" class="fb-link">
<span id="tgimg-12">
<img <?php if( get_theme_mod( "tgimg-12") != "" ) {echo "src='".get_theme_mod( "tgimg-12")."'";} else {echo " src='".get_template_directory_uri()."/images/images-c26.png'";} ?>
  id="ioawda" class="facebook" />
</span>
</a>
<a title="Linkedin" href="www.linkedin.com" target="_blank" id="ixzeft" class="linkedin-link">
<span id="tgimg-13">
<img <?php if( get_theme_mod( "tgimg-13") != "" ) {echo "src='".get_theme_mod( "tgimg-13")."'";} else {echo " src='".get_template_directory_uri()."/images/images4-1d6.jpg'";} ?>
 id="iil8vd"  class="linkedin" />
</span>
</a>
<div id="i66uzw" class="footer-txt-right">
<span id="im35wj">
<span id="tgtext-18">
<?php if( get_theme_mod( "tgtext-18") != "" ) {echo get_theme_mod( "tgtext-18");} else {echo "©All Rights Reserved 2018";} ?>
</span>
</span>
</div>
</div>
<div id="izj7fd">
</div>
</div>
</div>

				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>

					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'themesgenerator' ); ?>
">

						<?php
							wp_nav_menu( array(
								'theme_location' =>
 'social',
								'menu_class'     =>
 'social-links-menu',
								'depth'          =>
 1,
								'link_before'    =>
 '<span class="screen-reader-text">
',
								'link_after'     =>
 '</span>
' . themesgenerator_get_svg( array( 'icon' =>
 'chain' ) ),
							) );
						?>

					</nav>
<!-- .social-navigation -->

				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>

			<!-- </div>
 .wrap -->

		</footer>
<!-- #colophon -->

	</div>
<!-- .site-content-contain -->

</div>
<!-- #page -->

<?php wp_footer(); ?>



<script>

//wait for the document to be fully loaded to execute
jQuery(document).ready(function(){
	
    
	// run test on initial page load
    checkSize();
    // run test on resize of the window
    jQuery(window).resize(checkSize);
	
	
	//Function to the css rule
	function checkSize(){
		if ((jQuery(".navbarleft2-items-c").css("display") == "none" )||(jQuery(".navbarcenter-items-c").css("display") == "none" )||(jQuery(".navbar-items-c").css("display") == "none" )){
			// your code here
			jQuery('.navbar-items-c').hide();   
			jQuery('.navbar-menu ul').hide();
			jQuery('.navbarleft2-items-c').hide();   
			jQuery('.navbar-menu ul').hide();
			jQuery('.navbarcenter-items-c').hide();   
			jQuery('.navbar-menu ul').hide();	
		}
	}




/*Burger mobile toggle*/	
  jQuery(document).on('click','.navbar-burger',function(){
    jQuery('.navbar-items-c').toggle();   
	jQuery('.navbar-menu ul').toggle();
  });
   
  jQuery(document).on('click','.navbarleft2-burger',function(){
    jQuery('.navbarleft2-items-c').toggle();   
	jQuery('.navbar-menu ul').toggle();
  });
  
  jQuery(document).on('click','.navbarcenter-burger',function(){
    jQuery('.navbarcenter-items-c').toggle();   
	jQuery('.navbar-menu ul').toggle();
  });  
  

  
  /*Modifies overflow for the menu parent & adds extra security div*/	
	if (jQuery('[class^="maincont-"]').has("[class^=\"navbar-\"]").css('overflow-x')){ 	jQuery('[class^="maincont-"]').has("[class^=\"navbar-\"]").css( "overflow-x", "visible" ); 	jQuery('[class^="maincont-"]').has("[class^=\"navbar-\"]").append(atob('PGRpdiBzdHlsZT0nY2xlYXI6Ym90aDsnPjwvZGl2Pg=='));	}
	if (jQuery('[class^="maincont-"]').has("[class^=\"navbar-\"]").css('overflow-y')){ 	jQuery('[class^="maincont-"]').has("[class^=\"navbar-\"]").css( "overflow-y", "visible" ); 	}
  
});

//Fixed headers snippet
jQuery('body').children().each(function () {
	  var $this = jQuery(this);                                                                                                                                
	  if ($this.css("position") === "fixed"){
		  if ($this.css("zIndex") === "auto"){
			//console.log("is fixed and z-index is auto");  
		    jQuery(this).css('zIndex',3000);
		  } 
	  }
});
</script>


<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

<link rel='stylesheet' id='dashicons-css'  href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css'>
	
<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js">
</script>
        
<script>

wow = new WOW(
	{
	  boxClass:     'tganimate',
	  animateClass: 'animated',
	  offset:       0,
	  mobile:       true,
	  live:         true
	}
)
wow.init();
</script>

</body>

</html>

