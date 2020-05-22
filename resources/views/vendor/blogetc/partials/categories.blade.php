<div class=''>
    @foreach($post->categories as $category)
    <a class='btn btn-outline-info btn-rounded waves-effect mr-auto' style="color: #63b9c9;"
           href='{{$category->url()}}'>
            {{$category->category_name}}
        </a>
    @endforeach
</div>