<!DOCTYPE html>
<html>
<head>
  <title>Tous les produits</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href = "css/jquery-ui.css" rel = "stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <style type="text/css">
  .box{
    width:600px;
    margin:0 auto;
  }
</style>
</head>
<body>
  <br />
  <div class="container">
   <div id="table_data">
    @include('pagination_data')
  </div>
</div>
<script>
  $(document).ready(function(){

   $(document).on('click', '.pagination a', function(event){
    event.preventDefault(); 
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page);
  });

   function fetch_data(page)
   {
    $.ajax({
     url:"/pagination/fetch_data?page="+page,
     success:function(data)
     {
      $('#table_data').html(data);
    }
  });
  }
  
});
</script>
</body>
</html>

