<div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
    @foreach($projects as $one)
        <?php $mediaExtensions = pathinfo("Attachments/Galerie/$one->media", PATHINFO_EXTENSION) ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
            <div class="portfolio-content h-100">
                @if(in_array($mediaExtensions , ['jpg' , 'jpeg' , 'png' , 'gif']))
                    <img style="width: 100%; height: 300px; object-fit: cover;" src="{{asset( 'Attachments/Galerie/' . $one->media)}}" class="img-fluid" />
                @elseif(in_array($mediaExtensions , ['mp4' , 'mkv' , 'mov']))
                    <video style="width: 100%; height: 300px; object-fit: cover;" src="{{asset( 'Attachments/Galerie/' . $one->media)}}" class="img-fluid"></video>
                @endif
                <div class="portfolio-info">
                    <h4>{{$one->name}}</h4>
                    @if(Route::currentRouteName() == 'all_projects' || Route::currentRouteName() == 'sort_all_projects')
                        <h5>{{$one->section_name}}</h5>
                    @endif
                    <p>{{$one->note}}</p>
                    <a href="{{asset( 'Attachments/Galerie/' . $one->media)}}" class="glightbox preview-link">
                        <i class="bi bi-zoom-in"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
