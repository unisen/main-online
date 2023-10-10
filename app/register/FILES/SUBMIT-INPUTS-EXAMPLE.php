<form class="form-signin" action="products_csv.php" method="POST" enctype="multipart/form-data" style="max-width:600px !important">

            <h2 class="form-signin-heading">Upload Photos</h2>

            <h4>Product #1</h4>
            <input type="hidden" name="product_ids[]" value="1">
            <input type="file" class="form-control" name="photos[]" id="photos" multiple><br /><br />


            <h4>Product #2</h4>
            <input type="hidden" name="product_ids[]" value="2">
            <input type="file" class="form-control" name="photos[]" id="photos" multiple><br /><br />


            <h4>Product #3</h4>
            <input type="hidden" name="product_ids[]" value="3">
            <input type="file" class="form-control" name="photos[]" id="photos" multiple><br /><br />


            <h4>Product #4</h4>
            <input type="hidden" name="product_ids[]" value="4">
            <input type="file" class="form-control" name="photos[]" id="photos" multiple><br /><br />


            <h4>Product #5</h4>
            <input type="hidden" name="product_ids[]" value="5">
            <input type="file" class="form-control" name="photos[]" id="photos" multiple><br /><br />


            <h4>Product #6</h4>
            <input type="hidden" name="product_ids[]" value="6">
            <input type="file" class="form-control" name="photos[]" id="photos" multiple><br /><br />

            <button class="btn btn-large btn-primary" type="submit">Upload</button>

        </form>