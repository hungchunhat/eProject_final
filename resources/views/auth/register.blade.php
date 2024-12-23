<x-layout>
    <div class="container w-50 my-5 rounded">

        <form method="POST" action="/register" class="login-form border rounded shadow-sm p-4 bg-white">
            @csrf
            <h1 class="text-center my-3 fw-bolder">
                Sign up for free
            </h1>
            <div class="my-3 text-center" style="font-size: 14px">
                Or<a href="/login"> Login with your account</a>
            </div>
            <div class="row gy-4">
                <div class="col-md-12">
                    <input type="text" name="name" class="form-control" placeholder="Full name" required="">
                </div>
                <div class="col-md-12">
                    <input type="text" name="email" class="form-control" placeholder="Email address" required="">
                </div>
                <div class="col-md-12 ">
                    <input type="text" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <div class="col-md-12 ">
                    <input type="text" class="form-control" name="password_confirmation" placeholder="Password confirmation" required="">
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" id="btn-login" class="btn btn-danger">
                        <i class="bi bi-lock-fill"></i> Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
