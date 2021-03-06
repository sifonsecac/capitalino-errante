<?php get_header(); ?>

<nav class="nav has-shadow">
    <div class="nav-left">
        <a class="nav-item" href="/">
            <img src="https://capitalinoerrante.com/wp-content/uploads/2016/11/CAPITALINOBABY.jpg" alt="Bulma logo">
        </a>
    </div>

    <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </span>

    <?php
        wp_nav_menu(array(
            'container'       => false,
            'container_id'    => false,
            'menu_class'      => 'nav-right nav-menu',
            'menu_id'         => false,
            'fallback_cb'     => false,
            'items_wrap'      => '<div class="%2$s">%3$s</div>',
            'depth'           => 1,
            'walker'          => new Description_Walker
        ));
    ?>
</nav>

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

<?php if ($paged == 1): ?>
    <?php $query1 = new WP_Query( array('posts_per_page' => 5) ); ?>
    <!-- Swiper -->
    <div class="swiper-container">
       <div class="swiper-wrapper">
           <?php if ($query1->have_posts()): while ($query1->have_posts()): $query1->the_post(); ?>
               <div class="swiper-slide image-background " style="background-image: url('<?php the_post_thumbnail_url() ?>');">
                   <div class="is-overlay" style="align-items: center;display: flex;justify-content: center;flex-direction: column; background-color: rgba(0, 0, 0, 0.4);">
                       <h1 class="title is-2 color-white is-block" style="max-width: 600px; margin-left: 1.5rem; margin-right: 1.35rem;"><?php the_title() ?></h1> <br>
                       <a href="<?php echo get_permalink(); ?>" class="button is-medium is-primary is-inverted is-outlined">Leer más</a>
                   </div>
               </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
       </div>
       <!-- Add Pagination -->
       <div class="swiper-pagination"></div>
    </div>
<?php endif; ?>

<!-- <nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item is-tab " href="http://bulma.io/documentation/components/card/">
        Card
      </a>
      <a class="nav-item is-tab " href="http://bulma.io/documentation/components/level/">
        Level
      </a>
      <a class="nav-item is-tab " href="http://bulma.io/documentation/components/media-object/">
        Media object
      </a>
      <a class="nav-item is-tab " href="http://bulma.io/documentation/components/menu/">
        Menu
      </a>
      <a class="nav-item is-tab " href="http://bulma.io/documentation/components/message/">
        Message
      </a>
      <a class="nav-item is-tab " href="http://bulma.io/documentation/components/modal/">
        Modal
      </a>
      <a class="nav-item is-tab " href="http://bulma.io/documentation/components/nav/">
        Nav
      </a>
      <a class="nav-item is-tab " href="http://bulma.io/documentation/components/pagination/">
        Pagination
      </a>
      <a class="nav-item is-tab " href="http://bulma.io/documentation/components/panel/">
        Panel
      </a>
      <a class="nav-item is-tab is-active" href="http://bulma.io/documentation/components/tabs/">
        Tabs
      </a>
    </div>
  </div>
</nav> --> <!-- integrar menu de categorias aquí -->

<section class="section is-paddingless">

    <div class="container">

        <h2 class="subtitle has-text-centered" style="margin: 3rem 0 1.5rem 0;">La guía definitiva de la <strong>Ciudad de México.</strong></h2>

        <div class="columns is-marginless" style="flex-flow: row wrap !important;">

            <?php if ( have_posts() ) :  ?>

                <?php while ( have_posts() ) : the_post();?>

                    <div class="column is-paddingless is-one-third">

                            <div class="card" style="box-shadow: none;">
                                <div class="card-image margin-desktop">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <figure class="image is-3by2">
                                            <?php the_post_thumbnail(); ?>
                                        </figure>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="media" style="margin-bottom: 10px;">
                                        <div class="media-content">
                                            <p class="title is-4 is-strong"><a href="<?php echo get_permalink(); ?>" class="color-black"><?php the_title(); ?></a></p>
                                            <p class="subtitle is-6">Por <?php the_author(); ?> - <?php the_date(); ?></p>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <small class="color-primary" style="text-transform: capitalize;"><?php the_category( ', ' ); ?></small>
                                        <br><br>
                                        <?php the_excerpt(); ?>
                                        <p class="color-primary">
                                            <?php
                                                if( $tags = get_the_tags() ) {
                                                    foreach( $tags as $tag ) {
                                                        $sep = ( $tag === end( $tags ) ) ? '' : ', ';
                                                        echo '<a href="' . get_term_link( $tag, $tag->taxonomy ) . '">#' . $tag->name . '</a>' . $sep;
                                                    }
                                                }
                                            ?>
                                        </p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>

                <?php endwhile; ?>

                <div class="column">

                    <nav class="pagination" style="justify-content: space-around;">
                        <?php previous_posts_link( '<span class="icon is-small"><i class="fa fa-angle-left"></i></span><span>Anterior</span>' ); ?>
                        <?php next_posts_link( '<span>Siguiente</span><span class="icon is-small"><i class="fa fa-angle-right"></i></span>' ); ?>
                    </nav>

                    <br><br>

                </div>



            <?php endif; ?>

        </div>

    </div>

</section>

<!-- <section class="section">

    <div class="container">

        <h1 class="title">Columns</h1>

        <h2 class="subtitle">A simple way to build <strong>responsive columns</strong></h2>

        <hr>

        <div class="content">
            <p>To build a <strong>grid</strong>, just:</p>
            <ol>
                <li>Add a <code>columns</code> container</li>
                <li>Add as many <code>column</code> elements as you want</li>
            </ol>
            <p>Each column will have an <strong>equal width</strong>, no matter the number of columns.</p>
        </div>

        <div class="columns">
            <div class="column">
                <p class="notification is-info">First column</p>
            </div>
            <div class="column">
                <p class="notification is-success">Second column</p>
            </div>
            <div class="column">
                <p class="notification is-warning">Third column</p>
            </div>
            <div class="column">
                <p class="notification is-danger">Fourth column</p>
            </div>
        </div>

        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html">
                    <span class="nt">&lt;div</span>
                    <span class="na">class=</span>
                    <span class="s">"columns"</span>
                    <span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span>
                    <span class="na">class=</span>
                    <span class="s">"column"</span>
                    <span class="nt">&gt;</span>
                    First column
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span>
                    <span class="na">class=</span>
                    <span class="s">"column"</span>
                    <span class="nt">&gt;</span>
                    Second column
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span>
                    <span class="na">class=</span>
                    <span class="s">"column"</span>
                    <span class="nt">&gt;</span>
                    Third column
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span>
                    <span class="na">class=</span>
                    <span class="s">"column"</span>
                    <span class="nt">&gt;</span>
                    Fourth column
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                </code>
            </pre>
            <button class="copy">Copy</button>
        </figure>

        <hr>

        <h3 class="title">Sizes</h3>

        <div class="content">
            <p>If you want to change the <strong>size</strong> of a single column, you can use one the following classes:</p>
            <ul>
                <li>
                    <code>is-three-quarters</code>
                </li>
                <li>
                    <code>is-two-thirds</code>
                </li>
                <li>
                    <code>is-half</code>
                </li>
                <li>
                    <code>is-one-third</code>
                </li>
                <li>
                    <code>is-one-quarter</code>
                </li>
            </ul>
            <p>The <em>other</em> columns will fill up the <strong>remaining</strong> space automatically.</p>
        </div>
        <div class="columns">
            <div class="column is-three-quarters">
                <p class="notification is-info">
                    <code class="html">is-three-quarters</code>
                </p>
            </div>
            <div class="column">
                <p class="notification is-warning">Auto</p>
            </div>
            <div class="column">
                <p class="notification is-danger">Auto</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-two-thirds">
                <p class="notification is-info">
                    <code class="html">is-two-thirds</code>
                </p>
            </div>
            <div class="column">
                <p class="notification is-warning">Auto</p>
            </div>
            <div class="column">
                <p class="notification is-danger">Auto</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-half">
                <p class="notification is-info">
                    <code class="html">is-half</code>
                </p>
            </div>
            <div class="column">
                <p class="notification is-warning">Auto</p>
            </div>
            <div class="column">
                <p class="notification is-danger">Auto</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-one-third">
                <p class="notification is-info">
                    <code class="html">is-one-third</code>
                </p>
            </div>
            <div class="column">
                <p class="notification is-success">Auto</p>
            </div>
            <div class="column">
                <p class="notification is-warning">Auto</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-one-quarter">
                <p class="notification is-info">
                    <code class="html">is-one-quarter</code>
                </p>
            </div>
            <div class="column">
                <p class="notification is-success">Auto</p>
            </div>
        </div>
        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html">
                <span class="nt">&lt;div</span>
                <span class="na">class=</span>
                <span class="s">"columns"</span>
                <span class="nt">&gt;</span>
                <span class="nt">&lt;div</span>
                <span class="na">class=</span>
                <span class="s">"column is-three-quarters"</span>
                <span class="nt">&gt;</span>
                <span class="nt">&lt;p</span>
                <span class="na">class=</span>
                <span class="s">"notification is-info"</span>
                <span class="nt">&gt;</span>
                <span class="nt">&lt;code</span>
                <span class="na">class=</span>
                <span class="s">"html"</span>
                <span class="nt">&gt;</span>
                is-three-quarters
                <span class="nt">&lt;/code&gt;</span>
                <span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span>
                <span class="na">class=</span>
                <span class="s">"column"</span>
                <span class="nt">&gt;</span>
                <span class="nt">&lt;p</span>
                <span class="na">class=</span>
                <span class="s">"notification is-warning"</span>
                <span class="nt">&gt;</span>
                Auto
                <span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-danger"</span><span class="nt">&gt;</span>Auto<span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span>
                <span class="na">class=</span>
                <span class="s">"columns"</span>
                <span class="nt">&gt;</span>
                <span class="nt">&lt;div</span>
                <span class="na">class=</span>
                <span class="s">"column is-two-thirds"</span>
                <span class="nt">&gt;</span>
                <span class="nt">&lt;p</span>
                <span class="na">class=</span>
                <span class="s">"notification is-info"</span>
                <span class="nt">&gt;</span>
                <span class="nt">&lt;code</span>
                <span class="na">class=</span>
                <span class="s">"html"</span>
                <span class="nt">&gt;</span>
                is-two-thirds
                <span class="nt">&lt;/code&gt;</span>
                <span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-warning"</span><span class="nt">&gt;</span>Auto<span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-danger"</span><span class="nt">&gt;</span>Auto<span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-half"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-info"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;code</span> <span class="na">class=</span><span class="s">"html"</span><span class="nt">&gt;</span>is-half<span class="nt">&lt;/code&gt;</span>
                <span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-warning"</span><span class="nt">&gt;</span>Auto<span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-danger"</span><span class="nt">&gt;</span>Auto<span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;/div&gt;</span>

                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-third"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-info"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;code</span> <span class="na">class=</span><span class="s">"html"</span><span class="nt">&gt;</span>is-one-third<span class="nt">&lt;/code&gt;</span>
                <span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-success"</span><span class="nt">&gt;</span>Auto<span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-warning"</span><span class="nt">&gt;</span>Auto<span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;/div&gt;</span>

                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-info"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;code</span> <span class="na">class=</span><span class="s">"html"</span><span class="nt">&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                <span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"notification is-success"</span><span class="nt">&gt;</span>Auto<span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
            </code>
        </pre>

            <button class="copy">Copy</button>
            <button class="expand">Expand</button></figure>

        <h4 class="title is-4">12 columns</h4>

        <div class="content">
            <p>As the grid can be divided into <strong>12</strong> columns, there are size classes for each division:</p>
            <ul>
                <li><code>is-2</code></li>
                <li><code>is-3</code></li>
                <li><code>is-4</code></li>
                <li><code>is-5</code></li>
                <li><code>is-6</code></li>
                <li><code>is-7</code></li>
                <li><code>is-8</code></li>
                <li><code>is-9</code></li>
                <li><code>is-10</code></li>
                <li><code>is-11</code></li>
            </ul>
        </div>
        <div class="message is-danger">
            <p class="message-header">Naming</p>
            <p class="message-body">Each modifier class is named after <strong>how many columns you want out of 12</strong>. So if you want 7 columns out of 12, use <code>is-7</code>.</p>
        </div>

        <div class="columns">
            <div class="column is-2">
                <p class="notification is-info"><code>is-2</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-3">
                <p class="notification is-info"><code>is-3</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-4">
                <p class="notification is-info"><code>is-4</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-5">
                <p class="notification is-info"><code>is-5</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">
                <p class="notification is-info"><code>is-6</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-7">
                <p class="notification is-info"><code>is-7</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-8">
                <p class="notification is-info"><code>is-8</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-9">
                <p class="notification is-info"><code>is-9</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-10">
                <p class="notification is-info"><code>is-10</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
            <div class="column">
                <p class="notification is-success has-text-centered">1</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-11">
                <p class="notification is-info"><code>is-11</code></p>
            </div>
            <div class="column">
                <p class="notification is-warning has-text-centered">1</p>
            </div>
        </div>

        <hr>

        <h3 class="title">Offset</h3>

        <div class="content">
            <p>While you can use <em>empty columns</em> (like <code>&lt;div class="column"&gt;&lt;/div&gt;</code>) to create horizontal space around <code>.column</code> elements, you can also use <strong>offset</strong> modifiers like <code>.is-offset-x</code>:
            </p>
        </div>
        <div class="columns is-mobile">
            <div class="column is-half is-offset-one-quarter">
                <p class="notification is-info">
                    <code class="html">is-half</code><br>
                    <code class="html">is-offset-one-quarter</code>
                </p>
            </div>
        </div>
        <div class="columns is-mobile">
            <div class="column is-4 is-offset-8">
                <p class="notification is-info">
                    <code class="html">is-4</code><br>
                    <code class="html">is-offset-8</code>
                </p>
            </div>
        </div>
        <div class="columns is-mobile">
            <div class="column is-11 is-offset-1">
                <p class="notification is-info">
                    <code class="html">is-11</code><br>
                    <code class="html">is-offset-1</code>
                </p>
            </div>
        </div>
        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html">
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns is-mobile"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-half is-offset-one-quarter"</span><span class="nt">&gt;&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>

                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns is-mobile"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-4 is-offset-8"</span><span class="nt">&gt;&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>

                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns is-mobile"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-11 is-offset-1"</span><span class="nt">&gt;&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                </code>
            </pre>
            <button class="copy">Copy</button>
        </figure>

        <hr>

        <h3 class="title">Responsiveness</h3>

        <div class="content">
            <p>By default, columns are only activated from <strong>tablet</strong> onwards. This means columns are stacked on top of each other on <strong>mobile</strong>.</p>
            <p>If you want columns to work on <strong>mobile too</strong>, just add the <code>is-mobile</code> modifier on the <code>columns</code> container:</p>
        </div>
        <div class="columns is-mobile">
            <div class="column">
                <p class="notification is-info">1</p>
            </div>
            <div class="column">
                <p class="notification is-success">2</p>
            </div>
            <div class="column">
                <p class="notification is-warning">3</p>
            </div>
            <div class="column">
                <p class="notification is-danger">4</p>
            </div>
        </div>
        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html">
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns is-mobile"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>1<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>2<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>3<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>4<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                </code>
            </pre>
            <button class="copy">Copy</button>
        </figure>
        <div class="message is-info">
            <p class="message-header">Resize</p>
            <p class="message-body">If you want to see the difference, resize your browser and see <em>when</em> the columns are stacked and when they are horizontally distributed.</p>
        </div>

        <div class="content">
            <p>If you <em>only</em> want columns on <strong>desktop</strong>, just use the <code>is-desktop</code> modifier on the <code>columns</code> container:</p>
        </div>
        <div class="columns is-desktop">
            <div class="column">
                <p class="notification is-info">1</p>
            </div>
            <div class="column">
                <p class="notification is-success">2</p>
            </div>
            <div class="column">
                <p class="notification is-warning">3</p>
            </div>
            <div class="column">
                <p class="notification is-danger">4</p>
            </div>
        </div>
        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html">
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns is-desktop"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>1<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>2<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>3<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>4<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                </code>
            </pre>
            <button class="copy">Copy</button>
        </figure>

        <h4 class="title is-4">Different sizes per breakpoint</h4>

        <div class="content">
            <p>You can define a <strong>column size</strong> for <em>each</em> viewport size: mobile, tablet, and desktop.</p>
        </div>
        <div class="columns is-mobile">
            <div class="column is-half-mobile is-one-third-tablet is-one-quarter-desktop">
                <p class="notification is-info">
                    <code>is-half-mobile</code><br>
                    <code>is-one-third-tablet</code><br>
                    <code>is-one-quarter-desktop</code>
                </p>
            </div>
            <div class="column">
                <p class="notification is-success">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning">1</p>
            </div>
            <div class="column">
                <p class="notification is-success">1</p>
            </div>
            <div class="column">
                <p class="notification is-warning">1</p>
            </div>
        </div>
        <div class="message is-info">
            <p class="message-header">Resize</p>
            <p class="message-body">If you want to see these classes in action, resize your browser window and see how the same column varies in width at each breakpoint.</p>
        </div>
        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html">
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns is-mobile"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-half-mobile is-one-third-tablet is-one-quarter-desktop"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-half-mobile<span class="nt">&lt;/code&gt;&lt;br&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-third-tablet<span class="nt">&lt;/code&gt;&lt;br&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter-desktop<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>1<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>1<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>1<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>1<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                </code>
            </pre>
            <button class="copy">Copy</button>
        </figure>

        <hr>

        <h3 class="title">Multiline</h3>

        <div class="content">
            <p>Whenever you want to start a new line, you can close a <code>columns</code> container and start a new one. But you can also add the <code>is-multiline</code> modifier and add <strong>more</strong> column elements that would fit in a single
                row.
            </p>
        </div>
        <div class="columns is-multiline is-mobile">
            <div class="column is-one-quarter">
                <p class="notification is-info"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-success"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-warning"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-danger"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-half">
                <p class="notification is-info"><code>is-half</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-success"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-warning"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-danger"><code>is-one-quarter</code></p>
            </div>
            <div class="column">
                <p class="notification is-info">Auto</p>
            </div>
        </div>
        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html">
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns is-multiline is-mobile"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-half"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-half<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                    Auto
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                </code>
            </pre>
            <button class="copy">Copy</button>
        </figure>

        <hr>

        <h3 class="title">Gapless</h3>

        <div class="content">
            <p>If you want to remove the <strong>space</strong> between the columns, add the <code>is-gapless</code> modifier on the <code>columns</code> container:</p>
        </div>
        <div class="columns is-gapless">
            <div class="column">
                <p class="notification is-info">First column</p>
            </div>
            <div class="column">
                <p class="notification is-success">Second column</p>
            </div>
            <div class="column">
                <p class="notification is-warning">Third column</p>
            </div>
            <div class="column">
                <p class="notification is-danger">Fourth column</p>
            </div>
        </div>
        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html">
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns is-gapless"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>First column<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>Second column<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>Third column<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>Fourth column<span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                </code>
            </pre>
            <button class="copy">Copy</button>
        </figure>

        <div class="content">
            <p>You can combine it with the <code>is-multiline</code> modifier:</p>
        </div>
        <div class="columns is-multiline is-mobile is-gapless">
            <div class="column is-one-quarter">
                <p class="notification is-info"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-success"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-warning"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-danger"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-half">
                <p class="notification is-info"><code>is-half</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-success"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-warning"><code>is-one-quarter</code></p>
            </div>
            <div class="column is-one-quarter">
                <p class="notification is-danger"><code>is-one-quarter</code></p>
            </div>
            <div class="column">
                <p class="notification is-info">Auto</p>
            </div>
        </div>
        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html">
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns is-gapless is-multiline is-mobile"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-half"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-half<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-one-quarter"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;code&gt;</span>is-one-quarter<span class="nt">&lt;/code&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                    Auto
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                </code>
            </pre>
            <button class="copy">Copy</button>
        </figure>

        <hr>

        <h3 class="title">Narrow column</h3>

        <div class="content">
            <p>If you want a column to only take the <strong>space it needs</strong>, use the <code>is-narrow</code> modifier. The other column(s) will fill up the remaining space.</p>
        </div>
        <div class="columns">
            <div class="column is-narrow">
                <div class="box" style="width: 200px;">
                    <p class="title is-5">Narrow column</p>
                    <p class="subtitle">This column is only 200px wide.</p>
                </div>
            </div>
            <div class="column">
                <div class="box">
                    <p class="title is-5">Flexible column</p>
                    <p class="subtitle">This column will take up the remaining space available.</p>
                </div>
            </div>
        </div>
        <figure class="highlight">
            <pre>
                <code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"columns"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column is-narrow"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"box"</span> <span class="na">style=</span><span class="s">"width: 200px;"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"title is-5"</span><span class="nt">&gt;</span>Narrow column<span class="nt">&lt;/p&gt;</span>
                    <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"subtitle"</span><span class="nt">&gt;</span>This column is only 200px wide.<span class="nt">&lt;/p&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"column"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"box"</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"title is-5"</span><span class="nt">&gt;</span>Flexible column<span class="nt">&lt;/p&gt;</span>
                    <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"subtitle"</span><span class="nt">&gt;</span>This column will take up the remaining space available.<span class="nt">&lt;/p&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                    <span class="nt">&lt;/div&gt;</span>
                </code>
            </pre>
            <button class="copy">Copy</button>
        </figure>
        <div class="content">
            <p>As for the size modifiers, you can have narrow columns for different <strong>breakpoints</strong>:</p>
            <ul>
                <li>
                    <code>is-narrow-mobile</code>
                </li>
                <li>
                    <code>is-narrow-tablet</code>
                </li>
                <li>
                    <code>is-narrow-desktop</code>
                </li>
            </ul>
        </div>

    </div>

</section> -->

<?php get_footer(); ?>

<?php //
// the_content();
// echo "Category";
// the_category();
// echo "ID";
// the_ID();
// echo "Tags";
// the_tags();
// echo "Next post link";
// next_post_link();
// echo "Previous post link";
// previous_post_link();
// echo "---------------------------------------------------";?>
