

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
        <div class="mb-3">
            <label for="images" class="form-label">Images</label>
            <input type="file" class="form-control" id="images">
            <small id="images_alert" class="text-danger"></small>
        </div> 
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product_name">
            <small id="product_name_alert" class="text-danger"></small>
        </div>
        <div class="mb-3">
            <label class="form-label" for="product_desc">Description</label>
            <textarea class="form-control" id="product_desc" style="height: 100px"></textarea>
            <small id="product_desc_alert" class="text-danger"></small>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price">
            <small id="price_alert" class="text-danger"></small>
        </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="createProduct()">Create</button>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
<script src="sweetalert2/dist/sweetalert2.min.js"></script>

<script>
    const createProduct = async () => {
      document.getElementById('images_alert').innerHTML=''
      document.getElementById('product_name_alert').innerHTML=''
      document.getElementById('product_desc_alert').innerHTML=''
      document.getElementById('price_alert').innerHTML=''

      try{
          const product_image = document.getElementById('images').files[0]
                  const product_name = document.getElementById('product_name').value
                  const product_desc = document.getElementById('product_desc').value
                  const price = document.getElementById('price').value
                  

                  const formData ={
                      'product_image':product_image,
                      'product_name':product_name,
                      'description':product_desc,
                      'price':price
                  }

                  // console.log(product_name, product_desc, price)
                  const {data} = await axios.post('/api/product/create', formData ,{
                    headers: {'Content-Type':'multipart/form-data'}
                  })

                  if (data) {
                      $('#productModal').modal('hide');

                      refetchProducts()
                      Swal.fire({
                          icon: 'success',
                          title: data.message,
                          // text: 'Something went wrong!',
                          // footer: '<a href="">Why do I have this issue?</a>'
          })
                  }
      }catch(error){
        if(error.response.data.errors.hasOwnProperty('product_image')){
                document.getElementById('images_alert').innerHTML=error.response.data.errors['product_image'][0]
            }
        if(error.response.data.errors.hasOwnProperty('product_name')){
            document.getElementById('product_name_alert').innerHTML=error.response.data.errors['product_name'][0]
        }
        if(error.response.data.errors.hasOwnProperty('description')){
            document.getElementById('product_desc_alert').innerHTML=error.response.data.errors['description'][0]
        }
        if(error.response.data.errors.hasOwnProperty('price')){
            document.getElementById('price_alert').innerHTML=error.response.data.errors['price'][0]
        }
        console.log(error)
      }
        

        console.log(data)
    }

</script>