<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Export Data</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <style>
    /* .multiselect-container>li>a>label {
      padding: 4px 20px 3px 20px;
    } */


    .multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}

a{
    cursor: pointer;
    color: white;
    text-decoration: none;
    padding: 15px;
}

a:link, a:visited, a:focus {
  background: #337ab7;
  color: white;
  border-radius: 15px;
}

a:hover {     
  background: #2c6ca2;
}

a:active {
  background: #2c7cc1;
  color: white;
}
  </style>
</head>
<body>
  <div class="container">
    <br>
    <button id="btn" class="btn btn-primary">Export</button>
    <br>
      <br>

{{-- --------------------------------------------------------------------------------------------- --}}
        <div style="padding:20px">
        </div>
      </form>
{{-- --------------------------------------------------------------------------------------------- --}}
<div>
  Click to hide column: <a class="toggle-vis" data-column="0" href="">FIC</a>
                      - <a class="toggle-vis" data-column="1" href="">CIVILITE</a>
                      - <a class="toggle-vis" data-column="2" href="">NOM</a>
                      - <a class="toggle-vis" data-column="3" href="">PRENOM</a>
                      - <a class="toggle-vis" data-column="4" href="">ADRESSE</a> 
                      - <a class="toggle-vis" data-column="5" href="">CODE POSTAL</a>
                      - <a class="toggle-vis" data-column="5" href="">VILLE</a> 
                      {{-- - <a class="toggle-vis" data-column="7" href="">NO TELE</a> --}} 
                      - <a class="toggle-vis" data-column="6" href="">INDIC</a> 
                      - <a class="toggle-vis" data-column="7" href="">EMAIL</a> 
                      - <a class="toggle-vis" data-column="8" href="">DATE_NAISSANCE</a>
</div>
<br>

   
    <table id="example" class="table" style="width: 100%"><br>
      <thead>
        <tr>
          <th id="fic_col_head" class="fic_col_head">FIC</th>
          <th id="civ_col_head" class="civ_col_head">CIVILTE</th>
          <th id="name_col_head" class="name_col_head">NOM</th>
          <th id="prenom_col_head" class="prenom_col_head">PRENOM</th>
          <th id="adresse_col_head" class="adresse_col_head">ADRESSE</th>
          <th id="codep_col_head" class="codep_col_head">CODE POSTAL</th> 
          <th id="ville_col_head" class="ville_col_head">VILLE</th>
          {{-- <th id="tel_col_head" class="tel_col_head">NO TELE</th> --}}
          <th id="indic_col_head" class="indic_col_head">INDIC</th>
          <th id="email_col_head" class="email_col_head">EMAIL</th><br>
          <th id="date_col_head" class="date_col_head">DATE_NAISSANCE</th>          
        </tr>
        <tfoot>
          <tr>
              <th>Fic</th>
              <th>Civlite</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Adresse</th>
              <th>code postal</th>
              <th>ville</th>
              <th>indic</th>
              <th>email</th>
              <th>Date Naissance</th>            
          </tr>
      </tfoot>
      </thead>
      <tbody>
      </tbody>
      
  </div>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    {{-- Bootstrap multiselect lib --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://davidstutz.de/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
    <link href="https://davidstutz.de/bootstrap-multiselect/docs/css/bootstrap-3.3.2.min.css" rel="stylesheet"/>
    <link href="https://davidstutz.de/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" rel="stylesheet"/>
    <script src="https://davidstutz.de/bootstrap-multiselect/docs/js/bootstrap-3.3.2.min.js"></script>
  {{-- datatable lib --}}
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  {{-- muliple select lib --}}
{{--   <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
  <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script> --}}


  <script>

    $(document).ready(function () {
      var btn = document.getElementById('btn').addEventListener('click', function () {
        var data = table
          .rows()
          .data();
        if (data.length > 0) {
          let counter = localStorage.getItem('counter');
          if(counter)
          {
              localStorage.setItem('counter',++counter)
          }else{
            localStorage.setItem('counter',1)
            counter = 1;
          }
        var max =7;
        var len =Math.floor(Math.log10(counter))+1;
        let res ="";
        
        for(let index = 1 ; index<(max-len) ; index++){
          res+=0;
        }
        res+=counter
        /* ***************************************************************************** */
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
        if(dd<10) 
        {
            dd='0'+dd;
        }
        if(mm<10) 
        {
            mm='0'+mm;
        } 
        today = mm+'/'+dd+'/'+yyyy;

        var items = table.columns().visible();
        var newitems = items.filter((v)=>{
                return v!=false;
              })

          exportToCsv('LOT'+res+'_PROVENANCE_'+today+'.csv',data ,items , newitems)
        }
        else {
        }
      })
        function exportToCsv(filename, rows,items , newitems) {
          var processRow = function (row) {
          var finalVal = '';
          var index = 0;
          for( j in row){
            if(items[index]){
                var innerValue = row[j] === null ? '' : row[j].toString();
              if (row[j] instanceof Date) {
                  innerValue = row[j].toLocaleString();
              };
              var result = innerValue.replace(/,/g, " ").replace(/;/g," ").replace(/'/g,"'");
       
              finalVal += result;       

              if(newitems.length-1 != index)
                // if (index > 0)
                  finalVal += ',';
              }
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
        "lengthMenu": [10, 50, 500,1000],
        "columns": [
          { "data": "FIC" },
          { "data": "CIVILITE" },
          { "data": "NOM" /* ,"visible": false  */},
          { "data": "PRENOM" },
          { "data": "ADRESSE_1" },
          { "data": "CODE_POSTAL" },
          { "data": "VILLE" },
          /* { "data": "NO_TELE" }, */
          { "data": "INDIC" },
          { "data": "EMAIL" },
          { "data": "DATE_NAISSANCE" }
        ] ,
        initComplete: function () {
            this.api().columns(5).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        } 
       });
      //  var items = [1];

       // a tag hover
       $('a.toggle-vis').on( 'click', function (e) {
          e.preventDefault();
          // Get the column API object
          var column = table.column( $(this).attr('data-column') );
          // Toggle the visibility
          column.visible( ! column.visible() );
          // if(items.indexOf($(this).attr('data-column'))){
          //  console.log($(this).attr('data-column'))
          // }
      } );

      //
      $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
      } );
  
      // DataTable
      var table = $('#example').DataTable();
      // Apply the search
      table.columns().every( function () {
          var that = this;
          $( 'input', this.footer() ).on( 'keyup change clear', function () {
              if ( that.search() !== this.value ) {
                  that
                      .search( this.value )
                      .draw();
              }
          } );
      } );    
  });
  </script>
</body>
</html>