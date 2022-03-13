@extends('layouts.master')
@section('content')
    <!--====================================
                                                            =            Single Article            =
                                                        =====================================-->
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <!-- Single Post -->
                    <article class="single-post">
                        <!-- Post title -->
                        <div class="post-title text-center">
                            <h1>{{ $post->title }}</h1>
                            <!-- Tags -->
                            <ul class="list-inline post-tag">
                                <li class="list-inline-item">
                                    <p>By. {{ $post->user->name }} in <a href="">{{ $post->category->name }}</a></p>
                                </li>
                                <li class="list-inline-item">
                                    {{ $post->published_at }}
                                </li>
                            </ul>
                        </div>
                        <!-- Post body -->
                        <div class="post-body">
                            <!-- Feature Image -->
                            <div class="feature-image">
                                @if ($post->image)
                                    <div style="max-height: 350px; overflow:hidden;">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid">
                                    </div>
                                @else
                                    <img class="img-fluid" src="/images/blog/single-blog-feature-image.jpg"
                                        alt="feature-image">
                                @endif
                            </div>
                            <!-- Paragrapgh -->
                            {!! $post->body !!}
                        </div>
                    </article>
                    <!-- About Author Widget -->
                </div>
            </div>
        </div>
    </section>
    <!--====  End of Single Article  ====-->
@endsection
