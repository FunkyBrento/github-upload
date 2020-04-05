<?php
/*
* Template Name: FrontPage
*/	
get_header();	

get_template_part( 'sections/free-edu','slider' );
get_template_part( 'sections/free-edu','feature' );
get_template_part( 'sections/free-edu','enroll' );
get_template_part( 'sections/free-edu','course' );
get_template_part( 'sections/free-edu','call-to-action' );
get_template_part( 'sections/free-edu','teacher' );
get_template_part( 'sections/free-edu','testimonials' );
get_template_part( 'sections/free-edu','events' );
get_template_part( 'sections/free-edu','counter' );
get_template_part( 'sections/free-edu','blogs' );

get_footer(); 