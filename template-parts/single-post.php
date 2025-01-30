<?php
$title = get_the_title();
$cat = get_the_category();
$authors = get_the_terms(get_the_ID(), 'authors');
$cat = $cat? $cat[0] : '';
//$date = get_the_date('j F Y');
//MODIFIED DATE OVERRIDE
$date = get_the_modified_date('j F Y');
$thumbnailID = get_post_thumbnail_id();
?>
<section class="article bg-[#f7f9fa] !px-0">
  <div class="max-w-[1400px] px-[20px] mx-auto w-full">
    <section class="bg-white mb-[26px] !p-[20px] lg:!p-[50px] [&_img]:h-[400px] lg:[&_img]:h-[600px] [&_img]:object-cover">
        <div class="">
        <img src="<?= get_the_post_thumbnail_url(null, 'full');?>" alt="" class="w-full">
        </div>
    </section>
    <div class="article__outer lg:gap-[20px]">
        <div class="article__right mb-[40px] lg:mb-0">
            <?php
                get_template_part('template-parts/post-builder/download-template');
                //get_template_part('template-parts/post-builder/related-articles', false, ['cat' => $cat]);
                //get_template_part('template-parts/post-builder/newsletter-form');
            ?>
        </div>
        <div class="article__inner">
            <div class="article__img">
                <?= wp_get_attachment_image($thumbnailID, [644, 360]); ?>
            </div>

            <?php
				//ASC ADDED 230523
				if (have_posts()) : 
					while (have_posts()) : the_post(); 
						$content = get_the_content();
						if (!empty($content)) {
							echo apply_filters('the_content', $content);
						}
					endwhile;
				endif;
				//END

                get_template_part('template-parts/post-builder');
                //get_template_part('template-parts/post-builder/social-network-share');
            ?>
        </div>

     
    </div>
  </div>
</section>