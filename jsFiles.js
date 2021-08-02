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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



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

            swal({
                  title: "Good job",
                  text: "user Added successfuly",
                  icon: "success"
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

            swal({
                  title: "Good job",
                  text: "user Update successfuly",
                  icon: "success"
                })

            $("#EditUserModal").modal('hide');
            $("#edit-form-data")[0].reset();
            showAllUser();

          }


        });
      }

    });

  });

</script>