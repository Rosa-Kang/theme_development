<?php 
/**
 * Template part for displaying featured - best-sellers.
 * 
 * @package Therosessom_Theme
 */

 $best_sellers = get_field('best_sellers');
 $title = get_field('best_sellers_title');
 $button = get_field('best_sellers_button');

 if($button){
     $label = $button['title'];
 }
 ?>

 <section class="best-sellers has-background-success pt-6">
    <div class="container content-wrapper is-clipped">
        <div class="has-text-centered">
            <h2 class="my-5 is-capitalized"><?= $title;?></h2>
        </div>

        <div class="swiper bestSellerSwiper">
            <?php if($best_sellers): ?>
                <ul class="swiper-wrapper list-style-none">
                    <?php foreach($best_sellers as $post): setup_postdata($post);
                        $name = get_the_title($post -> ID);
                        $image = get_the_post_thumbnail($post -> ID);
                        $link = get_permalink($post -> ID);
                        $price = get_post_meta( $post -> ID, '_regular_price', true);
                        $sale_price = get_post_meta( $post -> ID, '_sale_price', true);
                    ?>
                        <li class="swiper-slide">
                            <div class="is-flex is-flex-direction-column is-align-items-center">
                                <a href="<?= esc_url($link);?>">
                                    <figure class="image best-sellers-image">
                                        <?= $image; ?>
                                    </figure>
                                </a>
                                <h3><?= $name; ?></h3>
                                <p class="line-through mb-0">$ <?= $price; ?></p>
                                <p class="sale-price is-size-5">$ <?= $sale_price; ?></p>
                            </div>
                        </li>
                    <?php endforeach; 
                    wp_reset_postdata(); ?>
                </ul>
            <?php endif;?>
        </div>
        
        <div class="swiper-button-next swiper-button-next-dark"></div>
        <div class="swiper-button-prev swiper-button-prev-dark"></div>
        <?php if($button): ?>
            <div class="is-flex is-justify-content-center mt-3">
                <div class="primary-button my-6">
                    <a class="is-capitalized" href="<?= esc_url($button['url']); ?>"><?= esc_html($label);?></a>
                </div>  
            </div>
        <?php endif;?>
    </div>
 </section>