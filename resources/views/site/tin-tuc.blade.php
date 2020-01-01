@extends('site.layouts.master')
@section('title', 'Tin tức')
@section('css')

@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Tin tức</a></li>
</ol>
@endsection
@section('hero')
<!--============ Page Title =========================================================================-->
<div class="page-title">
    <div class="container">
        <h1>Tin tức</h1>
    </div>
    <!--end container-->
</div>
<!--============ End Page Title =====================================================================-->
@endsection
@section('content')

<section class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <article class="blog-post clearfix">
                    <a href="blog-post.html">
                        <img src="assets/img/blog-image-01.jpg" alt="">
                    </a>
                    <div class="article-title">
                        <h2><a href="blog-post.html">10 tips for renovation</a></h2>
                        <div class="tags framed">
                            <a href="#" class="tag">Home & Decor</a>
                            <a href="#" class="tag">Design</a>
                        </div>
                    </div>
                    <div class="meta">
                        <figure>
                            <a href="#" class="icon">
                                <i class="fa fa-user"></i>
                                John Doe
                            </a>
                        </figure>
                        <figure>
                            <i class="fa fa-calendar-o"></i>
                            02.05.2017
                        </figure>
                    </div>
                    <div class="blog-post-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit
                            amet fermentum sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                            per inceptos himenaeos. Vestibulum tincidunt, sapien sagittis sollicitudin dapibus,
                            risus mi euismod elit
                        </p>
                        <a href="blog-post.html" class="btn btn-primary btn-framed detail">Read more</a>
                    </div>
                </article>

                <article class="blog-post clearfix">
                    <a href="blog-post.html">
                        <img src="assets/img/blog-image-02.jpg" alt="">
                    </a>
                    <div class="article-title">
                        <h2><a href="blog-post.html">Professional kitchen at your home</a></h2>
                        <div class="tags framed">
                            <a href="#" class="tag">Home & Decor</a>
                            <a href="#" class="tag">Design</a>
                        </div>
                    </div>
                    <div class="meta">
                        <figure>
                            <a href="#" class="icon">
                                <i class="fa fa-user"></i>
                                John Doe
                            </a>
                        </figure>
                        <figure>
                            <i class="fa fa-calendar-o"></i>
                            02.05.2017
                        </figure>
                    </div>
                    <div class="blog-post-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit
                            amet fermentum sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                            per inceptos himenaeos. Vestibulum tincidunt, sapien sagittis sollicitudin dapibus,
                            risus mi euismod elit
                        </p>
                        <a href="blog-post.html" class="btn btn-primary btn-framed detail">Read more</a>
                    </div>
                </article>

                <article class="blog-post clearfix">
                    <a href="blog-post.html">
                        <img src="assets/img/blog-image-06.jpg" alt="">
                    </a>
                    <div class="article-title">
                        <h2><a href="blog-post.html">8 Things to Remember Every Morning</a></h2>
                        <div class="tags framed">
                            <a href="#" class="tag">Home & Decor</a>
                            <a href="#" class="tag">Design</a>
                        </div>
                    </div>
                    <div class="meta">
                        <figure>
                            <a href="#" class="icon">
                                <i class="fa fa-user"></i>
                                John Doe
                            </a>
                        </figure>
                        <figure>
                            <i class="fa fa-calendar-o"></i>
                            02.05.2017
                        </figure>
                    </div>
                    <div class="blog-post-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit
                            amet fermentum sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                            per inceptos himenaeos. Vestibulum tincidunt, sapien sagittis sollicitudin dapibus,
                            risus mi euismod elit
                        </p>
                        <a href="blog-post.html" class="btn btn-primary btn-framed detail">Read more</a>
                    </div>
                </article>

                <!--end Articles-->

                <div class="page-pagination">
                    <nav aria-label="Pagination">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <i class="fa fa-chevron-left"></i>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">
                                        <i class="fa fa-chevron-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--end page-pagination-->
            </div>
            <!--end col-md-8-->

            <div class="col-md-4">
                <!--============ Side Bar ===============================================================-->
                <aside class="sidebar">
                    <section>
                        <h2>Search Blog</h2>
                        <!--============ Side Bar Search Form ===========================================-->
                        <form class="sidebar-form form">
                            <div class="form-group">
                                <label for="what" class="col-form-label">What?</label>
                                <input name="keyword" type="text" class="form-control" id="what"
                                    placeholder="Enter keyword and press enter">
                            </div>
                            <!--end form-group-->
                        </form>
                        <!--============ End Side Bar Search Form =======================================-->
                    </section>
                    <section>
                        <h2>Popular Posts</h2>
                        <div class="sidebar-post">
                            <a href="blog-post.html" class="background-image">
                                <img src="assets/img/blog-image-03.jpg">
                            </a>
                            <!--end background-image-->
                            <div class="description">
                                <h4>
                                    <a href="blog-post.html">How to build a cool swimming pool</a>
                                </h4>
                                <div class="meta">
                                    <a href="#">John Doe</a>
                                    <figure>02.05.2017</figure>
                                </div>
                                <!--end meta-->
                            </div>
                            <!--end description-->
                        </div>
                        <!--end sidebar-post-->

                        <div class="sidebar-post">
                            <a href="blog-post.html" class="background-image">
                                <img src="assets/img/blog-image-04.jpg">
                            </a>
                            <!--end background-image-->
                            <div class="description">
                                <h4>
                                    <a href="blog-post.html">Concrete decorations can be beautiful</a>
                                </h4>
                                <div class="meta">
                                    <a href="#">John Doe</a>
                                    <figure>02.05.2017</figure>
                                </div>
                                <!--end meta-->
                            </div>
                            <!--end description-->
                        </div>
                        <!--end sidebar-post-->

                        <div class="sidebar-post">
                            <a href="blog-post.html" class="background-image">
                                <img src="assets/img/blog-image-05.jpg">
                            </a>
                            <!--end background-image-->
                            <div class="description">
                                <h4>
                                    <a href="blog-post.html">Let’s take a break</a>
                                </h4>
                                <div class="meta">
                                    <a href="#">John Doe</a>
                                    <figure>02.05.2017</figure>
                                </div>
                                <!--end meta-->
                            </div>
                            <!--end description-->
                        </div>
                        <!--end sidebar-post-->

                    </section>

                    <section>
                        <h2>Popular Post</h2>
                        <ul class="sidebar-list list-unstyled">
                            <li>
                                <a href="#">January 2017<span>4</span></a>
                            </li>
                            <li>
                                <a href="#">February 2017<span>12</span></a>
                            </li>
                            <li>
                                <a href="#">October 2016<span>8</span></a>
                            </li>
                            <li>
                                <a href="#">August 2016<span>3</span></a>
                            </li>
                            <li>
                                <a href="#">May 2016<span>11</span></a>
                            </li>
                        </ul>
                    </section>
                </aside>
                <!--============ End Side Bar ===========================================================-->
            </div>
            <!--end col-md-3-->
        </div>
    </div>
    <!--end container-->
</section>
<!--end block-->
@endsection
@section('script')
@endsection