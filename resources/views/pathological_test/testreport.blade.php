<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Admin</title>
</head>

<body>
  <div class="container-fluid page-body-wrapper">
    <div class="container" align="center" style="padding-top:100px;">
      <h6 style="margin-top: 50px; text-align:center;">Razon Mollah Specialized Heart Center</h6>
      <p style="text-align:center; ">Faridpur Sadar, Faridpur</p>
      <p style="text-align:center; mt-0">Help Line +8801700778300</p>
      <!-- <a href="{{route('pathological.index')}}"><i class="fa fa-arrow-left"></i>Test Details</a> -->
      <div class="row">
        <div class="col-4 col-md-4"></div>
        <div class="col-4 col-md-4">
          <h6>Patient Name: <span style="color: green;">{{$pathologicalpatient->moreinfo->appoint_name}}</span> </h6>
          <h6>Patient Phone: <span style="color: green;">{{$pathologicalpatient->moreinfo->phone}}</span> </h6>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Test</th>
                <th scope="col">Discount</th>
                <th scope="col">Price</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                @foreach($pathologicaltests as $key=>$pathologicaltest)
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$pathologicaltest->testinfo->test}}</td>
                <td>{{$pathologicaltest->discount}}</td>
                <td>{{$pathologicaltest->testinfo->price}}</td>
              </tr>
              @endforeach
              </tr>

            </tbody>
            <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th>Discount: {{ $pathologicaltests->sum('discount') ?? ''}}</th>
                <th class="text-right">Subtotal: {{ $test_amount ?? ''}}</th>
                <th class="text-right">Total: {{ $test_amount - $pathologicaltests->sum('discount') ?? ''}}</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="col-4 col-md-4"></div>
      </div>
      <p style="text-align:center;">Thank You</p>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
</body>

</html>