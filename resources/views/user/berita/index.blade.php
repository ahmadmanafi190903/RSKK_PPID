@extends('layouts.app')

@section('content')
  <section class="blog-wrapper news-wrapper section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">
          <div class="blog-post-details border-wrap">
            <div class="single-blog-post post-details">
              <div class="post-content">
                {{-- <div class="post-cat">
                  <a href="#">Technology</a>
                </div> --}}
                <img class="alignleft" src="/storage/{{ $item->image }}" alt="{{ $item->image }}">
                <h2>{{ $item->judul }}</h2>
                <div class="post-meta">
                  <span><i class="fal fa-comments"></i>35 Comments</span>
                  <span><i class="fal fa-calendar-alt"></i>{{ $item->created_at->locale('id')->translatedFormat('H:i, l, d F Y') }}</span>
                </div>
                <p>{!! $item->deskripsi_detail !!}</p>
              </div>
            </div>

            <!-- comments section wrap start -->
            <div class="comments-section-wrap pt-40">
              <div class="comments-heading">
                <h3>03 Comments</h3>
              </div>
              <ul class="comments-item-list">
                <li class="single-comment-item">
                  <div class="author-img">
                    <img src="{{ asset('assets/img/pp_rating.webp') }}" alt="">
                  </div>
                  <div class="author-info-comment">
                    <div class="info">
                      <h5><a href="#">Rosalina Kelian</a></h5>
                      <span>19th May 2018</span>
                      <a href="#" class="theme-btn minimal-btn"><i class="fal fa-reply"></i>Reply</a>
                    </div>
                    <div class="comment-text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna. Ut enim ad minim veniam, quis nostrud laboris nisi ut aliquip ex ea
                        commodo consequat.</p>
                    </div>
                  </div>
                </li>
                <li class="single-comment-item">
                  <div class="author-img">
                    <img src="{{ asset('assets/img/pp_rating.webp') }}" alt="">
                  </div>
                  <div class="author-info-comment">
                    <div class="info">
                      <h5><a href="#">Arista Williamson</a></h5>
                      <span>21th Feb 2020</span>
                      <a href="#" class="theme-btn minimal-btn"><i class="fal fa-reply"></i>Reply</a>
                    </div>
                    <div class="comment-text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco nisi ut
                        aliquip ex ea commodo consequat.</p>
                    </div>
                  </div>

                  <ul class="replay-comment">
                    <li class="single-comment-item">
                      <div class="author-img">
                        <img src="{{ asset('assets/img/pp_rating.webp') }}" alt="">
                      </div>
                      <div class="author-info-comment">
                        <div class="info">
                          <h5><a href="#">Salman Ahmed</a></h5>
                          <span>29th Jan 2021</span>
                          <a href="#" class="theme-btn minimal-btn"><i class="fal fa-reply"></i>Reply</a>
                        </div>
                        <div class="comment-text">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam..</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>

            <div class="comment-form-wrap mt-40">
              <h3>Post Comment</h3>

              <form action="#" class="comment-form">
                <div class="single-form-input">
                  <textarea placeholder="Type your comments...."></textarea>
                </div>
                <div class="single-form-input">
                  <input type="text" placeholder="Type your name....">
                </div>
                <div class="single-form-input">
                  <input type="email" placeholder="Type your email....">
                </div>
                <div class="single-form-input">
                  <input type="text" placeholder="Type your website....">
                </div>
                <button class="submit-btn" type="submit"><i class="fal fa-comments"></i>Post Comment</button>
              </form>
            </div>

          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="main-sidebar">
            <div class="single-sidebar-widget">
              <div class="wid-title">
                <h3>Search</h3>
              </div>
              <div class="search_widget">
                <form action="#">
                  <input type="text" placeholder="Search your keyword...">
                  <button type="submit"><i class="fal fa-search"></i></button>
                </form>
              </div>
            </div>
            <div class="single-sidebar-widget">
              <div class="wid-title">
                <h3>Popular Feeds</h3>
              </div>
              <div class="popular-posts">
                <div class="single-post-item">
                  <div class="thumb bg-cover" style="background-image: url('{{ asset('assets/img/pp_rating.webp') }}')"></div>
                  <div class="post-content">
                    <h5><a href="#">Power And Energy Production</a></h5>
                    <div class="post-date">
                      <i class="far fa-calendar-alt"></i>24th March 2019
                    </div>
                  </div>
                </div>
                <div class="single-post-item">
                  <div class="thumb bg-cover" style="background-image: url('{{ asset('assets/img/pp_rating.webp') }}')"></div>
                  <div class="post-content">
                    <h5><a href="#">Any Kind project Planning</a></h5>
                    <div class="post-date">
                      <i class="far fa-calendar-alt"></i>25th March 2019
                    </div>
                  </div>
                </div>
                <div class="single-post-item">
                  <div class="thumb bg-cover" style="background-image: url('{{ asset('assets/img/pp_rating.webp') }}')"></div>
                  <div class="post-content">
                    <h5><a href="#">Investing in Freight Broker Training</a></h5>
                    <div class="post-date">
                      <i class="far fa-calendar-alt"></i>26th March 2019
                    </div>
                  </div>
                </div>
                <div class="single-post-item">
                  <div class="thumb bg-cover" style="background-image: url('{{ asset('assets/img/pp_rating.webp') }}')"></div>
                  <div class="post-content">
                    <h5><a href="#">BUILDING REPAIR &
                        CONSTRUCTION</a></h5>
                    <div class="post-date">
                      <i class="far fa-calendar-alt"></i>29th March 2019
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="single-sidebar-widget">
              <div class="wid-title">
                <h3>Categories</h3>
              </div>
              <div class="widget_categories">
                <ul>
                  <li><a href="#">Consultant <span>23</span></a></li>
                  <li><a href="#">Help <span>24</span></a></li>
                  <li><a href="#">transport <span>11</span></a></li>
                  <li><a href="#">logitic <span>05</span></a></li>
                  <li><a href="#">delivery <span>06</span></a></li>
                  <li><a href="#">cargo <span>10</span></a></li>
                </ul>
              </div>
            </div>
            <div class="single-sidebar-widget">
              <div class="wid-title">
                <h3>Never Miss News</h3>
              </div>
              <div class="social-link">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
            <div class="single-sidebar-widget">
              <div class="wid-title">
                <h3>Popular Tags</h3>
              </div>
              <div class="tagcloud">
                <a href="#">IT Technology</a>
                <a href="#">Web Design</a>
                <a href="#">Development</a>
                <a href="#">Solutions</a>
                <a href="#">Design</a>
                <a href="#">Programing</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
