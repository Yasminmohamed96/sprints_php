<?php
require_once('config.php');
require_once(BASE_PATH . '/logic/posts.php');
require_once(BASE_PATH . '/logic/categories.php');
$category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : null;
$tag_id =isset($_REQUEST['tag_id']) ? $_REQUEST['tag_id'] : null;
$q = isset($_REQUEST['q']) ? $_REQUEST['q'] : null;
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
$page_size = 2;
$posts = getPosts($page_size, $page, $category_id, $tag_id, null, $q);


$total_page_no=totalpagesCount($page_size,$category_id , $tag_id , null , $q );

?>
<?php require_once('layout/header.php'); ?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Recent Posts</h4>
                        <h2>Our Recent Blog Entries</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->
<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="<?= BASE_URL . '/posts.php' ?>">
                        <input type="text" value="<?= isset($_REQUEST['q']) ? $_REQUEST['q'] : '' ?>" name="q"
                            class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="all-blog-posts">
                    <div class="row">
                        <?php
                        foreach ($posts as $post) {
                        ?>
                        <div class="col-lg-6">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="<?= BASE_URL . $post['image'] ?>" alt="">
                                </div>
                                <div class="down-content">
                                    <span><?= $post['category_name'] ?></span>
                                    <a href="<?= BASE_URL . '/post-details.php?id=' . $post['id'] ?>">
                                        <h4><?= $post['title'] ?></h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="#"><?= $post['user_name'] ?></a></li>
                                        <li><a href="#"><?= $post['publish_date'] ?></a></li>
                                        <li><a href="#"><?= $post['comments'] ?> Comments</a></li>
                                    </ul>
                                    <p><?= $post['content'] ?></p>
                                    <?php
                                        if ($post['tags']) {
                                        ?>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <?php
                                                            foreach ($post['tags'] as $tag) {
                                                            ?>
                                                    <li><a href="#"><?= $tag['name'] ?></a></li>
                                                    <?php
                                                            }
                                                            ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                        ?>

                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <ul class="page-numbers">
                <?php for($i=1; $i <= $total_page_no; $i++ ) { ?>
                <li id="page<?php echo $i;?>" onclick="change_state(<?php echo $i;?>);"><a href="
                    posts.php?page=<?php echo $i;?>?categoryID=<?php echo $category_id;?>?tagID=<?php echo $tag_id;?>">
                        <?php echo $i;?></a>
                </li>
                <?php }?>
                <?php if($i+1<=$total_page_no){ ?>
                <li><a href="posts.php?page=<?php $i++; echo $i;?>?categoryID=<?php echo $category_id;?>?tagID=<?php echo $tag_id;?>""><i class="
                        fa fa-angle-double-right"></i></a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>

</section>

<?php require_once('layout/footer.php') ?>
<script>
function change_state(i) {
    debugger;
    var element = document.getElementById("page" + i);
    element.classList.add("active");
    // i = i - 1;
    // var previous_element = document.getElementById("page" + i);
    // previous_element.classList.remove("active");
}
</script>
