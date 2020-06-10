<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{-- <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}" defer></script> --}}
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="{{ asset('bootstrap/js/jquery.min.js') }}" defer></script>
         <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="#">Accura Tech</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span cldass="navbar-toggler-icon"></span>
                </button>
               
            </nav>
            <h1 class="text-center">Member Register</h1>
          <div class="row">
            <div class="container">
                <form id="frm_member">
                    <div class="row">
                        <div class="col-lg-6">  
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text"
                                class="form-control" name="firstName" id="firstName" aria-describedby="helpId" placeholder="">                                 
                                    <small id="helpIdfName" class="text-danger"></small>                                
                            </div> 
                         </div>
                        <div class="col-lg-6">    <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text"
                            class="form-control" name="lastName" id="lastName" aria-describedby="helpId" placeholder="">
                            <small id="helpIdlName" class="text-danger"></small>
                        </div> 
                        </div>                  
                    </div>
                    <div class="row">
                        <div class="col-lg-6"> 
                            <div class="form-group">
                                <label for="">Date Of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob">
                                <small id="helpIddob" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">DS Division</label>
                                <select class="form-control" name="dividion_id" id="dividion_id">
                                                               
                                </select>
                                <small id="helpIddivision" class="text-danger"></small>

                            </div>
                        </div>
                    </div>
                        <div class="row">                        
                            <div class="col-md-6"> <div class="form-group">
                                <label for="">Summery</label>
                                <textarea class="form-control" name="summery" id="summery" rows="3"></textarea>
                                <small id="helpIdsummery" class="text-danger"></small>
                            </div>  
                            </div> 
                            <div class="col-lg-6">
                                <div class="row justify-content-end">
                                        <div class="m-1"><button id="btn_reset" type="button" class="btn btn-primary">Reset</button></div>                   
                                        <div class="m-1"> <button id="btn_submit" type="button" class="btn btn-primary">Save</button></div>                            
                                        <div class="m-1"><button id="btn_update" type="button" class="btn btn-primary">Update</button></div>    
                                </div>
                            </div>                     
                    </div>              
                </form>                
            </div>
          </div>
          <div class="row justify-content-end">  
              <div class="container">              
              <div class="col-lg-3 float-right">              
                <div class="form-group">                    
                   <div class="row"> <input type="text"
                    class="form-control" name="" id="str_search" aria-describedby="helpId" placeholder="Search">      
                             <button type="button" id="btn_search" class="btn btn-primary">Search</button>   </div>
                </div> 
                      
               </div>
               
            </div>
          </div>
          <div class="row">
             <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>DOB</th>
                            <th>Division</th>
                            <th>Summery</th>                         
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tbody id="table_tr">
                                           
                        </tbody>               
                    </tbody>
                </table>
             </div>
          </div>
    </body>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}" defer></script> 
    <script src="{{ asset('frm_member/js/member_script.js') }}" defer></script> 
    <script src="https://use.fontawesome.com/9e905f7623.js"></script>
    <script>
        
        var errors = null
        var memberId = null;

        $(document).ready(function() {
            initialData();
            fetchMemberes();
        });

        // Create Member
        $('#btn_submit').click(function() {
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var dob = $('#dob').val();
            var dividion_id = $('#dividion_id option:selected').attr('id'); 
            var summery = $('#summery').val();


            $.ajax({
                url:'/member/post',
                method:'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    firstName:firstName,
                    lastName:lastName,
                    dob:dob,
                    dividion_id:dividion_id,
                    summery:summery
                },
                success:function(res) {
                    if (res == 1) {                       
                        if (res == 1) {
                            alert('Success')
                            formReset();
                            fetchMemberes();
                        }
                    }
                },
                error:function(err) {
                    if (err.status == 422)
                         this.errors = err.responseJSON.errors;  
                
                        errorsSet(this.errors);
                  
                }
            });
        });

        // Update Member
        $('#btn_update').click(function() {
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var dob = $('#dob').val();
            var dividion_id =$('#dividion_id option:selected').attr('id'); 
            var summery = $('#summery').val();

            $.ajax({
                url:'/member/update',
                method:'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    id:memberId,
                    firstName:firstName,
                    lastName:lastName,
                    dob:dob,
                    dividion_id:dividion_id,
                    summery:summery
                },
                success:function(res) {
                    if (res == 1) {                       
                        if (res == 1) {
                            alert('Success')
                            formReset();
                        }
                    }
                },
                error:function(err) {
                    if (err.status == 422)
                         this.errors = err.responseJSON.errors;  
                
                        errorsSet(this.errors);
                  
                }
            });
        });

        
        function errorsSet(errors) {
            console.log(errors.firstName);
           
            if (errors.firstName) {
                $('#helpIdfName').show();  
                $('#helpIdfName').text(errors.firstName);        
            }
            else
            {
                $('#helpIdfName').hide();  
                $('#helpIdfName').text();      
            }
            if(errors.lastName)
            {
                $('#helpIdlName').show();  
                $('#helpIdlName').text(errors.lastName);   
            }
            else
            {
                $('#helpIdlName').hide();  
                $('#helpIdlName').text();   
            }
            if(errors.dob)
            {
                $('#helpIddob').show();  
                $('#helpIddob').text(errors.dob);   
            } 
            else
            {
                $('#helpIddob').hide();  
                $('#helpIddob').text();   
            }
            if(errors.dividion_id)
            {
                $('#helpIddivision').show();  
                $('#helpIddivision').text(errors.dividion_id);   
            }  
            else
            {
                $('#helpIddivision').hide();  
                $('#helpIddivision').text();   
            }
            if(errors.summery)
            {
                $('#helpIdsummery').show();  
                $('#helpIdsummery').text(errors.summery);   
            } else
            {
                $('#helpIdsummery').hide();  
                $('#helpIdsummery').text();   
            }
            // $('helpIdfName').css('visibility','visible');
            // $('helpIdfName').css('visibility','visible');
        }

        function formReset() {         
           $('#firstName').val('');
           $('#lastName').val('');
           $('#dob').val('');
           $('#dividion_id').val('');
           $('#summery').val('');
        } 

        function fetchMemberes() {
            $.ajax({
                url:'/member/get',
                method:'get',
                success:function(res){
                    var table="";
                    $.each(res,function(index,value){ 

                        table+="<tr>"+
                            "<td>"+value.id+"</td>"+
                            "<td>"+value.firstName+"</td>"+
                            "<td>"+value.lastName+"</td>"+                                     
                            "<td>"+value.dob+"</td>"+                                       
                            "<td>"+value.divisionName+"</td>"+                                       
                            "<td>"+value.summery+"</td>"+                                          
                            "<td><button class='btn btn-danger fa fa-remove' onclick='removeMember("+value.id+")'></button>&nbsp;<button class='btn btn-info fa fa-edit' onclick='setToUpdate(\""+value.id+"\",\""+value.firstName+"\",\""+value.lastName+"\",\""+value.dob+"\",\""+value.division_id+"\",\""+value.summery+"\")'></button></td>"+                                       
                            "</tr>";
                    })
                    $('#table_tr').html(table);
                }
            });
        }

        $('#btn_search').click(function() {
            var search = $('#str_search').val();
            $.ajax({
                url:'/member/search',
                method:'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    search:search
                },
                success:function(res){
                    var table="";
                    $.each(res,function(index,value){ 

                        table+="<tr>"+
                            "<td>"+value.id+"</td>"+
                            "<td>"+value.firstName+"</td>"+
                            "<td>"+value.lastName+"</td>"+                                     
                            "<td>"+value.dob+"</td>"+                                       
                            "<td>"+value.divisionName+"</td>"+                                       
                            "<td>"+value.summery+"</td>"+                                          
                            "<td><button class='btn btn-danger fa fa-remove' onclick='removeMember("+value.id+")'></button>&nbsp;<button class='btn btn-info fa fa-edit' onclick='setToUpdate(\""+value.id+"\",\""+value.firstName+"\",\""+value.lastName+"\",\""+value.dob+"\",\""+value.division_id+"\",\""+value.summery+"\")'></button></td>"+                                       
                            "</tr>";
                    })
                    $('#table_tr').html(table);
                }
            });
        });

        // function searchMemberes() {
            
        // }

        function setToUpdate(id,firstName,lastName,dob,division_id,summery) {         
            memberId = id;
            $('#firstName').val(firstName);
            $('#lastName').val(lastName);
            $('#dob').val(dob);
            $("#dividion_id > select > option[value=" + division_id + "]").prop("selected",true);
            // $('#dividion_id option[value=\""+division_id+"\"']).attr('selected','selected');
            // $('#dividion_id').val(division_id);
            $('#summery').val(summery);
        }

        function removeMember(id) {  
            console.log(id)           
            var r = confirm("Are you sure, you want to delete?");
            if (r == true) {
                $.ajax({
                url:'/member/delete/'+id,
                method:'delete', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(res){
                    if (res == 1) {                       
                        if (res == 1) {
                            alert('Success')
                            formReset();
                            fetchMemberes();
                        }
                    }
                }
            });

            } else {
                
            }
        }

        function initialData() {
            $.ajax({
                url:'/initial/data/get',
                method:'get',
                success:function(res){
                    var select="";
                    $.each(res,function(index,value){ 

                        select+="<option id='"+value.id+"'>"+value.divisionName+"</option>" ;
                    })
                    $('#dividion_id').append(select);
                }
            });
        }

        $('#btn_reset').click(function() {
            formReset();
        })
     
    </script>
</html>
