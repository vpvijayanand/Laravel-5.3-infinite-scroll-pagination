@extends('layouts.app')
@section('content')
    <style type="text/css">
        .ajax-load {
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
    </head>
    <body>

    <div class="container">
        <h2 class="text-center">Laravel infinite scroll pagination</h2>
        <br/>
        <div class="col-md-12" id="post-data">
            @include('data')
        </div>
    </div>

    <div class="ajax-load text-center" style="display:none">
        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More Blog</p>
    </div>
    <div class="ajax-load-end text-center" style="display:none">
        <p>No More Blogs</p>
    </div>

    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page) {
            $.ajax(
                    {
                        url: '?page=' + page,
                        type: "get",
                        beforeSend: function () {
                            $('.ajax-load').show();
                        }
                    })
                    .done(function(data)
                    {
                        if(data.html.length == "0"){
                            $('.ajax-load').html("No more records found");
                            return;
                        }
                        $('.ajax-load').hide();
                        $("#post-data").append(data.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError)
                    {
                        alert('server not responding...');

                    });
        }
    </script>

    </body>
    </html>
@endsection