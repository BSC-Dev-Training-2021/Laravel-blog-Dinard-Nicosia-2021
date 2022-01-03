
@extends('layouts.master')

@section('content')

            <div class="col-lg-8">
                <header class="mb-8">
                    <!-- Post title-->

                    <!-- Post meta content-->
                      @include('partials.errors')
                </header>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">
                        <nav class="navbar navbar-expand-lg navbar-light bg-mb-3">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Category</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                
                            </div>
                        </nav>
                    </div>
                </div>
                <section class="mb-8">

                    <form method="POST" action="{{route('update-category')}}">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Category Name</span>
                            <input type="text" name="name" class="form-control" value="@if(isset($name)){{$name}}@endif" placeholder="">
                            <input type="hidden" name="id" class="form-control" value="@if(isset($id)){{$id}}@endif">
                        </div>
                        <button type="submit" name="save_bttn" class="btn btn-success mt-2">Save</button>
                        {{ csrf_field() }}
                    </form>
                </section>

            </div>
            

@endsection



                        
