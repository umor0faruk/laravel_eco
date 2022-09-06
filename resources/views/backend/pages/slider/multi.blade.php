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
            <a class="btn btn-info" href="{{ Route('slider.multistore') }}">Add Slider</a>
            <form id="form" action="{{ route('slider.multistore') }}" method="POST" enctype="multipart/form-data">
               @csrf
            <div class="form-group">
                    <div class="form-group">
                       <select name="s_id" class="form-control">
                        <option value="">-----Select Slider-----</option>
                         @foreach($sliders as $slider)   
                         <option value="{{ $slider->id }}">{{ $slider->title }}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="file" name="pics[]" multiple>
                    </div> 
                    <button class="btn btn-info">Add Images</button>
                    </form>
            </div>
        </div><!-- row -->
      </div><!-- br-pagebody -->
      @include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    @endsection