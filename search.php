<?php 

get_header();
?>

<?php 
    if($_GET['s'] && !empty($_GET['s']))
    {
        $text = $_GET['s'];
    }

    if($_GET['type'] && !empty($_GET['type']))
    {
        $type = $_GET['type'];
    }

?>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(<?php echo get_template_directory_uri();?>/img/bg-img/13.jpg);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">
				<div class="breadcrumb-content">
					<h2>Careers</h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Careers</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### News Area Start ##### -->
<section class="news-area section-padding-100">
	<div class="container">
		<div class="row">
			<!-- Single News Area -->
			<div class="col-12 col-lg-8">

				<!-- Single Blog Area -->
			 <?php
                if(have_posts()) {
                    $args = array(
                        'post_type' => $type,
                        'posts_per_page' => -1,
                        's' => $text,
                    );
                    $query = new WP_Query($args);
                    while($query -> have_posts()) : $query -> the_post(); 

                ?>
					<div class="single-blog-area mb-70">
						<div class="blog-thumbnail">
							<a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url();?>" alt=""></a>
						</div>
						<div class="blog-content">
							<span><?php the_date();?></span>
							<a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a>
							<div class="blog-meta">
								<a href="<?php the_permalink();?>" class="post-author"><img src="<?php echo get_template_directory_uri();?>/img/core-img/pencil.png" alt=""><?php the_author(); ?></a>
								<a href="<?php the_permalink();?>" class="post-date"><img src="<?php echo get_template_directory_uri();?>/img/core-img/calendar.png" alt=""><?php the_time('F y');?></a>
							</div>
							<?php the_content(); ?>
						</div>
					</div>

				 <?php endwhile; wp_reset_query(); ?>
                   <?php } else { ?>
                           <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                   <?php } ?>

				

				<!-- Pagination -->
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<li class="page-item active"><a class="page-link" href="#">01</a></li>
						<li class="page-item"><a class="page-link" href="#">02</a></li>
						<li class="page-item"><a class="page-link" href="#">03</a></li>
					</ul>
				</nav>
			</div>

			<!-- Sidebar Area -->
			<div class="col-12 col-sm-9 col-md-6 col-lg-4">
				<div class="sidebar-area">

					<!-- Single Sidebar Widget -->
					<div class="single-widget-area search-widget">
						<form action="" method="post">
							<input type="search" name="s" placeholder="Search">
							<button type="submit">Search</button>
						</form>
					</div>

					<!-- Single Sidebar Widget -->
					<div class="single-widget-area cata-widget">
						<div class="widget-heading">
							<div class="line"></div>
							<h4>Categories</h4>
						</div>
		
                             <?php the_content();?>
		                    
         
					</div>

					<!-- Single Sidebar Widget -->
					<div class="single-widget-area tabs-widget">
						<div class="widget-heading">
							<div class="line"></div>
							<h4>Latest News</h4>
						</div>

						<div class="credit-tabs-content">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Latest</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Popular</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true">Comments</a>
								</li>
							</ul>

							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="tab--1">
									<div class="credit-tab-content">
										<!-- Single News Area -->
										<?php 
                                           $latest = new WP_Query(array(
                                               'post_type' => 'post',
                                               'orderby'=>'date',
                                               'order'=>'DESC',
                                               'posts_per_page' => 3,
                                               'category_name' => 'latest'
                                            ));

                                           while($latest->have_posts()) : $latest->the_post();
                                           ?>
                                            <div class="single-news-area d-flex align-items-center">
                                                <div class="news-thumbnail">
                                                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                                </div>
                                                <div class="news-content">
                                                    <span><?php the_date();?></span>
                                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                                    <div class="news-meta">
                                                        <a href="<?php the_permalink();?>" class="post-author"><img src="<?php echo get_template_directory_uri();?>/img/core-img/pencil.png" alt=""> <?php the_author(); ?></a>
                                                        <a href="<?php the_permalink();?>" class="post-date"><img src="<?php echo get_template_directory_uri();?>/img/core-img/calendar.png" alt=""> <?php the_time('F y');?></a>
                                                    </div>
                                                </div>
                                            </div>

										
                                    <?php endwhile; wp_reset_postdata(); ?>
										
									</div>
								</div>

								<div class="tab-pane fade show active" id="tab2" role="tabpanel" aria-labelledby="tab--2">
									<div class="credit-tab-content">
										<!-- Single News Area -->
										<?php 
                                           $popular = new WP_Query(array(
                                               'post_type' => 'post',
                                               'orderby'=>'date',
                                               'order'=>'DESC',
                                               'posts_per_page' => 3,
                                               'category_name' => 'popular'
                                            ));

                                           while($popular->have_posts()) : $popular->the_post();
                                           ?>
                                            <div class="single-news-area d-flex align-items-center">
                                                <div class="news-thumbnail">
                                                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                                </div>
                                                <div class="news-content">
                                                    <span><?php the_date();?></span>
                                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                                    <div class="news-meta">
                                                        <a href="<?php the_permalink();?>" class="post-author"><img src="<?php echo get_template_directory_uri();?>/img/core-img/pencil.png" alt=""> <?php the_author(); ?></a>
                                                        <a href="<?php the_permalink();?>" class="post-date"><img src="<?php echo get_template_directory_uri();?>/img/core-img/calendar.png" alt=""> <?php the_time('F y');?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; wp_reset_postdata(); ?>
									</div>
								</div>
								<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
									<div class="credit-tab-content">
										
										

										<!-- Single News Area -->
										<?php 
                                           $comments = new WP_Query(array(
                                               'post_type' => 'post',
                                               'orderby'=>'date',
                                               'order'=>'DESC',
                                               'posts_per_page' => 3,
                                               'category_name' => 'comments'
                                            ));

                                           while($comments->have_posts()) : $comments->the_post();
                                           ?>
                                            <div class="single-news-area d-flex align-items-center">
                                                <div class="news-thumbnail">
                                                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                                </div>
                                                <div class="news-content">
                                                    <span><?php the_date();?></span>
                                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                                    <div class="news-meta">
                                                        <a href="<?php the_permalink();?>" class="post-author"><img src="<?php echo get_template_directory_uri();?>/img/core-img/pencil.png" alt=""> <?php the_author(); ?></a>
                                                        <a href="<?php the_permalink();?>" class="post-date"><img src="<?php echo get_template_directory_uri();?>/img/core-img/calendar.png" alt=""> <?php the_time('F y');?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; wp_reset_postdata(); ?>
										
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- ##### News Area End ##### -->

<!-- ##### Newsletter Area Start ###### -->
<section class="newsletter-area section-padding-100 bg-img jarallax" style="background-image: url(<?php echo get_template_directory_uri();?>/img/bg-img/6.jpg);">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-10 col-lg-8">
				<div class="nl-content text-center">
					<h2>Subscribe to our newsletter</h2>
					<?php echo do_shortcode('[newsletter]'); ?>
					<p>We are committed to keeping your e-mail address confidential. We do not sell, rent, or lease our subscription lists to third parties.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ##### Newsletter Area End ###### -->
<?php
get_footer();
