@extends('layouts.master')
@section('content')

<div class="col-lg-8">

    <!-- Post content-->
            <article>
        <!-- Post header-->
        <header class="mb-4">
            <!-- Post title-->
            <h1 class="fw-bolder mb-1">{{$data->title}}</h1>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2">
                {{$mysqldate = date('g:i a \o\n l jS F Y', strtotime($data->created_at))}}
                </div>
            <!-- Post categories-->
            @foreach ($bcData as $bcItem)
                @foreach ($cData as $cItem)
                    @if ($bcItem->category_id == $cItem->id)
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$cItem->name}}</a>
                    @endif
                @endforeach
            @endforeach
        </header>
        <!-- Preview image figure-->
        <figure class="mb-4"><img class="img-fluid rounded" src="{{URL::to('assets/images/'.$data->img_link.'')}}" alt="..." /></figure>
        <!-- Post content-->
        <section class="mb-5">
            <p class="fs-5 mb-4">{{$data->description}}</p>
            <p class="fs-5 mb-4">{{$data->content}}</p>
            
        </section>
    </article>


    <!-- Comments section-->
    <section class="mb-5">
        <div class="card bg-light">
            <div class="card-body">
                <!-- Comment form-->
                <form class="mb-4">
                    <div>
                        <textarea class="form-control mb-2" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </div>
                </form>
                <!-- Comment with nested comments-->
                <div class="d-flex mb-4">
                    <!-- Parent comment-->
                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                    <div class="ms-3">
                        <div class="fw-bold">Commenter Name</div>
                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                        <!-- Child comment 1-->
                        <div class="d-flex mt-4">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                            </div>
                        </div>
                        <!-- Child comment 2-->
                        <div class="d-flex mt-4">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                When you put money directly to a problem, it makes a good headline.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single comment-->
                <div class="d-flex">
                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                    <div class="ms-3">
                        <div class="fw-bold">Commenter Name</div>
                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection