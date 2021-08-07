<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- bunddlejs -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- font awesome -->
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

<!-- database.net -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>

<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script type="text/javascript">

  $(document).ready(function(){


    showAllUser();

    function showAllUser(){

      $.ajax({

        url:"action.php",
        type:"POST",
        data :{action:"view"},
        success:function(response){

          // console.log(response);
          $("#showUser").html(response);
          $("table").DataTable({
          order : [0, 'desc']

          });


        }


      });

    }




    // insert ajax

    $("#insert-btn").click(function(e){

      if($("#form-data")[0].checkValidity()){
        e.preventDefault();
        $.ajax({

          url: "action.php",
          type: "POST",
          data: $("#form-data").serialize()+"&action=insert",
          success:function(response){

          Swal.fire({
            
            icon: 'success',
            title: 'User Added successfuly',
            showConfirmButton: false,
            timer: 1500
          })

            $("#AddUserModal").modal('hide');
            $("#form-data")[0].reset();
            showAllUser();

          }


        });
      }

    });


    $("body").on("click", ".editBtn", function(e){
      e.preventDefault();
      edit_id = $(this).attr('id');
      $.ajax({
        url: "action.php",
        type: "POST",
        data: {edit_id:edit_id},
        success:function(response){
          data = JSON.parse(response);
          $("#id").val(data.id);
          $("#fname").val(data.fname);
          $("#lname").val(data.lname);
          $("#email").val(data.email);
          $("#phone").val(data.phone);
        }
      });

    });








    // update ajax

        $("#update-btn").click(function(e){

      if($("#edit-form-data")[0].checkValidity()){
        e.preventDefault();
        $.ajax({

          url: "action.php",
          type: "POST",
          data: $("#edit-form-data").serialize()+"&action=update",
          success:function(response){

          Swal.fire({
            
            icon: 'success',
            title: 'User Updated successfuly',
            showConfirmButton: false,
            timer: 1500
          })

            $("#EditUserModal").modal('hide');
            $("#edit-form-data")[0].reset();
            showAllUser();

          }


        });
      }

    });



      $("body").on("click", ".delBtn", function(e){
          e.preventDefault();
          var tr = $(this).closest('tr');
          del_id = $(this).attr('id');
          

          Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
          if (result.value){
            $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {del_id:del_id},
                    success:function(response){

                      tr.css('background-color','#ff666');
                        Swal.fire({
                          
                          icon: 'success',
                          title: 'Deleted',
                          text: 'User Deleted successfuly',
                          showConfirmButton: false,
                          timer: 1500
                        })

                      showAllUser();
                    }

                  });
                        }
              });

      });


      //show user details

      $("body").on("click", ".infoBtn", function(e){
      e.preventDefault();
      info_id = $(this).attr('id');
      $.ajax({
        url: "action.php",
        type: "POST",
        data: {info_id:info_id},
        success:function(response){
          // console.log(response);
          res = JSON.parse(response);

            Swal.fire({
                          
                          
                title: '<strong>User info : ID('+res.id+')</strong>',
                type: 'info',
                html: '<b>First Name : </b>'+res.fname+'<br><b>Last Name : </b>'+res.lname+'<br><b>phone Number : </b>'+data.phone+
                          '<br><b>Email : </b>'+res.email,
                

                         
                        })

        }
      });

    });

  });

</script>