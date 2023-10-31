@extends('layouts.app')

@section('content')
<div class="container p-4" >

<div class="row mt-3" id="bodyData">

</div>
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> -->

    <!-- Hero Section -->
    <!-- <div class="row justify-content-center p-1">
        <div class="col-md-8">
            <div class="card p-5">
                <div class="hero text-center">
                    <h1 class="fs-1">Welcome to <b>CupsCath</b></h1>
                    <p class="fs-4">"Discover the Art of Sipping Excellence. CupsCath <br> Where Every Sip Becomes a Pleasure!"</p>
                    <p class="fs-1">☕️</p>
                    <a href="#" class="btn btn-primary btn-lg">Learn More</a>
                </div>
            </div>
        </div>
    </div> -->

    <!-- make a card to view products -->
    <!-- <div class="row mt-3">
        <div class="col-sm-6 col-md-4 col-lg-2 my-2">
            <div class="card">
                <img src="/images/coffee_beans.jpg" alt="" class="w-100 h-auto">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <small class="text-muted">$9.99</small><br/>
                    <button type="submit" class="btn btn-outline-secondary w-100">Add To Cart</button>
                    </div>
                    </div>
                    </div>
</div> -->

<script type="module">
    const fetchProducts = async() => {
        const tableBody = document.getElementById('bodyData')

            tableBody.innerHTML = `<center>
                                        <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </center>`

        const { data } = await axios.get('http://127.0.0.1:8000/api/getProducts')

        tableBody.innerHTML="";

        console.log(data);

        data.forEach(product => {
            tableBody.innerHTML +=`
                                        <div class="col-sm-6 col-md-4 col-lg-2 my-2">
                                            <div class="card h-100">
                                                <img class="h-50" src={{asset('assets/img/img_products/`+ product.image_data +`')}}>
                                                <div class="card-body">
                                                    <h5 class="card-title">`+ product.name +`</h5>
                                                    <small class="text-muted">` + product.price +`</small><br/>
                                                    <button type="submit" class="btn btn-outline-secondary w-100">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    `;
        }); 
        console.log(data);
    }

    fetchProducts ()


</script>
@endsection
