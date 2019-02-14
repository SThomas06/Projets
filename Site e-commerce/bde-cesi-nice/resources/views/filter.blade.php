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
    <div class="row">
      <br/>
      <div id="table_data">
        @include('fetch_data')
      </div>
      <div class="col-md-3">                    
        <div class="list-group">
         <h3>Price</h3>
         <input type="hidden" id="hidden_minimum_price" value="0" />
         <input type="hidden" id="hidden_maximum_price" value="65000" />
         <p id="price_show">1000 - 65000</p>
         <div id="price_range"></div>
       </div>    
       <div class="list-group">
         <h3>Catégorie</h3>
         <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
           
          <div class="list-group-item checkbox">
            <label><input type="checkbox" class="common_selector categories" value=""  ></label>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9">
     <br />
     <div class="row filter_data">

     </div>
   </div>
 </div>

</div>
<style>
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<script>
  $(document).ready(function(){

    filter_data();

    function filter_data()
    {
      $('.filter_data').html('<div id="loading" style="" ></div>');
      var action = 'fetch_data';
      var minimum_price = $('#hidden_minimum_price').val();
      var maximum_price = $('#hidden_maximum_price').val();
      var categories = get_filter('categories');
      $.ajax({
        url:"{{ route('live_search.action') }}",
        method:"POST",
        data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, categories:categories},
        success:function(data){
          $('.filter_data').html(data);
        }
      });
    }

    function get_filter(class_name)
    {
      var filter = [];
      $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
      });
      return filter;
    }

    $('.common_selector').click(function(){
      filter_data();
    });

    $('#price_range').slider({
      range:true,
      min:1000,
      max:65000,
      values:[1000, 65000],
      step:500,
      stop:function(event, ui)
      {
        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
        $('#hidden_minimum_price').val(ui.values[0]);
        $('#hidden_maximum_price').val(ui.values[1]);
        filter_data();
      }
    });

  });
</script>

</body>

</html>