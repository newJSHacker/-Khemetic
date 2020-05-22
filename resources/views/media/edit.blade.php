@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Media
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($media, ['route' => ['media.update', $media->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('media.fields')

                   {!! Form::close() !!}
               </div>


               <div class="row">
                   <div class="col-sm-12">
                       <br><br>
                        @if(isset($media))
                            @php $mediaAssociers = $media->mediaAssociers; @endphp
                           <table class="table table-responsive" id="mediaAssociers-table">
                               <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>File</th>
                                   <th>Type</th>
                                   <th colspan="3">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @if($mediaAssociers->count() > 0)
                                   @foreach($mediaAssociers as $mediaAssocier)
                                       <tr>
                                           <td>{!! $mediaAssocier->name !!}</td>
                                           <td>{!! $mediaAssocier->afficher(150) !!}</td>
                                           <td>{!! $mediaAssocier->type !!}</td>
                                           <td>
                                               {!! Form::open(['route' => ['associateMedia.destroy', $mediaAssocier->id], 'method' => 'delete']) !!}
                                               <div class='btn-group'>
                                                   <a href="{!! route('associateMedia.show', [$mediaAssocier->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                                   <a href="{!! route('associateMedia.edit', [$mediaAssocier->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                                   {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                               </div>
                                               {!! Form::close() !!}
                                           </td>
                                       </tr>
                                   @endforeach

                               @else

                                   <tr>
                                       <td colspan="6">
                                           No media associate to this one !!!
                                           <a href="{!! route('associateMedia.edit', [$mediaAssocier->id]) !!}" class='btn btn-default btn-xs'>
                                               Add new associate media
                                           </a>
                                       </td>
                                   </tr>
                               @endif
                               </tbody>
                           </table>

                        @endif

                   </div>
               </div>


           </div>
       </div>
   </div>
@endsection








@section('scripts')

    <script>

        $(document).ready(function(){
            $('#to_add_associete_media').click(function (e){
                addNewAssocieteMedia();
            });
        });


        function addNewAssocieteMedia(){
            var newadd = $('#model_form_media_associer').html();
            $('#add_relieted_media').before(newadd);


        }
    </script>

@endsection
