<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />


    <link href="{{asset('/frontend/Eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/Eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/Eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/Eshopper/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/Eshopper/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/Eshopper/css/main.cs')}}s" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/admins/layouts/header.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/vlite.css')}}">
    @yield('style')
</head>

<body>

<div id="headerTotal">
    @include('web.layouts.header')
</div>


@yield('content')


@include('web.layouts.footer')

<script src="{{asset('/frontend/Eshopper/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/frontend/Eshopper/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('/frontend/Eshopper/js/price-range.js')}}"></script>
<script src="{{asset('/frontend/Eshopper/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('/frontend/Eshopper/js/main.js')}}"></script>
<script src="{{asset('/frontend/vlite.js')}}"></script>

@yield('js')



<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="B9zVR5nF"></script>
<script>
    function playLoadVideo(index){
        var index = index;
        console.log(index)
    }
    $(document).on('click','.btn-show-video',function (){
        let video_id = $(this).data('video_id');
        $.ajax({
            type:'POST',
            url:'{{route('admin.video.show_video')}}',
            dataType:'JSON',
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            data:{video_id:video_id},
            success:function (data){
                $('#exampleModalLabel').html(data.video_name);
                // var html='<div id="playerVideo" class="vlite-js" data-youtube-id="'+ data.video_link +'"></div>';
                $('.modal-body-show').html('<div id="playerVideo" class="vlite-js" data-youtube-id="'+ data.video_link +'"></div>');
                console.log('ok')
                var playYT = new Vlitejs('#playerVideo',{
                    options: {
                        autoplay: false,
                        controls: true,
                        playPause: true,
                        progressBar: true,
                        time: true,
                        volume: true,
                        fullscreen: true,
                        poster: null,
                        bigPlay: true,
                        autoHide: false,
                        autoHideDelay: 3000,
                        playsinline: false,
                        loop: false,
                        muted: false,
                    },
                    onReady: (playYT) =>{

                    },
                });

            },
            error:function (){

            }
        })
    })
</script>
</body>
</html>
