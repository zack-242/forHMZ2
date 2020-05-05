<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '-1');
use Illuminate\Http\Request;
use DB;
use App\Persone;
class TstContrpller extends Controller
{
    public function index(){
        $person = Persone::take(500)->get();
        return view('/tst', compact('person'));
    }



    /* public function datatable(){
        $person = Persone::all();
        return view('tst', compact('person'));
    } */
    public function ajax(){
        /* $person = Persone::all();
        return view('/tst', compact('person')); */
    }

    /* function action(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {ini_set('memory_limit', -1);
       $data = DB::table('persons')
         ->where('NOM', 'like', '%'.$query.'%')
         ->orWhere('PRENOM', 'like', '%'.$query.'%')
         ->orWhere('ADRESSE_1', 'like', '%'.$query.'%')
         ->orWhere('DATE_NAISSANSE', 'like', '%'.$query.'%')
         ->orderBy('FIC', 'desc') 
         ->get();
         
      }
      else
      {
       $data = DB::table('persons')
                ->select("*")
                ->get();
         
         }


      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->NOM.'</td>
         <td>'.$row->PRENOM.'</td>
         <td>'.$row->ADRESSE_1.'</td>
         <td>'.$row->DATE_NAISASSANCE.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
    }
} */
}
