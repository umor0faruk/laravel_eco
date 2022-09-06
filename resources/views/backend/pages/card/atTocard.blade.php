@extends("backend.template.template")
    @section("content")
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Slider</h4>
          <p class="mg-b-0">Add Slider for All Category</p>
        </div>
      </div>
      <div class="br-pagebody">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <form action="" method="POST">
               @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="product_id" placeholder="Enter Product Id">
            </div> 
            <div class="form-group">
                <input class="form-control" type="text" name="user_id" placeholder="Enter User Id">
            </div> 
            <div class="form-group">
              <div class="wrapper">
                <span class="minus">-</span>
                <span class="num">01</span>
                <span class="plus">+</span>
              </div>
            </div> 

            <button class="btn btn-info">Add to Cart</button>
        </form>
            </div>
        </div><!-- row -->
      </div><!-- br-pagebody -->
      @include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    @endsection