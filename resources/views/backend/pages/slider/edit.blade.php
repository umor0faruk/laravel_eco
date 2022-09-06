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
            <div class="col-md-4">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input value="{{ $slider->title }}" class="form-control" type="text" name="title" placeholder="Enter slider title">
                    </div> 
                    <div class="form-group">
                    <input value="{{ $slider->category }}" class="form-control" type="text" name="category" placeholder="Enter slider title">
                    </div> 
                    <div class="form-group">
                            <textarea class="form-control"  type="text" name="description" placeholder="Enter slider description">{{ $slider->description }}</textarea>
                    </div> 
                    <div class="form-group">
                        <img src="{{ asset('backend/slider/'.$slider->pic) }}" alt="">
                    </div> 
                    <div class="form-group">
                            <input class="form-control" type="file" name="pic" >
                    </div> 
                    <div class="form-group">
                            <input value="{{ $slider->link }}"  class="form-control" type="text" name="link" >
                    </div>
                    <div class="form-group">
                       <select name="status" class="form-control">
                        <option value="">-----Select Status-----</option>
                        <option value="1" @if($slider->status == 1) selected @endif>Active</option>
                        <option value="2" @if($slider->status == 2) selected @endif>Inactive</option>
                       </select>
                    </div>
                    <button class="btn btn-info">Add Slider</button>
                    </form>
            </div>
            <div class="col-md-8">
                @foreach($multis as $multi)
                <a href="{{ Route('slider.deleteimage',$multi->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                <img style="margin:10px" height="200" width="200" src="{{ asset('backend/slider/images/'.$multi->picture) }}" alt="">
                @endforeach
                <form action="{{ route('slider.multistore') }}" method="POST" enctype="multipart/form-data">
                   @csrf 
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="s_id" value="{{ $slider->id }}">
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