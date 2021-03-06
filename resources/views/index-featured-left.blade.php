<div class="row d-flex align-items-stretch">
    <div class="image col-lg-5">
        <img src="img/featured-pic-2.jpeg" alt="...">
    </div>
    <div class="text col-lg-7">
        <div class="text-inner d-flex align-items-center">
            <div class="content">
                <header class="post-header">
                    <div class="category">
                        <a href="#">{{ $magazine->category->name }}</a>
                    </div>
                    <a href="/magazine/{{ $rand->id }}">
                        <h2 class="h4">{{ $magazine->title }}</h2>
                    </a>
                </header>
                <p>{{ $magazine->content_lead }}</p>
                <footer class="post-footer d-flex align-items-center">
                    <a href="#" class="author d-flex align-items-center flex-wrap">
                        <!-- <div class="avatar">
                            <img src="img/avatar-2.jpg" alt="..." class="img-fluid">
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
                    <div class="comments">
                        <i class="icon-comment"></i>{{ $magazine->comments->count() }}</div>
                </footer>
            </div>
        </div>
    </div>
</div>