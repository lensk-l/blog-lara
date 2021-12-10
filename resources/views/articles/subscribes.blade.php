@include('style')
@include('modules.navbar')

<section class="recent-posts flex-row  ml-4 bg-faded">
    <div class="section">
        <div class="row justify-content-around text-center">
            @foreach($authors as $author)
                <div class="col">
                    <span class="col"><a href="{{route('allByAuthor',$author->name )}}">{{$author->name}}</a></span>
                    <div class="col"></div>
                    <span class="col"><a href="{{route('unsubscribe', $author->id)}}">Unsubscribe </a></span>
                </div>
            @endforeach
                <div class="col"><a href="{{route('allArticles')}}">All stories</a></div>
        </div>
        <h2 class="text-center mt-4"><span>All stories</span></h2>
    </div>
    <div class="  row flex-row justify-content-around mb-3">
    @foreach($authors as $author)

        @foreach($author->articles as $article)

            <!-- begin post -->
                <div class="card mb-3" style="width: 500px">
                    <div class="row">
                        <div class="col-md-5 wrapthumbnail">
                            <a href="{{route('article.show', $article->id)}}">
                                <div class="thumbnail">
                                    <img style="width: -webkit-fill-available;"
                                         src="{{ asset('images/' . $article->img) }}" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-7">
                            <div class="">
                                <div class="mb-2"><h2 class="card-title"><a class="link-dark"
                                                                            href="{{route('article.show', $article->id)}}">{{$article->title}}</a>
                                    </h2>
                                    <h5 class="card-title"><a class="link-dark"
                                                              href="{{route('category_show', $article->category->name)}}">{{$article->category->name}}</a>
                                    </h5>
                                    <p class="card-text fs-2" style="font-size: small">{{$article->text}}</p>
                                </div>
                                <div class="metafooter">
                                    <div class="wrapfooter pos-relative">
                                <span class="author-meta">
								<span class="post-name  mb-3"><a class="mr-3"
                                                                 href="{{route('allByAuthor', $article->user->name)}}">{{$article->user->name}}</a></span>
                                    <span class="post-date">{{$article->created_at->format('H:i, j M Y')}}</span>
                                    <br/>
                                    <span class="post-read mb-3 text-gray-dark">Views - {{$article->views}}</span>
                                    <br/><br/>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end post -->
            @endforeach
        @endforeach

    </div>
</section>




