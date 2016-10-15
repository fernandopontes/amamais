<?php
get_header();
?>
    <section id="page-title" class="page-title-mini">

        <div class="container clearfix">
            <h1><?php $post_type = get_post_type_object(get_post_type());
                echo $post_type->labels->name; ?></h1>
            <span></span>
            <ol class="breadcrumb">
                <li><a href="<?php print(home_url()); ?>">Página inicial</a></li>
                <li class="active"><?php
                    $post_type = get_post_type_object(get_post_type());
                    echo $post_type->labels->name;
                    ?></li>
            </ol>
        </div>

    </section>

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <article>
                        <?php

                            while (have_posts()) {
                                the_post();

                                get_template_part('inc/content', 'archive-startups');
                            }

                            print('<div class="clearfix text-right">');

                            if (function_exists('wp_pagenavi'))
                                wp_pagenavi();

                            print('</div>');
                        ?>
                    </article>
                </div>
            </div>

        </div>

    </section>

<?php
get_footer();


