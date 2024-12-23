<x-layout>
    <section id="team" class="team">

        <!-- Section Title -->
        <div class="container section-title mb-5" data-aos="fade-up">
            <h2>Auctions</h2>
            <p>Auctions are thrilling events where unique items are sold to the highest bidder, offering excitement and
                competition for buyers.</p>
        </div><!-- End Section Title -->
        <div class="container d-flex justify-content-between align-items-center mb-4" data-aos="fade-up">
            <div class="btn-group" role="group" aria-label="Product Categories">
                <a href="/auctions" class="btn form-btn{{!request()->has('status')?'-active':''}} category-btn">All</a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'live']) }}" class="btn form-btn{{request('status')=='live'?'-active':''}} category-btn">Live</a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'upcoming']) }}" class="btn form-btn{{request('status')=='upcoming'?'-active':''}} category-btn">Upcoming</a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'ended']) }}" class="btn form-btn{{request('status')=='ended'?'-active':''}} category-btn">Completed</a>
            </div>
            <form class="d-flex" id="search-form" method="GET" action="{{route('auction.index')}}">
                @foreach(request()->except('name') as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <input type="text" name="name" class="form-control me-2" placeholder="Search by name" aria-label="Search">
                <button type="submit" class="btn form-btn"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="container justify-content-center" data-aos="fade-up" data-aos-delay="100">
            @if($auctions->isEmpty())
                <p class="text-center">No auctions found.</p>
            @else
                @foreach($auctions as $auction)
                    @if(($loop->index) % 4 ===0)
                        <div class="row gy-4 justify-content-center mb-5">
                            @endif
                            <x-card-auction>
                                <x-slot:id>
                                    {{$auction->id}}
                                </x-slot:id>
                                <x-slot:src>
                                    {{$auction->image}}
                                </x-slot:src>
                                <x-slot:name>
                                    {{$auction->name}}
                                </x-slot:name>
                                <x-slot:time>
                                    {{$auction->start_time}}
                                </x-slot:time>
                            </x-card-auction>
                            @if(($loop->index +1) %4===0)
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
        <div class="container d-flex justify-content-center">
            {{ $auctions->links() }}
        </div>
    </section>
</x-layout>
