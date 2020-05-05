<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
  <a href="" class="ap"></a>
  <div class="container">
    <button id="btn" class="btn btn-primary">load</button>
    <table id="example" class="table" style="width: 100%">
      <thead>
        <tr>
          <th id="name_col_head" class="name_col_head">NOM</th>
          <th id="prenom_col_head" class="prenom_col_head">PRENOM</th>
          <th id="adresse_col_head" class="adresse_col_head">ADRESSE</th>
          <th id="date_col_head" class="date_col_head">DATE_NAISSANCE</th>
        </tr>
      </thead>
      <tbody>
        {{-- @foreach($persons as $p)
          <tr>
          <td class="name_col">{{ $p->NOM }}</td>
        <td class="prenom_col">{{ $p->PRENOM }}</td>
        <td class="adresse_col">{{ $p->ADRESSE_1 }}</td>
        <td class="date_col">{{ $p->DATE_NAISSANCE }}</td>
        </tr>
        @endforeach --}}
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      var btn = document.getElementById('btn').addEventListener('click', function () {
        var data = table
          .rows()
          .data();
          document.getElementsByClassName('ap')[0].innerHTML = data[8].ADRESSE_1;
        if (data.length > 0) {
          exportToCsv('LOT_PROVENANCE_.csv',data)
        }
        else {
        }
      })
      function exportToCsv(filename, rows) {
    var processRow = function (row) {
        var finalVal = '';
        var index = 0;
        for( j in row){
               var innerValue = row[j] === null ? '' : row[j].toString();
            if (row[j] instanceof Date) {
                innerValue = row[j].toLocaleString();
            };
            var result = innerValue.replace(/,/g, " ").replace(/;/g," ").replace(/'/g,"'");
            // if (result.search(/("|,|\n)/g) >= 0)
            //     result = '"' + result + '"';
            if (index > 0)
                finalVal += ',';
            finalVal += result;
            index++;
        }
        return finalVal + '\n';
    };
    var csvFile = '';
    for (var i = 0; i < rows.length; i++) {
        csvFile += processRow(rows[i]);
    }
    var blob = new Blob([csvFile], { type: 'text/csv;charset=utf-8;' });
    if (navigator.msSaveBlob) { // IE 10+
        navigator.msSaveBlob(blob, filename);
    } else {
        var link = document.createElement("a");
        if (link.download !== undefined) { // feature detection
            // Browsers that support HTML5 download attribute
            var url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", filename);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }
}
      var table = $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('api.persons.index') }}",
        "columns": [
          { "data": "NOM" },
          { "data": "PRENOM" },
          { "data": "ADRESSE_1" },
          { "data": "DATE_NAISSANCE" }
        ]
      });
    });
  </script>
</body>
</html>