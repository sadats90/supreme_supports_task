<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
 

<div class="container-fluid">
    
<div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Stores</h3>
      </div>
    
      <form action='{{url("update_store/{$stores->id}")}}' method="POST">
        <input type="hidden" name="_method" value="PATCH">
        

        
          @csrf
            <div class="card-body">
                    <div class="form-group">
                        <label for="">Store ID</label>
                        <input type="text" class="form-control" name="store_id" value="{{$stores->store_id}}">
                    </div>

                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" class="form-control" name="title" value="{{$stores->title}}">
                  </div>

                    <div class="form-group">
                      <label for="">Address</label>
                      <input type="text" class="form-control" name="address" value="{{$stores->address}}">
                  </div>
                  <div class="form-group">
                    <label for="">Suburb</label>
                    <input type="text" class="form-control" name="suburb" value="{{$stores->suburb}}">
                </div>
                <div class="form-group">
                  <label for="">State</label>
                  <input type="text" class="form-control" name="state" value="{{$stores->state}}">
              </div>
              <div class="form-group">
                <label for="">Zip</label>
                <input type="text" class="form-control" name="zip" value="{{$stores->zip}}">
            </div>
            <div class="form-group">
              <label for="">latitude</label>
              <input type="text" class="form-control" name="lat" value="{{$stores->lat}}">
          </div>
          <div class="form-group">
            <label for="">longitude</label>
            <input type="text" class="form-control"  name="lng" value="{{$stores->lng}}">
        </div>
       
            </div>
            <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        </div>
    
   
</div>


    

     

 



</body>
</html>