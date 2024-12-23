<a href="/auctions/{{$id}}" class="col-lg-3 col-md-6 d-flex align-items-stretch justify-content-center" data-aos="fade-up"
   data-aos-delay="200">
    <div class="team-member">
        <div class="member-img" style="width: 100%; height: 300px; overflow: hidden;">
            <img src="{{asset('/storage/'.$src)}}" class="img-fluid" style="object-fit: cover;width: 100%; height: 100%;" alt="">
        </div>
        <div class="member-info">
            <h4>{{$name}}</h4>
            <span>{{$time}}</span>
        </div>
        @if(\App\Models\Auction::find($id)->status == 'live')
            <div class="status-badge bg-danger text-white">Live</div>
        @elseif(\App\Models\Auction::find($id)->status =='upcoming')
            <div class="status-badge bg-warning text-dark">Upcoming</div>
        @else
            <div class="status-badge bg-secondary text-white">End</div>
        @endif
    </div>
</a>
