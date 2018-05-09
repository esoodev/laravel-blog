@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8">
            <div class="container">
                <div class="row">
                    <!-- post -->
                    @foreach($magazines as $magazine)
                    <div class="post col-xl-6">
                        <div class="post-thumbnail">
                            <a href="{{ '/magazine/'.$magazine->id }}">
                                <!-- <img src="img/blog-post-1.jpeg" alt="..." class="img-fluid"> -->
                            </a>
                        </div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date meta-last">{{ $magazine->created_at->format('d M | Y') }}</div>
                                <div class="category">
                                    <a href="#">{{ $magazine->category->name }}</a>
                                </div>
                            </div>
                            <a href="{{ '/magazine/'.$magazine->id }}">
                                <h3 class="h4">{{ $magazine->title }}</h3>
                            </a>
                            <p class="text-muted">{{ $magazine->content_lead }}</p>
                            <footer class="post-footer d-flex align-items-center">
                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                    <!-- <div class="avatar">
                                        <img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                                    </div> -->
                                    <div class="title">
                                        @if(count($magazine->authors)!=0)
                                            <span>{{ $magazine->authors->first()->name }}</span>
                                        @else
                                            <span>Poing</span>
                                        @endif
                                    </div>
                                </a>
                                <div class="date">
                                    <i class="icon-clock"></i> 
                                    <time class="timeago" datetime="{{ $magazine->created_at }}">{{ $magazine->created_at }}</time>
                                </div>
                                <div class="comments meta-last">
                                    <i class="icon-comment"></i>{{ $magazine->comments->count() }}</div>
                            </footer>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                        {{ $magazines->links('pagination.default') }}
                </nav>
            </div>
        </main>
        <aside class="col-lg-4">
            <!-- Widget [Search Bar Widget]-->
            <widget-search-component></widget-search-component>
            <!-- Widget [Latest Posts Widget]-->
            <widget-latest-component :latests="{{ json_encode($magazine_latests) }}"></widget-latest-component>
            <!-- Widget [Categories Widget]-->
            <widget-category-component :categories="{{ json_encode($all_categories) }}"></widget-category-component>
            <!-- Widget [Tags Cloud Widget]-->
            <widget-tag-component :tags="{{ json_encode($all_tags) }}"></widget-tag-component>
        </aside>
    </div>
</div>
@endsection