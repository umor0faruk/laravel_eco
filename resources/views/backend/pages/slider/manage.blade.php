@extends("backend.template.template")
    @section("content")
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Blank</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-success" href="{{ Route('slider.add') }}">Add New</a>
            <a class="btn btn-success" href="{{ Route('slider.multi') }}">Images</a>
             <table class="table">
                <tr>
                    <th>Slider Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($sliders as $slider)
                   <tr> <td>{{ $slider->title }}</td>
                    <td>{{ $slider->category }}</td>
                    <td>{{ $slider->status }}</td>
                    <td>
                        <img height="100" src="{{ asset('backend/slider/'.$slider->pic) }}" alt="">
                    </td>
                    <td>
                    <a class="btn btn-info btn-sm" href="{{ Route('slider.view',$slider->id) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-success btn-sm" href="{{ Route('slider.edit',$slider->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{ Route('slider.delete',$slider->id) }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach

             </table>
          </div>      
        </div><!-- row -->
      </div><!-- br-pagebody -->
      @include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    @endsection