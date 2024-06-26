@include('common.header')
<div class="page-title-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li>{{ $service->name }}</li>
                    </ul>
                    <h2 class="Inter">{{ $service->name }}</h2>
                    <p>Vikartr Technologies is at the forefront of {{ $service->name }}.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service-detail section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="service-detail-content">
                    <div class="services-details-image">
                        <img src="{{ Storage::url($service->image)  }}" alt="image" class="img-fluid w-100">
                    </div>
                    
                    <h4>Software Development Consulting We Provide</h4>
                    <div class="features-text">
                        <h5 class="Inter-Medium">We Provide Our Client Best Software &amp; IT Solution Services</h5>
                        {!!$service->long_description!!} 
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            
    <aside class="services-widget">
        <section class="widget widget_categories">
            <h3 class="widget-title">Our Services</h3>
            <ul>
                @foreach($allServices as $allservice)    
                <li>
                    <a class="secondary-white" href="{{ route('service', ['slug' => $allservice->slug]) }}">{{ $allservice->name }}</a>
                </li>
                @endforeach
            </ul>
        </section>
    </aside>

            </div>
        </div>
    </div>
</div>

<section class="section"></section>
@include('common.footer')