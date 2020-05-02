<?php

namespace App\Http\Controllers;


use App\Exports\PersoneExport;
use App\Persone;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class PersoneController extends Controller
{
    public function export(Request $r)
    {
        $cols = [
            "NOM" => $r->NOM ? false : true,
            'PRENOM' => $r->PRENOM ? false : true ,
            'ADRESSE_1' => $r->ADRESSE_1 ? false : true,
            'DATE_NAISSANCE' => $r->DATE_NAISSANCE ? false : true
        ];
        
        $filter = array_filter($cols , function($v){
                return $v ==true;
        });

        if (count($filter) == 0){
            $filter = array_keys($cols);
        }else{
            $filter = array_keys($filter);
        }

        // dd(DB::table('persones')->select('PRENOM,NOM')->get());
         $filename = $r->filename ?? date("Y-m-d");
        
        /* $part_number = 1;
        $part_number++;
        $n = str_pad($part_number, 4, '0', STR_PAD_LEFT);


        $counter = $r->session()->get('counter',00001);
        $r->session()->put('counter', $counter+1);
         */

        $id=0;
        $n=sprintf('%05d',$id);


        $persones = DB::table('persons')->select($filter)->where('ADRESSE_1', '!=', 'NULL')->where('DATE_NAISSANCE', '!=', ' ')->Paginate(50);
        return Excel::download(new PersoneExport($persones), 'LOT'. $n.'_PROVENANCE_'. $filename . '.csv');
        //return Excel::download(new PersoneExport($persones),'LOT'. $n2 .'_PROVENANCE_'.$filename.'.csv');
    }    /* $r->page */
}
