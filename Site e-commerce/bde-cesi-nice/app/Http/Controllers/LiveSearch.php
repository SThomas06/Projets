<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
  function index()
  {
   return view('live_search');
 }

 function action(Request $request)
 {
   if($request->ajax())
   {
    $output = '';
    $query = $request->get('query');
    if($query != '')
    {
     $data = DB::table('produits')
     ->where('nom_produit', 'like', '%'.$query.'%')
     ->orWhere('description_produit', 'like', '%'.$query.'%')
     ->orWhere('quantite_produit', 'like', '%'.$query.'%')
     ->orWhere('prix_produit', 'like', '%'.$query.'%')
     ->orderBy('compteur_produit', 'desc')
     ->get();
     
   }
   else
   {
     $data = DB::table('produits')
     ->orderBy('compteur_produit', 'desc')
     ->get();
   }
   $total_row = $data->count();
   if($total_row > 0)
   {
     foreach($data as $row)
     {
      $output .= '
      <tr>
      <td>'.$row->nom_produit.'</td>
      <td>'.$row->description_produit.'</td>
      <td>'.$row->quantite_produit.'</td>
      <td>'.$row->prix_produit.'</td>
      </tr>
      ';
    }
  }
  else
  {
   $output = '
   <tr>
   <td align="center" colspan="5">Pas de résultat</td>
   </tr>
   ';
 }
 $data = array(
   'table_data'  => $output,
   'total_data'  => $total_row
 );

 echo json_encode($data);
}
}
}