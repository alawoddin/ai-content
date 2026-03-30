@extends('admin.dashboard')
@section('admin')

@php
    $templates = \App\Models\Template::latest()->get();

    $plans = \App\Models\Plan::latest()->get();
@endphp





    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head">
                @php
                    $id = Auth::user()->id;
                    $profileData = App\Models\User::find($id);
                @endphp

                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h2 class="display-6">Welcome {{ $profileData->name }}!</h2>
                    </div>
                </div>
            </div>
            
            <!-- .nk-page-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    @foreach ($plans as $item)
                               <div class="col-sm-6 col-xxl-3">
                        <div class="card card-full bg-purple bg-opacity-10 border-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="fs-6 text-light mb-0">{{ $item->name }} </div>
                                    <a href="history.html" class="link link-purple">price{{$item->price}}</a>
                                </div>
                                <h5 class="fs-1">{{ $item->monthly_word_limit }} <small class="fs-3">words</small></h5>
                                <div class="fs-7 text-light mt-1"><span class="text-dark">{{$item->templates}}</span>/{{$item->templates}} 
                                    generated</div>
                            </div>
                        </div><!-- .card -->
                    </div>
                    @endforeach
             
                    <!-- .col -->
                </div><!-- .row -->
            </div><!-- .nk-block -->
            <div class="nk-block-head">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h2 class="display-6">Popular Templates</h2>
                    </div>
                    <div class="nk-block-head-content">
                        <a href="templates.html" class="link">Explore All</a>
                    </div>
                </div>
            </div>
            
            <!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row g-gs">
                 <!-- .col -->
                 @foreach ($templates as $item)
    <div class="col-sm-6 col-xxl-3 filter-item blog-content">
        <div class="card card-full shadow-none">
            <div class="card-body">
                <a href="{{ route('details.template', $item->id) }}">
                    
                    <div class="media media-rg media-middle media-circle text-primary bg-primary bg-opacity-20 mb-3">
                        <em class="{{ $item->icon }}"></em>
                    </div>

                    <h5 class="fs-4 fw-medium">{{ $item->title }}</h5>
                    <p class="small text-light line-clamp-2">{{ $item->description }}</p>

                </a>
            </div>
        </div>
    </div>
@endforeach
                    
                </div><!-- .row -->
            </div><!-- .nk-block -->

            <div class="nk-block">

            </div><!-- .nk-block -->
        </div>
    </div>
@endsection
