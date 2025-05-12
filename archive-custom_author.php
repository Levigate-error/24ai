<?php
get_header(); // Подключение шапки сайта

if (have_posts()) :
    echo '<h1 style="margin-top: 250px">Все авторы</h1>'; // Заголовок страницы архива

    // Начало цикла
    while (have_posts()) : the_post();
        // Выводим информацию о каждом авторе
        ?>
        <div class="author-item">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="author-excerpt">
                <?php the_excerpt(); // Выводим краткое описание автора ?>
            </div>
            <div class="author-thumbnail">
                <?php
                if (has_post_thumbnail()) :
                    the_post_thumbnail('thumbnail'); // Выводим миниатюру автора
                endif;
                ?>
            </div>
        </div>
    <?php
    endwhile; // Конец цикла
    ?>

    <div class="pagination">
        <?php
        // Выводим пагинацию
        echo paginate_links();
        ?>
    </div>

<?php else : ?>
    <p>Авторы не найдены.</p>
<?php endif; ?>

<?php
get_footer(); // Подключение подвала сайта
