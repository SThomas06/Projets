<!DOCTYPE html>
<html>
<head>
  <title>Recherche de produit</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <br />
  <div class="container box">
   <h3 align="center">Recherche de produit</h3><br/>
   <div class="panel panel-default">
    <div class="panel-heading">Vous recherchez :</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Recherche" />
    </div>
    <div class="table-responsive">
      <h3 align="center">Nombre de résultats : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Nom du produit</th>
         <th>Description</th>
         <th>Quantité</th>
         <th>Prix</th>
       </tr>
     </thead>
     <tbody>

     </tbody>
   </table>
 </div>
</div>    
</div>
</div>
</body>
</html>

<script>
  $(document).ready(function(){

   fetch_customer_data();

   function fetch_customer_data(query = '')
   {
    $.ajax({
     url:"{{ route('live_search.action') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('tbody').html(data.table_data);
      $('#total_records').text(data.total_data);
    }
  })
  }

  $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_customer_data(query);
  });
});
</script>