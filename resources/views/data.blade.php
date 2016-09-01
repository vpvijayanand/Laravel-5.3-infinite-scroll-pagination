@foreach($blogs as $blog)
    <div>
        <h3><a href="">{{ $blog->title }}</a></h3>
        <p>{{ str_limit($blog->description, 400) }}</p>

        <div class="text-right">
            <button class="btn btn-success">Read More</button>
        </div>

        <hr style="margin-top:5px;">
    </div>
@endforeach