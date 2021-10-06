<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.11.2/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/date-1.1.1/fc-3.3.3/fh-3.1.9/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.1/sp-1.4.0/sl-1.3.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.11.2/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/date-1.1.1/fc-3.3.3/fh-3.1.9/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.1/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        .dt-buttons{
            float:right;
        }
    </style>

    <title>Document</title>
</head>
<body>
        <br/> 
        <br/> 
        <div class="container"> 
           <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="form-group">
                <select name="filter_department" id="filter_department" class="form-control" required>
                    <option checked>Select department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->department }}">{{ $department->department }}</option>
                    @endforeach
                </select>
         </div> 
        </div>
        <br/> 
        <br/> 
        <h3 align="center">Emoloyee table</h3>
        <br />
       
          
        <div class="table-responsive"> 
            <div class="panel panel-default"> 
                <div class="panel-heading">
                    Sample Data
                    <button style="float:right; margin-top:-7px" class="btn btn-primary" id="add">Add Button</button>
                </div> 
                <div class="panel-body"> 
                    <table id="table_id" class="display cell-border">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Custom_Name</th>
                                <th>Action</th>
                                <th>Action2</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div> 
        <br /> 
        <br /> 
    </div>

    <script type="text/javascript" src="jquery.dataTables.js"></script>
    <script type="text/javascript" src="dataTables.scrollingPagination.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.2/api/sum().js"></script>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                processing: false,
                serverSide: true,
                ajax: `/load`,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'department', name: 'department'},
                    {data: 'custom_name', name: 'custom_name'},
                    {data: 'action', name: 'action'},
                    {data: 'action2', name: 'action2'}
                   
                ],
                dom: 'flrtip',
                buttons: [
                            {
                                extend: 'collection',
                                text: 'Export',
                                buttons: [ 'csv', 'excel', 'pdf', 'print', 'copy'],
                                background:true
                            }
                        ],

            });
            
       



function fill_datatable(filter_department = '')
{
    var dataTable = $('#table_id').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url: "/employee_dept",
            data:{filter_department:filter_department}
        },
        columns: [

            {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'department', name: 'department'},
                    {data: 'custom_name', name: 'custom_name'},
                    {data: 'action', name: 'action'},
                    {data: 'action2', name: 'action2'}
              
        ]
    });

} 

$('#filter_department').onclick(function(){
        var filter_department = $('#filter_department').val();
      

        if(filter_department != '' &&  filter_department != '')
        {
            $('#table_id').DataTable().destroy();
            fill_datatable(filter_department);
        }
        else
        {
            alert('Select Both filter option');
        }
    });
    
} );    
        
    </script>
    
</body>
</html>