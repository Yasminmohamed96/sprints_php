<?php require_once('layout/header.php'); 
 $conn = mysqli_connect('localhost', 'root', '', 'blog');
 if ($conn) {
     $SQL = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY publish_date DESC LIMIT 4; ";
     $query = mysqli_query($conn, $SQL);
    
 }
?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            <div class="item">
                <img src="assets/images/banner-item-01.jpg" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>Fashion</span>
                        </div>
                        <a href="post-details.html">
                            <h4>Morbi dapibus condimentum</h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">May 12, 2020</a></li>
                            <li><a href="#">12 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/banner-item-02.jpg" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>Nature</span>
                        </div>
                        <a href="post-details.html">
                            <h4>Donec porttitor augue at velit</h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">May 14, 2020</a></li>
                            <li><a href="#">24 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/banner-item-03.jpg" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>Lifestyle</span>
                        </div>
                        <a href="post-details.html">
                            <h4>Best HTML Templates on TemplateMo</h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">May 16, 2020</a></li>
                            <li><a href="#">36 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/banner-item-04.jpg" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>Fashion</span>
                        </div>
                        <a href="post-details.html">
                            <h4>Responsive and Mobile Ready Layouts</h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">May 18, 2020</a></li>
                            <li><a href="#">48 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/banner-item-05.jpg" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>Nature</span>
                        </div>
                        <a href="post-details.html">
                            <h4>Cras congue sed augue id ullamcorper</h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">May 24, 2020</a></li>
                            <li><a href="#">64 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/banner-item-06.jpg" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>Lifestyle</span>
                        </div>
                        <a href="post-details.html">
                            <h4>Suspendisse nec aliquet ligula</h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">May 26, 2020</a></li>
                            <li><a href="#">72 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <!-- -------------------------------------------------------------- -->
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <?php while (($row = mysqli_fetch_assoc($query)) != null) 
                                {
                                  $post_id=$row['post_id'];
                                  $user_id=$row['user_id'];

                                  $SQL2="SELECT COUNT(*) AS Count FROM comments WHERE post_id='$post_id'AND user_id='$user_id'";
                                  $query2 = mysqli_query($conn, $SQL2);
                                  $comments_count = mysqli_fetch_assoc($query2)
                                  ?>

                                <div class="down-content">
                                    <span>
                                        <?php echo $row['title'];?>
                                    </span>
                                    <a href="post-details.html">
                                        <h4>Best Template Website for HTML CSS</h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="#"><?php echo $row['username'];?></a></li>
                                        <li><a href="#"> <?php echo $row['created_at'];?></a></li>
                                        <li><a href="#"><?php echo $comments_count['Count']; ?> comments </a></li>
                                    </ul>
                                    <p><?php echo $row['content'];?> </p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <?php
                                                    $SQL3="SELECT * FROM posts , post_tags, tags WHERE post_tags.post_id=posts.post_id AND post_tags.tag_id=tags.id AND posts.post_id='$post_id' AND posts.user_id='$user_id'; ";
                                                    $query3 = mysqli_query($conn, $SQL3);
                                                    while (($tags  = mysqli_fetch_assoc($query3)) != null){
                                                    ?>
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#"><?php echo $tags['name'];?>
                                                        </a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="post-share">
                                                    <li><i class="fa fa-share-alt"></i></li>
                                                    <li><a href="#">Facebook</a>,</li>
                                                    <li><a href="#"> Twitter</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </divp>
                            <?php }
                              mysqli_close($conn);
                            ?>
                            <!-- -------------------------------------------------------------- -->

                            <div class="col-lg-12">
                                <div class="main-button">
                                    <a href="blog.html">View All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item search">
                                    <form id="search_form" name="gs" method="GET" action="#">
                                        <input type="text" name="q" class="searchText" placeholder="type to search..."
                                            autocomplete="on">
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>Recent Posts</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="post-details.html">
                                                    <h5>Vestibulum id turpis porttitor sapien
                                                        facilisis
                                                        scelerisque</h5>
                                                    <span>May 31, 2020</span>
                                                </a></li>
                                            <li><a href="post-details.html">
                                                    <h5>Suspendisse et metus nec libero ultrices
                                                        varius eget in
                                                        risus
                                                    </h5>
                                                    <span>May 28, 2020</span>
                                                </a></li>
                                            <li><a href="post-details.html">
                                                    <h5>Swag hella echo park leggings, shaman
                                                        cornhole ethical
                                                        coloring
                                                    </h5>
                                                    <span>May 14, 2020</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="#">- Nature Lifestyle</a></li>
                                            <li><a href="#">- Awesome Layouts</a></li>
                                            <li><a href="#">- Creative Ideas</a></li>
                                            <li><a href="#">- Responsive Templates</a></li>
                                            <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                                            <li><a href="#">- Creative &amp; Unique</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">
                                        <h2>Tag Clouds</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="#">Lifestyle</a></li>
                                            <li><a href="#">Creative</a></li>
                                            <li><a href="#">HTML5</a></li>
                                            <li><a href="#">Inspiration</a></li>
                                            <li><a href="#">Motivation</a></li>
                                            <li><a href="#">PSD</a></li>
                                            <li><a href="#">Responsive</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php require_once('layout/footer.php') ?>
