@extends('layouts.master_home_page')
@section('title')
    Dienstleistungen
@endsection
@section('current_page')
    Dienstleistungen
@endsection
@section('service_name', $section_name)
@section('contents')

    <form method="post" action="{{ route('sort_services') }}" id="sortForm" onsubmit="return false;">
        @csrf
        <input type="hidden" name="page" value="{{ request()->get('page', 1) }}">
        @if(count($services) !== 0)
            <input type="hidden" name="sectionName" value="{{ $services->first()->section_name ?? '' }}">
        @endif

        <div class="row justify-content-between align-items-center">

            <div class="col-auto d-flex align-items-center">
                <label for="sortSelect" class="field-label mr-2">Sortieren nach</label>
                <div class="field-group">
                    <select class="field-control" name="sort1" id="sort1" onchange="handleSortChange()">
                        <option value="" disabled selected>Wählen Sie einen Filter</option>
                        <option value="nameA" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                        <option value="nameZ" {{ request('sort') == 'name' ? 'selected' : '' }}>Name Z-A</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Neueste</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Älteste</option>
                    </select>
                    <span class="select-arrow"><i class="fas fa-chevron-down"></i></span>
                </div>
            </div>

            <div class="col-auto showing text-left">
                Anzeigen von {{ $services->firstItem() ?: 0 }} bis {{ $services->lastItem() ?: 0 }}
                von {{ $services->total() }} gesamt
            </div>
        </div>
    </form>

    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <div class="row gy-5">
                @if(count($services) !== 0)
                    @include('Services.partials_services_list')
            </div>
            @else
                <div class="text-center" style="margin-top: 30px;">
                    <h3>Derzeit sind keine Dienstleistungen in dieser Kategorie verfügbar 😞</h3>
                </div>
            @endif
        </div>
    </section>

    <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
        <div class="blog-pagination">
            <ul class="justify-content-center">
                @if ($services->onFirstPage())
                    <li class="disabled"><span><i class="fas fa-angle-left" aria-hidden="true"></i></span></li>
                @else
                    <li><a href="{{ $services->previousPageUrl() }}"><i class="fas fa-angle-left"
                                                                        aria-hidden="true"></i></a></li>
                @endif

                @for ($i = 1; $i <= $services->lastPage(); $i++)
                    @if ($i === $services->currentPage())
                        <li class="active"><a href="#">{{ $i }}</a></li>
                    @else
                        <li><a href="{{ $services->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

                @if ($services->hasMorePages())
                    <li><a href="{{ $services->nextPageUrl() }}"><i class="fas fa-angle-right"
                                                                    style="color: var(--color-primary);"
                                                                    aria-hidden="true"></i></a></li>
                @else
                    <li class="disabled"><span><i class="fas fa-angle-right" aria-hidden="true"></i></span></li>
                @endif
            </ul>
        </div>
    </div>

@endsection
