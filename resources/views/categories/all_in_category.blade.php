@include('style')
@include('modules.navbar')
<section class="featured-posts flex-row ml-5 bg-faded">
    <div class="section-title">
        <h2><span>{{$category->name}}</span></h2>
    </div>
    <div class="card-columns listfeaturedtag row">
    @foreach($articles as $article)

        <!-- begin post -->
            <div class="card col">
                <div class="row">
                    <div class="col-md-4 wrapthumbnail">
                        <a href="{{route('article.show', $article->id)}}">
                            <div class="thumbnail" style="background-image:url({{ asset('images/' . $article->img) }});">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="">
                            <h2 class="card-title"><a href="{{route('article.show', $article->id)}}">{{$article->title}}</a></h2>
                            <h5 class = "card-title"><a class="link-dark" href="{{route('category_show', $article->category->name)}}">{{$article->category->name}}</a></h5>
                            <div><h4 class="card-text">{{$article->text}}</h4></div>
                            <div class="metafooter">
                                <div class="wrapfooter">
                                <span class="author-meta">
								<span class="post-name"><a href="#">{{$article->user->name}}</a></span><br/>
								<span class="post-date">{{$article->created_at->format('H:i, j M Y')}}</span>
                                    <br/>
                                    <span class="post-read">Views - {{$article->views}}</span>
								</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->
        @endforeach


    </div>
</section>


