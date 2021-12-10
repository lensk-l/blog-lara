@if(route('allByAuthor', $user->name))
@include('modules.navbar')
@include('style')
@endif
<section class="recent-posts bg-faded">
    <div class="section-title">
        @if(Route::is('allByAuthor', $user->name))
            <h2 class="text-center"><span>Stories by <h1>{{$user->name}}!</h1> Total author subscribers - {{count($subscribers)}} </span></h2>
            <h3></h3>
            @else
        <h2><span>There are your stories, <h1>{{$user->name}} </h1> you have - {{count($subscribers)}} subscriber </span></h2>

        @endif
    </div>
    <div class=" card-column  listrecent">
        <div class="row justify-content-around">
        @foreach($articles as $article)
        <!-- begin post -->
            <div style="max-width: 360px" class="card mb-3 mr-2 col">
                <a href="{{route('article.show', $article->id)}}" class="m-auto">
                    <img class="img-fluid" src="{{ asset('images/' . $article->img) }}" alt="">
                </a>
                <div class="card-block text-center">
                    <h2 class="card-title"><a href="{{route('article.show', $article->id)}}">{{$article->title}}</a></h2>
                    <h5 class="card-title"><a class="link-dark" href="{{route('category_show', $article->category->name) }}">category-{{$article->category->name}}</a></h5>
                    <div>{{$article->text}}</div>
                    <div class="metafooter">
                        <div class="wrapfooter">
                        <span class="author-meta">
						<span class="post-name"><a href="{{route('allByAuthor', $article->user->name)}}">{{$article->user->name}}</a></span><br/>
						<span class="post-date">{{$article->created_at->format('H:i, j M Y')}}</span><br/>
                            <span class="post-read">Views - ({{$article->views}})</span>
						</span>
                        </div>
                    </div>
                </div>
                @if($user->id == \Illuminate\Support\Facades\Auth::id())
                <div class="row justify-content-around mb-3">
                    <div class="form-item text-center">

                        <button type="submit" data-url="{{route('article.edit', $article->id)}}" class="update_button btn">Edit</button>
                    </div>
                    <div class="form-item text-center">
                        <button type="submit" data-url="{{route('article.destroy', $article->id)}}" class="destroy_button btn bg-danger">Delete</button>
                    </div>
                </div>
                @endif
            </div>
        @endforeach
        </div>

    </div>
</section>
<script>
    $(document).ready(function () {
        $('.destroy_button').click(function() {

            $.ajax({
                url: $(this).data('url'),
                type: "delete",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (){
                    location.reload()
                },
            });
        })
    });
</script>
<script>
    $(document).ready(function () {
        $('.update_button').click(function() {

            $.ajax({
                url: $(this).data('url'),
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (){
                    window.location = this.url;
                }

            });
        })
    });
</script>

