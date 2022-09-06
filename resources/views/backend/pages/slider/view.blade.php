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
            <a class="btn btn-info" href="{{ Route('slider.show') }}">Show All</a>
           <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>Slider Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Link</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <th>{{ $slider->title }}</th>
                        <th>{{ $slider->description }}</th>
                        <th>{{ $slider->category }}</th>
                        <th>{{ $slider->link }}</th>
                        <th>{{ $slider->status }}</th>
                    </tr>
                </table>
           </div>     
        </div>
        <div class="row">
           <div class="col-md-4">
                <img src="{{ asset('backend/slider/'.$slider->pic) }}" alt="">
           </div>     
           <div class="col-md-8">
                @foreach($multis as $multi)
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="image">
                        <img class="w-100" src="{{ asset('backend/slider/images/'.$multi->picture) }}" alt="">
                        <div class="action">
                            <a href="" class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </div>
                        </div> 
                    </div>
                </div>
                @endforeach
           </div> 
        </div>
        <style>
            .image{
                width:200px;
                position: relative;
            }
            .image img:hover + .action{
                display: flex;
            }
            .image .action{
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0,0,0,.5);
                display: none;
                justify-content: center;
                align-items: center;
            }
        </style>
      </div><!-- br-pagebody -->
      @include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    @endsection