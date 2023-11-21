@extends('layouts.app')

@section('content')

<!-- <div>
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="https://images.unsplash.com/photo-1617347454431-f49d7ff5c3b1?q=80&w=2015&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="https://images.unsplash.com/photo-1631010231931-d2c396b444ec?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://media.istockphoto.com/id/1535673350/photo/disposable-packaging-for-food-delivery-on-a-white-background.jpg?s=612x612&w=0&k=20&c=VKlftJ6qFeKOTBKnVcJljg6WrubGXgKlkYe5qvum5Is=" class="img-fluid d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div> -->

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

        const { data } = await axios.get('/api/getProducts')

        tableBody.innerHTML="";

        console.log(data);

        data.forEach(product => {
            tableBody.innerHTML +=`
                                        <div class="col-sm-6 col-md-4 col-lg-2 my-2">
                                            <div class="card border-none h-100">
                                                <img class="h-50 card-img-top" src={{asset('`+ product.image_data +`')}}>
                                                <div class="card-body">
                                                    <h5 class="card-title">`+ product.name +`</h5>
                                                    <small class="text-muted">₱` + product.price +`</small><br/>
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
