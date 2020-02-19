@extends('layouts.public')

@section('content')
<style>
            
            
            .tab{float: left;}
        
            .tab-2 input{display: block;margin-bottom: 10px}
       
            tr:hover{background-color:#EEE;cursor: pointer}
            thead{color: black;font-size: 16px;background-color: whitesmoke;}
        </style>

        
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">





        
        <div class="col-md-12">
                <ol style=" font-size: 16px;" class="breadcrumb">
                        <li>
                            <a  href="{{ url('/') }}">
                                    <i class="fas fa-home"></i>
                                    الصفحة الرئيسية
                            </a>
                        </li> 
                        <li><a href="{{ url('visites/hemicycles/choix')  }}">صفة الحضور</a></li>
                        <li class="active">الإستمارة</li> 
                </ol>
    </div>
            <div class="col-md-12 form-group">
                <div class="col-md-4">
                   رقم الهوية :<input type="text" name="cni" id="cni" class="form-control">
                </div>
                <div class="col-md-4">
                    الإسم العائلى :<input type="text" name="lname" id="lname" class="form-control">
                </div>
                <div class="col-md-4">
                   الإسم الشخصي :<input type="text" name="fname" id="fname" class="form-control">
                </div>
            </div>
            <center>
                <div class="col-md-12 form-group">   
                    <button class="btn btn-success" title="إضافة شخص" onclick="addHtmlTableRow();">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-warning" title="تعديل شخص" onclick="editHtmlTbleSelectedRow();">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger" title="حذف شخص"  onclick="removeSelectedRow();">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div> 
            </center>
            <div class="col-md-12">
                <table class="table" id="table" border="1">
                <thead>
                    <tr>
                        <th>الإسم الشخصي</th>
                        <th>الإسم العائلى</th>
                        <th>رقم الهوية</th>
                    </tr>
                </thead>
                    <tr>
                        <td>A1</td>
                        <td>B1</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>A3</td>
                        <td>B3</td>
                        <td>30</td>
                    </tr>
                    <tr>
                        <td>A2</td>
                        <td>B2</td>
                        <td>20</td>
                    </tr>
                </table>
            </div>
               
    </div>
    <div class="col-md-3"></div>
</div>



<script>
            
            var rIndex,
                table = document.getElementById("table");
            
            // check the empty input
            function checkEmptyInput()
            {
                var isEmpty = false,
                    fname = document.getElementById("fname").value,
                    lname = document.getElementById("lname").value,
                    age = document.getElementById("cni").value;
            
                if(fname === ""){
                    alert("First Name Connot Be Empty");
                    isEmpty = true;
                }
                else if(lname === ""){
                    alert("Last Name Connot Be Empty");
                    isEmpty = true;
                }
                else if(cni === ""){
                    alert("cni Connot Be Empty");
                    isEmpty = true;
                }
                return isEmpty;
            }
            
            // add Row
            function addHtmlTableRow()
            {
                // get the table by id
                // create a new row and cells
                // get value from input text
                // set the values into row cell's
                if(!checkEmptyInput()){
                var newRow = table.insertRow(table.length),
                    cell1 = newRow.insertCell(0),
                    cell2 = newRow.insertCell(1),
                    cell3 = newRow.insertCell(2),
                    fname = document.getElementById("fname").value,
                    lname = document.getElementById("lname").value,
                    cni = document.getElementById("cni").value;
            
                cell1.innerHTML = fname;
                cell2.innerHTML = lname;
                cell3.innerHTML = cni;
                // call the function to set the event to the new row
                selectedRowToInput();
            }
            }
            
            // display selected row data into input text
            function selectedRowToInput()
            {
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                      // get the seected row index
                      rIndex = this.rowIndex;
                      document.getElementById("fname").value = this.cells[0].innerHTML;
                      document.getElementById("lname").value = this.cells[1].innerHTML;
                      document.getElementById("cni").value = this.cells[2].innerHTML;
                    };
                }
            }
            selectedRowToInput();
            
            function editHtmlTbleSelectedRow()
            {
                var fname = document.getElementById("fname").value,
                    lname = document.getElementById("lname").value,
                    cni = document.getElementById("cni").value;
               if(!checkEmptyInput()){
                table.rows[rIndex].cells[0].innerHTML = fname;
                table.rows[rIndex].cells[1].innerHTML = lname;
                table.rows[rIndex].cells[2].innerHTML = cni;
              }
            }
            
            function removeSelectedRow()
            {
                table.deleteRow(rIndex);
                // clear input text
                document.getElementById("fname").value = "";
                document.getElementById("lname").value = "";
                document.getElementById("cni").value = "";
            }
        </script>



@endsection
