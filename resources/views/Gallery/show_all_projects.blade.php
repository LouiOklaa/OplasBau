@extends('layouts.master_home_page')
@section('title')
    Alle Projekte
@endsection
@section('current_page')
    Alle Projekte
@endsection
@section('contents')

    <form method="post" action="{{ route('sort_projects') }}" id="sortForm" onsubmit="return false;">
        @csrf
        <input type="hidden" name="page" value="{{ request()->get('page', 1) }}">
        <div class="row justify-content-between align-items-center">

            <div class="col-auto d-flex align-items-center">
                <label for="sortSelect" class="field-label mr-2">Sortieren nach</label>
                <div class="field-group">
                    <select class="field-control" name="sort4" id="sort4" onchange="handleSortChange()">
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
                Anzeigen von {{ $projects->firstItem() ?: 0 }} bis {{ $projects->lastItem() ?: 0 }}
                von {{ $projects->total() }} gesamt
            </div>
        </div>
    </form>

    <section id="projects" class="projects">
        <div class="container" data-aos="fade-up">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                 data-portfolio-sort="original-order">
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @if(count($projects) !== 0)
                        @include('Gallery.partials_projects_list')
                </div>
                @else
                    <div class="text-center" style="margin-top: 30px;">
                        <h3>Derzeit sind keine Projekte in dieser Kategorie verfügbar 😞</h3>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
        <div class="blog-pagination">
            <ul class="justify-content-center">
                @if ($projects->onFirstPage())
                    <li class="disabled"><span><i class="fas fa-angle-left" aria-hidden="true"></i></span></li>
                @else
                    <li><a href="{{ $projects->previousPageUrl() }}"><i class="fas fa-angle-left"
                                                                        aria-hidden="true"></i></a></li>
                @endif

                @for ($i = 1; $i <= $projects->lastPage(); $i++)
                    @if ($i === $projects->currentPage())
                        <li class="active"><a href="#">{{ $i }}</a></li>
                    @else
                        <li><a href="{{ $projects->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

                @if ($projects->hasMorePages())
                    <li><a href="{{ $projects->nextPageUrl() }}"><i class="fas fa-angle-right"
                                                                    style="color: var(--color-primary);"
                                                                    aria-hidden="true"></i></a></li>
                @else
                    <li class="disabled"><span><i class="fas fa-angle-right" aria-hidden="true"></i></span></li>
                @endif
            </ul>
        </div>
    </div>

@endsection
