@extends('app')
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                           
                            <div class="col-lg-6">
                          
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Categories</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('add-categories-brannds')}}" id="myForm" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {!! csrf_field() !!}
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="category_name" placeholder="Text" class="form-control {{ $errors->has('category_name') ? ' is-invalid' : '' }}">
                                                    {{--<small class="form-text text-muted">This is a help text</small>--}}
                                                    @if ($errors->has('category_name'))
                                                        <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('category_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Parent Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    {{--<input type="text" id="text-input" name="category_parent_category" placeholder="Text" class="form-control {{ $errors->has('category_parent_category') ? ' is-invalid' : '' }}">--}}
                                                    {{--<small class="form-text text-muted">This is a help text</small>--}}
                                                    {{--@if ($errors->has('category_parent_category'))--}}
                                                        {{--<span class="invalid-feedback">--}}
                                                      {{--<strong>{{ $errors->first('category_parent_category') }}</strong>--}}
                                                        {{--</span>--}}
                                                    {{--@endif--}}

                                                        <select name="category_parent_category" id="select" class="form-control" >
                                                            <option value="0">Please select</option>
                                                            @foreach($ca as $ca)
                                                                <option value="{{$ca->id}}">{{$ca->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>

                                            </div>
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="category_description" id="textarea-input" rows="5" placeholder="Content..." class="form-control {{ $errors->has('category_description') ? ' is-invalid' : '' }}"></textarea>
                                                    @if ($errors->has('category_description'))
                                                        <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('category_description') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm" onclick="myFunction()">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                              
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Categories </strong> Details
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Name</th>
                                                <th>Description</th>
                                                
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($a as $index => $c)
                                            <tr class="tr-shadow">
                                                
                                                <td>{{ $c->category_name }}</td>
                                                <td>
                                                    {{ $c->category_description }}
                                                </td>
                                              
                                               <td>
                                                    <div class="table-data-feature">
                                                        
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a  href="{{route('edit-category',$c->id) }}">  <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('category.delete',$c->id) }}">  <i class="zmdi zmdi-delete"></i>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </td>
                                               
                                            </tr>
                                            <tr class="spacer"></tr>
                                           @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                  
                                </div>
                                
                            </div>
                            
                        </div>
                        <?php include "includes/footer.php"; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection()
    <script>
        function myFunction() {
            document.getElementById("myForm").reset();
        }
    </script>
