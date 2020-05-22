@extends('layouts.app')

@section('title')
    {!! config('app.name') !!}
@endsection

@section('bg_class')
    bg_standard
@endsection

@section('slide')

    <div id="carousel-area" class="header-slide">
        <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
        <!--div class="carousel-inner" role="listbox">
            <div class="carousel-item carousel-item2 active " >
                <img src="{!! asset('img/bg.jpg') !!}" alt="" class=" ">
                <div class="carousel-caption center transparent">
                    <img src="{!! asset('img/logo.png') !!}" alt="">

                </div>
            </div>

        </div-->

        </div>
    </div>

@endsection

@section('css')
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>

    <style>
        .btn-special {
            font-size: 20px;
            padding: 5px 12px;
            border-radius: 0px;
            font-weight: 100 !important;
            color: #959595;
            border: 1px solid rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(0,0,0,0.15);
            background-color: #f8f8f8;
            align-items: center;
            text-transform: uppercase;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            display: inline-block;
            cursor: pointer;
        }
        .btn-special-download {
            font-size: 15px;
            padding: 5px 12px;
            border-radius: 0px;
            font-weight: 100 !important;
            color: #475c95;
            border: 1px solid rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(0,0,0,0.15);
            background-color: #f8f8f8;
            align-items: center;
            text-transform: uppercase;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            display: inline-block;
            cursor: pointer;
        }
        .btn-special:hover, btn-special-download:hover {
            background-color: rgba(164, 201, 255, 0.49);
            color: #375aa7;
            cursor: pointer;
        }
        .card{
            border: none;
            margin-bottom: 40px;

        }
        .card img{
            max-height: 200px;
            max-width: 100%;
            width: auto !important;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            text-align: center;
        }
        .dropdown:hover>.dropdown-menu {
            display: block;
        }
        .dropdown-toggle::after {
            display:none;
        }
        .dropdown-menu{
            margin-top: 12px;
        }
        .dropdown-menu:before {
            position: absolute;
            top: -7px;
            left: 9px; /* Example: right:10px; */
            display: inline-block;
            border-right: 7px solid transparent;
            border-bottom: 7px solid #ccc;
            border-left: 7px solid transparent;
            border-bottom-color: rgba(0, 0, 0, 0.2);
            content: '';
        }

        .dropdown-menu:after {
            position: absolute;
            top: -6px;
            left: 10px; /* Example: right:10px; */
            display: inline-block;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #ffffff;
            border-left: 6px solid transparent;
            content: '';
        }
        .h4, h4 {
            font-size: 1.5rem !important;
            font-weight: 100 !important;
        }
        .h5, h5 {
            font-size: 1.25rem;
        }
        .h1, h1 {
            font-size: 2.5rem !important;
            font-weight: 100 !important;
        }
        .h2, h2 {
            font-size: 2rem;
            font-weight: 100 !important;
        }
        .spec-text{
            font-family: 'Abel',sans-serif !important;
        }
        .bg_modal_heder .modal-header {
            position: relative;
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            background-color: #777;
            min-height: 50px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .line_modal{
            min-height: 60px;
            padding-top: 15px;
            border-bottom: 1px dotted #adadad;
        }
        .line_modal .file_name{
            font-size: 1.7em;
        }
        .player_btn{
            color: #989898;
            margin-right: 20px;
        }

        .border-bottom-dotted{
            border-bottom: 1px dotted #adadad;
        }
    </style>

@endsection




@section('content')

    <section id="blog" class="section">

        <div class="container">
            <div class="row">


                @include('flash::message')


                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-10">
                    <div class="row">
                @foreach($categories as $cat)

                    <h1>{!! $cat->nom !!}</h1>

                    <!-- Image Field -->
                    <div class="col-sm-12">
                        <hr style="margin: 15px 0px; border-bottom: 1px solid #f7f4f4">
                    </div>


                    @foreach($cat->media as $media)
                        <div class="col-md-3 col-sm-6">
                            <div class="card" style="text-align: center;">
                                <div>
                                    <img class="card-img-top" src="{!! $media->getImageLink() !!}"
                                         alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    @if($media->getMediaAssocierType("file")->count() > 0)
                                        @php $media_relier = $media->getMediaAssocierType("file"); @endphp
                                        <span class="dropdown">
                                            <button class="btn-special dropdown-toggle btn-file" type="button"
                                                    data-id="{!! $media->id !!}"
                                                    id="dropdownMenuButton_file_{!! $media->id !!}" data-toggle="dropdown"
                                                    aria-haspopup="false" aria-expanded="false">
                                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_file_{!! $media->id !!}">
                                                @foreach($media_relier as $ma)
                                                    <a class="dropdown-item" href="#">
                                                        <i class='fa fa-square-o'></i>
                                                        {!! $ma->name !!}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </span>
                                    @endif
                                    @if($media->getMediaAssocierType("audios & videos")->count() > 0)
                                        @php $media_relier = $media->getMediaAssocierType("audios & videos"); @endphp
                                        <span class="dropdown">
                                            <button class="btn-special dropdown-toggle btn-audios-video" type="button"
                                                    data-id="{!! $media->id !!}"
                                                    id="dropdownMenuButton_video_{!! $media->id !!}" data-toggle="dropdown"
                                                    aria-haspopup="false" aria-expanded="false">
                                                <i class="fa fa-headphones" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_video_{!! $media->id !!}">
                                                @foreach($media_relier as $ma)
                                                    <a class="dropdown-item" href="#">
                                                        <i class='fa fa-square-o'></i>
                                                        {!! $ma->name !!}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </span>
                                    @endif


                                    <button type="button" class="btn-special btn-share"
                                            data-link="{!! route('media-detail', $media->id) !!}"
                                            data-id="{!! $media->id !!}">
                                        <i class="fa fa-share" aria-hidden="true"></i>
                                    </button>

                                </div>
                            </div>

                        </div>


                    @endforeach






                @endforeach


                    </div>
                </div>

                <div class="col-sm-1">&nbsp;</div>

            </div>


            @include('feed_back.feedbackForm')


        </div>
    </section>



    <div class="modal fade bg_modal_heder" id="dropdownMenuButton_file_modal" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content spec-text">
                <div class="modal-header">
                    <h5 class="modal-title white " id="exampleModalLabel">Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="white" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <img id="img_file_modale" src="{!! asset('img/test.jpg') !!}" class="img-fluid" alt="" title="">
                        </div>
                        <div class="col-9">
                            <h6 class="spec-text categorie">nom de categorie</h6>
                            <h1 class="spec-text media_name">nom du media</h1>
                            <h6 class="spec-text langue">English</h6>
                            <div class="col-sm-12" style="padding: 0px;">
                                <hr style="width: 100%; margin: 15px 0px; border-bottom: 1px solid #f7f4f4">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <nav>
                                        <div class="nav nav-tabs media_file_modal_tab" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">PDF</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">RTF</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">XML</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent-file">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bg_modal_heder" id="dropdownMenuButton_share_modal" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content spec-text">
                <div class="modal-header">
                    <h5 class="modal-title white " id="exampleModalLabel">Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="white" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <img id="img_file_modale_2" src="{!! asset('img/test.jpg') !!}" class="img-fluid" alt="" title="">
                        </div>
                        <div class="col-9">
                            <h6 class="spec-text categorie_2">nom de categorie</h6>
                            <h1 class="spec-text media_name_2">nom du media</h1>
                            <h6 class="spec-text langue_2">English</h6>
                            <div class="col-sm-12" style="padding: 0px;">
                                <hr style="width: 100%; margin: 15px 0px; border-bottom: 1px solid #f7f4f4">
                            </div>
                            <div class="row border-bottom-dotted">
                                <div class="col-sm-1">
                                    <span><i class="fa fa-link fa-2x" aria-hidden="true"></i></span>
                                </div>
                                <div class="col-sm-11">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="" id="link_share">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <br>
                                    <a target="_blank" href="mailto:{!! config('mail.admin.address') !!}" class="btn-special-download">
                                        <i class="fa fa-envelope-o"></i>
                                        <span>Share Via Email</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection



@section('scripts')

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({
                html: true
            });

            $('.btn-file').click(function(){
                var id = $(this).data('id');
                chargerMediaFile(id, "file");
            });

            $('.btn-share').click(function(){
                var id = $(this).data('id');
                chargerShareLink(id, this);
            });
            $('.btn-audios-video').click(function(){
                var id = $(this).data('id');
                chargerMediaFile(id, "audios_video");
            });

            $('.player').on('ended', function(){
                var id = $(this).data("id");
                $('#player_btn_'+id).html('<i class="fa fa-play fa-2x"></i>');
            });


        })


        function chargerMediaFile(id, file_format){

            $.ajax({
                url: "{!! route('get-media') !!}",
                method: "POST",
                data: {_token: "{!! csrf_token() !!}", id:id },
                dataType: "json",
                beforeSend: function( xhr ) {

                },
                success: function( data, textStatus, jqXHR ) {
                    if(data.status == "success"){
                        console.log( data );
                        var donne = data.data;
                        $('#dropdownMenuButton_file_modal .categorie').html(donne.categorie.nom);
                        $('#dropdownMenuButton_file_modal .media_name').html(donne.name);
                        $('#img_file_modale').attr('src', donne.lienImage);
                        var chaine = "";
                        var type = [];
                        var taille = [];
                        var mediaAssociers = donne.mediaAssociersFile;
                        if(file_format != "file")
                            mediaAssociers = donne.mediaAssociersAudioVideo;

                        for(var i = 0; i < mediaAssociers.length; i++) {
                            var classs = (i == 0) ? "active" : "";
                            var letype = mediaAssociers[i].type;
                            var ind = type.indexOf(letype);
                            if (ind == -1) {
                                type.push(letype);
                                taille[letype] = mediaAssociers[i].taille;
                                chaine += '<a class="nav-item nav-link ' + classs + '" id="nav-home-tab-'+letype+'" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">' + letype.toUpperCase() + '</a>'
                            }else{
                                taille[letype] += mediaAssociers[i].taille;
                            }
                        }

                        var contenu = "";
                        var allFileUrl = donne.zipFileLong;
                        if(file_format != "file")
                            allFileUrl = donne.zipAudioVideoLong;
                        for(var j = 0; j < type.length; j++) {
                            contenu += '<div class="tab-pane fade show '+((j == 0) ? "active": "")+'" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab-'+type[j]+'">';
                            contenu += '<div class="row line_modal">' +
                                            '<div class="col-sm-8">' +
                                                '<span class="file_name">Download all file</span>' +
                                            '</div>'+
                                            '<div class="col-sm-4">' +
                                                '<a href="'+ allFileUrl +'" class="btn-special-download">' +
                                                    '<i class="fa fa-cloud-download"></i>' +
                                                    '<span>ZIP' +
                                                    ' ('+taille[type[j]]+' MB)</span>' +
                                                '</a>' +
                                            '</div>'+
                                        '</div>';
                            for(var i = 0; i < mediaAssociers.length; i++) {
                                var letype = mediaAssociers[i].type;
                                var tail = mediaAssociers[i].taille;
                                if (letype == type[j]) {
                                    contenu += addFileFormat(mediaAssociers[i].ext, mediaAssociers[i].name, mediaAssociers[i].lien, letype, tail, mediaAssociers[i].id);


                                }
                            }
                            contenu += '</div>';
                        }

                        $('.media_file_modal_tab').html(chaine);
                        $('#nav-tabContent-file').html(contenu);
                    }
                    $('#dropdownMenuButton_file_modal').modal('show');
                },
                error: function( jqXHR, textStatus, errorThrown ) {

                    console.log( errorThrown );
                },
                complete: function( jqXHR, textStatus ) {

                    console.log( textStatus );
                }
            })



        }



        function addFileFormat(ext, name, lien, letype, tail, id){
            contenu ='<div class="row line_modal">' +
                            '<div class="col-sm-8">';

            if(ext == 'file' || ext == 'images') {
                contenu += '<span class="file_name">'+name+'</span>';
            }else if(ext == 'videos'){
                contenu += '<span class="player_btn" id="player_btn_'+id+'" onclick="playPause('+id+')"><i class="fa fa-play fa-2x"></i></span>' +
                            '<video class="player" id="player_'+id+'" data-id="'+id+'"  style="display: none" width="300" height="auto" controls>'+
                                '<source src="'+lien+'" type="video/'+letype+'">'+
                                'Your browser does not support the video tag.'+
                            '</video>' +
                            ' <span class="file_name">'+name+'</span>';
            }else if(ext == 'audios'){
                contenu += '<span class="player_btn" id="player_btn_'+id+'" onclick="playPause('+id+')"><i class="fa fa-play fa-2x"></i></span>' +
                            '<audio class="player"  id="player_'+id+'" data-id="'+id+'"  style="display: none" width="300" height="auto" controls>'+
                                '<source src="'+lien+'" type="audio/'+letype+'">'+
                                'Your browser does not support the audio tag.'+
                            '</audio>' +
                            ' <span class="file_name">'+name+'</span>';
            }
            contenu += '</div>' +
                '<div class="col-sm-4">' +
                '<a target="_blank" href="'+lien+'" class="btn-special-download">' +
                '<i class="fa fa-cloud-download"></i>' +
                '<span>'+letype.toUpperCase()+
                ' ('+tail+' MB)</span>' +
                '</a>' +
                '</div>'+
                '</div>';

            return contenu;
        }

        function playPause(id) {
            var vid = document.getElementById("player_"+id);
            if(vid.paused){
                vid.play();
                $('#player_btn_'+id).html('<i class="fa fa-pause fa-2x"></i>');
            }else{
                vid.pause();
                $('#player_btn_'+id).html('<i class="fa fa-play fa-2x"></i>');
            }

        }





        function chargerShareLink(id, elm){

            var lien = $(elm).data('link');
            $('#link_share').val(lien);


            $.ajax({
                url: "{!! route('get-media') !!}",
                method: "POST",
                data: {_token: "{!! csrf_token() !!}", id:id },
                dataType: "json",
                beforeSend: function( xhr ) {

                },
                success: function( data, textStatus, jqXHR ) {
                    if(data.status == "success"){
                        console.log( data );
                        var donne = data.data;
                        $('#dropdownMenuButton_share_modal .categorie_2').html(donne.categorie.nom);
                        $('#dropdownMenuButton_share_modal .media_name_2').html(donne.name);
                        $('#img_file_modale_2').attr('src', donne.lienImage);


                    }
                    $('#dropdownMenuButton_share_modal').modal('show');
                },
                error: function( jqXHR, textStatus, errorThrown ) {

                    console.log( errorThrown );
                },
                complete: function( jqXHR, textStatus ) {

                    console.log( textStatus );
                }
            })


        }





    </script>


@endsection








