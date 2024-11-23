@foreach($services as $one)
    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="post-item position-relative h-100">
            <div class="post-img position-relative overflow-hidden">
                <a href="{{asset( 'Attachments/Services/' . $one->image)}}">
                    <img src="{{url('/Attachments/Services/' .$one->image)}}" class="img-fluid" alt=""
                         style="object-fit: cover; width: 100%; height: 300px;">
                </a>
            </div>
            <div class="post-content d-flex flex-column">
                <h3 class="post-title">{{$one->name}}</h3>
                @if(Route::currentRouteName() == 'all_services' || Route::currentRouteName() == 'sort_all_services')
                    <div class="meta d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="ps-2"
                                  style="color: var(--color-primary); font-weight: bold">{{$one->section_name}}</span>
                        </div>
                    </div>
                @endif
                <hr>
                <div class="meta d-flex align-items-center">
                    <div class="d-flex align-items-center">

                        <span class="ps-2">
                            <span class="post-title">Beschreibung :</span>
                            @if($one->note != 0)
                                {{$one->note}}
                            @else
                                Unverfügbar
                            @endif</span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End post item -->
@endforeach
