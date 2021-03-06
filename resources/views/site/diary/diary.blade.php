@extends('site.layouts.master')


@section('contents')
<!-- start post -->
@foreach($data as $diary)
<div class="post">
    <!-- start photo -->
    <div class="photo">
        <img src="{{asset('media/diary/'.$diary->featured_image)}}" alt="{{$diary->title}}">
    </div>
    <!-- end photo -->
    <!-- start title post -->
    <h3 class="title title-blog">{{$diary->title}}</h3>
    <!-- end title post -->
    <div class="entry-byline">
        <i class="fa fa-globe"></i>
        <span class="entry-author right-border">
            <a href="#" title="Posts by Theme Admin" rel="author" >
                <span>{{$diary->category->category_name}}</span>
            </a>
        </span>
        <i class="fa fa-clock-o"></i>
        <time class="entry-published right-border">{{date('d/m/Y', strtotime($diary->created_at))}}</time>
        <i class="fa fa-comment"></i>
        <span class="comments-link">{{count($diary->comments)}} Comments</span>
    </div>
    <!-- start desc post -->
    <p>{!!strShorten(Markdown::convertToHtml($diary->note), 200)!!}</p>
    <!-- end desc post -->
    <a href="{{url('diary/read/'.$diary->id)}}" class="btn hover-animate btn-color-hover">Read More</a>
</div>
<!-- end post -->
@endforeach


<!-- start pagination -->
<div class="pagination">
<!--       <span class="page-numbers current">1</span>
      <a class="page-numbers" href="#">2</a>
      <a class="page-numbers" href="#">3</a>
      <span class="page-numbers dots">…</span>
      <a class="page-numbers" href="#">9</a> -->

    @if($data->previousPageUrl())

      <a class="next page-numbers" href="{{$data->previousPageUrl()}}"><< Previous</a>

    @endif

    @if($data->hasMorePages())

      <a class="next page-numbers" href="{{$data->nextPageUrl()}}">Next >></a>

    @endif
</div>
<!-- end pagination -->

<script type="text/javascript">
$(document).ready(function(){
    $("pre").snippet("php",{style:"bright",startText:true});
});
</script>

@stop
