@extends('layouts.master')
@section('content')
    <!--================================
                                                                                                                                        =            Page Title            =
                                                                                                                                        =================================-->

    <section class="section page-title">
        <div class="container">
            <div class="d-flex justify-content-center">
                <h1>{{ $title }}</h1>
            </div>
        </div>
    </section>

    <!--====  End of Page Title  ====-->

    <!--======================================
                                                                                                                                        =            Featured Article            =
                                                                                                                                        =======================================-->

    <!--====  End of Featured Article  ====-->
    <section class="post-grid section pt-0">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <!-- Post -->
                        <article class="post-sm">
                            <!-- Post Image -->
                            <div class="post-thumb">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid">
                                @else
                                    <a href="#"><img class="w-100" src="/images/blog/post-01.jpg"
                                            alt="Post-Image"></a>
                                @endif
                            </div>
                            <!-- Post Title -->
                            <div class="post-title">
                                <h3><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                                </h3>
                            </div>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <ul class="list-inline post-tag">
                                    <li class="list-inline-item">
                                        By {{ $post->user->name }} in {{ $post->category->name }}</a>
                                    </li>
                                    <li class="list-inline-item">

                                    </li>
                                </ul>
                            </div>
                            <!-- Post Details -->
                            <div class="post-details">
                                <p>{{ $post->excerpt }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach
                <div class="col-12">
                    <!-- Pagination
                                                                        <nav class="pagination-nav">
                                                                            <ul class="pagination">
                                                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                                <li class="page-item">
                                                                                    <a class="page-link" href="#" aria-label="Next">
                                                                                        <span aria-hidden="true"><i class="ti-angle-right"></i></span>
                                                                                        <span class="sr-only">Next</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </nav> -->
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
