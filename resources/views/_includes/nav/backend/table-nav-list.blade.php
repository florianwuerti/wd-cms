<nav class="is-flex">
	<ul class="is-flex m-b-25">
		@if($posts->count() >= 1)
		<li class="all">
			<a href="{{route('posts.index')}}" class="current" aria-current="page">All ({{$posts->count()}})</a>
			|
		</li>
		@else
		<li class="all">
			<a href="{{route('posts.index')}}" class="current" aria-current="page">All (0)</a> |
		</li>
		@endif
		@if($authUserPost->count() >= 1)
		<li class="mine">
			<a href="#">Mine ({{$authUserPost->count()}})</a> |
		</li>
		@endif

		@if($postsPublished->count())
		<li class="publish">
			<a href="{{route('manage.posts.published')}}">Published <span class="count">({{$postsPublished->count()}})</span></a> |
		</li>
		@endif

		@if($postsDrafts->count())
		<li class="publish">
			<a href="{{route('manage.posts.drafst')}}">Drafts <span class="count">({{$postsDrafts->count()}})</span></a> |
		</li>
		@endif

		@if($postsTrash->count())
		<li class="publish">
			<a href="{{route('manage.posts.trash')}}">Trash <span class="count">({{$postsTrash->count()}})</span></a> |
		</li>
		@endif

	</ul>
</nav>