<x-layout>
    <div class="container w-50 my-5 rounded">
        <form method="POST" action="/login" class="login-form border rounded shadow-sm p-4 bg-white">
            @csrf
            <h1 class="text-center my-3 fw-bolder">
                Sign in to your account
            </h1>
            <div class="my-3 text-center" style="font-size: 14px">
                Or<a href="/register"> signup for free</a>
            </div>

            <div class="row gy-4">
                <div class="col-md-12">
                    <input type="text" name="email" class="form-control" placeholder="Email address" required="" value="{{old('email')}}">
                    @error('email')
                    <span class="text-danger" style="font-size: 12px">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                    @error('password')
                    <span class="text-danger" style="font-size: 12px">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-12 text-center">
                    <button id='btn-login' type="submit" class="btn btn-danger" style="color: white">
                        <i class="bi bi-lock-fill"></i> Sign in
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>

