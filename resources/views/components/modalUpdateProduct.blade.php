<!-- Modal -->
<div class="modal fade" id="productUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
        <div class="input-group mb-3">
          <label class="input-group-text" for="inputGroupFile02">Upload</label>
          <input type="file" class="form-control" id="inputGroupFile02">
          <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <div class="mb-3">
            <label for="product_name_update" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product_name_update">
        </div>
        <div class="mb-3">
            <label class="form-label" for="product_desc_update">Description</label>
            <textarea class="form-control" id="product_desc_update" style="height: 100px"></textarea>
        </div>
        <div class="mb-3">
            <label for="price_update" class="form-label">Price</label>
            <input type="number" class="form-control" id="price_update">
        </div>
        <div class="mb-3 invisible">
            <label for="price_update" class="form-label">Price</label>
            <input type="number" class="form-control" id="updateID">
        </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="updateProduct()">Update</button>
      </div>
    </div>
  </div>
</div>