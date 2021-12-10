@include('style')
@include('modules.navbar')
<section class="recent-posts flex-row  ml-4 bg-faded">
    <div class="section-title">
        <h2><span>All stories</span></h2>
    </div>
    <div class="  row flex-row justify-content-around mb-3">
        @foreach($articles as $article)

        <!-- begin post -->
        <div class="card mb-3" style="width: 500px">
            <div class="text-center">
                <div class="col ">
                    <a href="{{route('article.show', $article->id)}}">
                        <div class="thumbnail">
                            <img style="width: 400px;"  src="{{ asset('images/' . $article->img) }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col">
                    <div class="">
                        <div class="mb-2"><h2 class="card-title"><a class="link-dark" href="{{route('article.show', $article->id)}}">{{$article->title}}</a></h2>
                            <h5 class = "card-title"><a class="link-dark" href="{{route('category_show', $article->category->name)}}">{{$article->category->name}}</a></h5>
                            <p class="card-text fs-2" style="font-size: small">{{$article->text}}</p>
                        </div>
                        <div class="metafooter">
                            <div class="wrapfooter pos-relative">
                                <span class="author-meta">
								<span class="post-name  mb-3"><a class="mr-3" href="{{route('allByAuthor', $article->user->name)}}">{{$article->user->name}}</a></span>
                                    <div>
                                            @if(in_array($article->author_id, $authors))
                                                <span><a class="unsubscribe bg-faded" data-route="{{route('unsubscribe', $article->author_id)}}" href="{{route('unsubscribe', $article->author_id)}}"><i class="fa text-danger fa-sign-in ml-2" aria-hidden="true"></i>UnSubscribe</a></span>
                                            @else
                                                <span><a class="subscribe bg-faded" data-route="{{route('subscribe', $article->author_id)}}" href="{{route('subscribe', $article->author_id)}}"><i class="fa text-success fa-sign-in ml-2" aria-hidden="true"></i>Subscribe</a></span>
                                            @endif
                                            <span class="ml-5"><a class="like bg-faded" data-route="{{route('like', $article->id)}}" href="{{route('like', $article->id)}}"><i style="font-size: 25px" class="text-danger fa fa-heart"></i></a></span>
                                            <span class=" post-read mb-3 text-gray-dark"> - {{$article->likes}}</span>
                                    </div>
                                   <br>
                                    <span class="post-date">wrote at: {{$article->created_at->format('H:i, j M Y')}}</span>
                                    <br/>
                                    <span class="post-read mb-3 text-gray-dark">Views - {{$article->views}}</span>

                                    <br/>

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

<script>
    $(document).ready(function () {
        $('.unsubscribe, .subscribe, .like').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).data('route'),
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response){
                    if (response.status === 'success') {
                        alert('Ok!');
                        location.reload();
                    }else{
                        alert(response.status)
                    }
                }

            });
        })
    });
</script>


