@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8">
            <div class="container">
                <div class="post-single">
                    <div class="post-thumbnail">
                        <!-- <img src="{{ asset('img/blog-post-3.jpeg') }}" alt="..." class="img-fluid"> -->
                    </div>
                    <div class="post-details">
                        <div class="post-meta d-flex justify-content-between">
                            <div class="category">
                                <a href="#">{{ $magazine_category->name }}</a>
                            </div>
                        </div>
                        <h1> {{ $magazine->title }}
                            <a href="#">
                                <i class="fa fa-bookmark-o"></i>
                            </a>
                        </h1>
                        <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                <div class="title">
                                    <!-- List all authors. Author name is 'poing' if null. -->
                                    @if(count($authors)>0) @if(count($authors) === 1)
                                    <span>{{ $authors[0]->name }}</span>
                                    @else @foreach ($authors as $author)
                                    <span>{{ $author->name }}</span>
                                    @if($loop->index
                                    < count($authors)-1) <span> & </span>
                                        @endif @endforeach @endif @else
                                        <span>Poing</span>
                                        @endif
                                </div>
                            </a>
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="date">
                                    <i class="icon-clock"></i> {{ $magazine->created_at }}</div>
                                <div class="views">
                                    <!-- TODO : connect view_count -->
                                    <i class="icon-eye"></i> {{ $page_views }}</div>
                                <div class="comments meta-last">
                                    <!-- TODO : connect view_count -->
                                    <i class="icon-comment"></i>{{ $magazine->comments->count() }}</div>
                            </div>
                        </div>
                        <div class="post-body">
                            <p class="lead">{{ $magazine->content_lead }}</p>
                            <p class="lead">{!! $magazine->content_body !!}</p>
                        </div>
                        <div class="post-tags">
                            @foreach($tags as $tag)
                            <a href="#" class="tag">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                            <a href="{{ $magazine_prev_url }}" class="prev-post text-left d-flex align-items-center">
                                @if($magazine_prev != null)
                                <div class="icon prev">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="text">
                                    <strong class="text-primary">Previous Post </strong>
                                    <h6>{{ $magazine_prev->title }}</h6>
                                </div>
                                @else
                                <div class="icon prev">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="text">
                                    <strong class="text-primary">No Previous Post </strong>
                                    <h6>To Home</h6>
                                </div>
                                @endif
                            </a>

                            <a href="{{ $magazine_next_url }}" class="next-post text-right d-flex align-items-center justify-content-end">
                                @if($magazine_next != null)
                                <div class="text">
                                    <strong class="text-primary">Next Post </strong>
                                    <h6>{{ $magazine_next->title }}</h6>
                                </div>
                                <div class="icon next">
                                    <i class="fa fa-angle-right"> </i>
                                </div>
                                @else
                                <div class="text">
                                    <strong class="text-primary">No More Posts </strong>
                                    <h6>To Home</h6>
                                </div>
                                <div class="icon next">
                                    <i class="fa fa-home"></i>
                                </div>
                                @endif
                            </a>
                        </div>
                        <!-- Comments [Show] -->
                        <comment-show-component :comments="{{ json_encode($magazine->comments) }}"></comment-show-component>
                        <div class="add-comment">
                            <header>
                                <h3 class="h6">Leave a reply</h3>
                            </header>
                            <form method="POST" action="/magazine/{{ $magazine->id }}/comments" class="commenting-form">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" id="email" placeholder="Email Address (will not be published)" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea name="comment" id="comment" placeholder="Type your comment" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-secondary">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
</div>
@endsection