@extends('layouts.app')

@section('content')

<!-- table for crud -->
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Products</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div>
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
                            Add
                        </button>
                </div>
            </div>
        </div>

    <div class="container">
    <div class="table-responsive small rounded">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">IMAGE</th>
                <th scope="col">NAME</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PRICE</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="bodyData">
            
        </tbody>
    </table>
    </div>
    </div>
</div>

<script>
        const refetchProducts = async() => {
        const tableBody = document.getElementById('bodyData')

            tableBody.innerHTML = `<tr class="text-center">
                                    <td colspan="6">
                                    <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                    </td>
                                    </tr>`


        const { data } = await axios.get('/api/getProducts')

        tableBody.innerHTML="";

        console.log(data);

        data.forEach(product => {
            tableBody.innerHTML +=`<tr class="text-justify">
                                        <td> <img class="w-100 h-50 rounded" src={{asset('`+ product.image_data +`')}}> </td>
                                        <td class="text-uppercase text-bold text-center"><strong>`+ product.name +`</strong></td>
                                        <td>`+ product.desc +`</td>
                                        <td class="text-center">₱`+ product.price +`</td>
                                        
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-success" style="margin-right: 10px;" onclick="fetchProduct(`+ product.id +`)" data-bs-toggle="modal" data-bs-target="#productUpdateModal">Edit</button>
                                                <button class="btn btn-danger" style="margin-right: 10px;" onclick="deleteProduct(`+ product.id +`)">Delete</button>
                                            </div>
                                        </td>
                                </tr>`;
        }); 
        console.log(data);
    }

    const fetchProduct = async (id) =>{

        try{
            const { data } = await axios.get("/api/getProduct/"+id)
            if (data){
                document.getElementById('product_name_update').value=data.name
                document.getElementById('product_desc_update').value=data.desc
                document.getElementById('price_update').value=data.price
                document.getElementById('updateID').value=data.id
                console.log(data)
            }
        }catch(error){
            console.log(error)
        }
    }

    const updateProduct = async () =>{
        document.getElementById('images_update_alert').innerHTML=''
        document.getElementById('product_name_update_alert').innerHTML=''
        document.getElementById('product_desc_update_alert').innerHTML=''
        document.getElementById('price_update_alert').innerHTML=''

        const images = document.getElementById('images_update').files[0]
        const product_name = document.getElementById('product_name_update').value
        const product_desc = document.getElementById('product_desc_update').value
        const price = document.getElementById('price_update').value
        const id = document.getElementById('updateID').value

        const formData ={
            'product_image': images,
            'product_name':product_name,
            'description':product_desc,
            'price':price
        }

        try{
            const { data } = await axios.post("/api/product/update/"+id,formData,{
                headers:{'Content-Type':'multipart/form-data'}
            })

            if (data){
                $('#productUpdateModal').modal('hide');
                // 

                refetchProducts ()
                Swal.fire({
                icon: 'success',
                title: data.message,
                // text: 'Something went wrong!',
                // footer: '<a href="">Why do I have this issue?</a>'
            })
            }

        }catch(error){
            if(error.response.data.errors.hasOwnProperty('product_image')){
                document.getElementById('images_update_alert').innerHTML=error.response.data.errors['product_image'][0]
            }
        if(error.response.data.errors.hasOwnProperty('product_name')){
            document.getElementById('product_name_update_alert').innerHTML=error.response.data.errors['product_name'][0]
        }
        if(error.response.data.errors.hasOwnProperty('description')){
            document.getElementById('product_desc_update_alert').innerHTML=error.response.data.errors['description'][0]
        }
        if(error.response.data.errors.hasOwnProperty('price')){
            document.getElementById('price_update_alert').innerHTML=error.response.data.errors['price'][0]
        }
            console.log(error)
        }
    }

    const deleteProduct = async (id) =>{

        try{
            const { data } = await axios.get("/api/product/delete/"+id)
            if (data){
                refetchProducts ()
                Swal.fire({
                icon: 'success',
                title: data.message,
                // text: 'Something went wrong!',
                // footer: '<a href="">Why do I have this issue?</a>'
            })
            }
        }catch(error){
            console.log(error)
        }
    }
</script>

<script type="module">
    const fetchProducts = async() => {
        const tableBody = document.getElementById('bodyData')

            tableBody.innerHTML = `<tr class="text-center">
                                    <td colspan="6">
                                    <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                    </td>
                                    </tr>`


        const { data } = await axios.get('/api/getProducts')

        tableBody.innerHTML="";

        console.log(data);

        data.forEach(product => {
            tableBody.innerHTML +=`<tr class="text-justify">
                                        <td> <img class="w-100 h-50 rounded" src={{asset('`+ product.image_data +`')}}> </td>
                                        <td class="text-uppercase text-bold text-center"><strong>`+ product.name +`</strong></td>
                                        <td>`+ product.desc +`</td>
                                        <td class="text-center">₱`+ product.price +`</td>
                                        
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-success" style="margin-right: 10px;"  onclick="fetchProduct(`+ product.id +`)" data-bs-toggle="modal" data-bs-target="#productUpdateModal">Edit</button>
                                                <button class="btn btn-danger" style="margin-right: 10px;" onclick="deleteProduct(`+ product.id +`)">Delete</button>
                                            </div>
                                        </td>
                                </tr>`;
        }); 
        console.log(data);
    }

    fetchProducts ()


    


</script>





@endsection
