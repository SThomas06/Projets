<div class="table-responsive">
 <table class="table table-striped table-bordered">
  <tr>
   <th width="30%">Nom</th>
   <th width="50%">Description</th>
   <th width="10%">Quantité</th>
   <th width="10%">Prix</th>
 </tr>
 @foreach($data as $row)
 <tr>
   <td>{{ $row->nom_produit }}</td>
   <td>{{ $row->description_produit }}</td>
   <td>{{ $row->quantite_produit }}</td>
   <td>{{ $row->prix_produit }}</td>
 </tr>
 @endforeach
</table>

{!! $data->links() !!}

</div>