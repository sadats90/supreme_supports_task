<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <br> 
                <div class="card-header card-header-warning">Import Excel</div>
                  <div class="card-body">
                    <form action="/import" method="post" enctype="multipart/form-data">
                            @csrf

                        <div class="form-group">
                            <input type="file" name="file" />

                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                   </form>
                </button>
            </div>
        </div>
    </div>
</div>




<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Stores </h2>
            <hr>
        </div>
        
    </div>
</div>

<br>

<div class="form-group">
    <h5>Search :</h5>
    <input type="text" name="search" id="search" class="form-control" placeholder="Search Store Data" />
   </div>

   <br>

<table class="table table-bordered table-responsive-lg  table-striped store_data_table">
    <tr>
        <th>Store ID</th>
        <th>Title</th>
        <th>Detail</th>
        <th>Edit</th>
        
    </tr>
    @foreach ($stores as $store)
        <tr>
            <td class="table-active store_id_1">{{$store->store_id}}</td>
            <td class="table-success title_1">{{$store->title}}</td>
            <td class="table-active">
                
                <button type="button" value="{{$store->id}}" class="btn btn-primary detailbtn">
                    Detail
                  </button>
            </td> 
            <td class="table-active">    
                
                
                <a href='{{url("edit_store/{$store->id}/")}}'>
                    <button type="button" class="btn btn-primary">Edit</button>
                </a>
            </td>
                </form>
            
        </tr>
    @endforeach
</table>
</div>

{{-- modal starts --}}
  <div class="modal fade bd-example-modal-lg" tabindex="-1" id="detailModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
            <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">store_id</th>
                    <th scope="col">title</th>
                    <th scope="col">address</th>
                    <th scope="col">suburb</th>
                    <th scope="col">state</th>
                    <th scope="col">zip</th>
                    <th scope="col">lat</th>
                    <th scope="col">lng</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                    <td class="store_id"></td>
                    <td class="title"></td>
                    <td class="address"></td>
                    <td class="suburb" ></td>
                    <td class="state"></td>
                    <td class="zip"></td>
                    <td class="lat" ></td>
                    <td class="lng"></td>
                    
                  </tr>
                  
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>

  {{-- modal ends --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script>
    $(document).ready(function()
    {
        $(document).on('click', '.detailbtn',function()
            {
                let id = $(this).val();
                
                $('#detailModal').modal('show')


                $.ajax({
                    type:"GET",
                    url: "/detail/"+id,
                    success: function(response)
                    {
                        console.log(response)
                        $('.store_id').text(response.store.store_id)
                        $('.title').text(response.store.title)
                        $('.address').text(response.store.address)
                        $('.suburb').text(response.store.suburb)
                        $('.state').text(response.store.state)
                        $('.zip').text(response.store.zip)
                        $('.lat').text(response.store.lat)
                        $('.lng').text(response.store.lng)

                    }

                })
            }
        )


    })

// for search starts


function store_data(query = '')
 {
  $.ajax({
   url:"/search_store",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    console.log(data)
    
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  store_data(query);
 });


// for search ends

  </script>
</body>
</html>