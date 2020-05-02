<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">{{-- dataTables.bootstrap.min.css --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <title>Document</title>
    <style>
        .row{
            margin-top: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Informations</div>

                <div class="panel-body">
                    <table id="datatable">
                        <thead>
                            <tr>
                                <th >NOM</th>
                                <th >PRENOM</th>
                                <th >ADRESSE</th>
                                <th >DATE_NAISSANCE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($person as $p)
                                <tr>
                                    <td class="name_col">{{ $p->NOM }}</td>
                                    <td class="prenom_col">{{ $p->PRENOM }}</td>
                                    <td class="adresse_col">{{ $p->ADRESSE_1 }}</td>
                                    <td class="date_col">{{ $p->DATE_NAISSANCE }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <input type="text" class="form-control filiter-input" placeholder="search for nom ..." data-column="0">
                                </td>
                                <td>
                                    <input type="text" class="form-control filiter-input" placeholder="search for prenom ..." data-column="1">
                                </td>
                                <td>
                                    <input type="text" class="form-control filiter-input" placeholder="search for date ..." data-column="2">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
       var table = $('#datatable').dataTable();
       
    });

   /*  $('.filter-input').keyup(function(){
        table.column($(this).data('column')).search($(this).val()).draw();
    }); */
</script>