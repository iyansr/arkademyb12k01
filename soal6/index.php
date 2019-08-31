<?php
  require_once('lib/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- bootstap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- end bootstap css -->

  <title>Document</title>
</head>

<body>

  <!-- navigation bar -->
  <nav class="navbar navbar-light bg-light">
    <div class="container">

      <a class="navbar-brand" href="#">
        <img src="https://www.arkademy.com/img/logo%20arkademy-01.9c1222ba.png" height="40" alt="">
      </a>
      <a href="#" class="mr-auto nav-link"><strong style="color: black;">ARKADEMY BOOTCAMP</strong></a>
    </div>
  </nav>

  <br><br><br>

  <div class="container">

    <!-- buttn ad   d -->
    <div class="row">
      <div class="col-auto mr-auto"></div>
      <button type="button" data-toggle="modal" data-target="#addModal"
        class="btn btn-warning col-auto mr-3">Add</button>
    </div>
    <br>

    <!-- add Modal start -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModal">Add Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form>
            <div class="modal-body">
              <div class="form-group">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <select class="custom-select" id="workSelect">
                <option selected>Choose...</option>
                  <option value="1">Frontend Dev</option>
                  <option value="2">Backend Dev</option>
                </select>
              </div>
              <div class="form-group">
                <select class="custom-select" id="salarySelect">
                <option selected>Choose...</option>
                  <option value="1">10.000.000</option>
                  <option value="2">12.000.000</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning addData">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- add modal end -->



    <!-- table start -->
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Work</th>
          <th scope="col">Salary</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
    <?php 
      $statment = $db->prepare("SELECT  a.id, a.name, a.id_salary, a.id_work, b.name as work, c.salary 
                                FROM    nama a 
                                        INNER JOIN work b 
                                                ON a.id_work = b.id 
                                        INNER JOIN kategori c 
                                                ON a.id_salary = c.id 
                                WHERE a.id_work = b.id;");
      $statment->execute();

      $data = $statment->fetchAll(PDO::FETCH_ASSOC);

      foreach($data as $n){
        $id = $n['id'];
        $salary_id = $n['id_salary'];
        $work_id = $n['id_work'];
    
    ?>
        <tr>
          <td data-id="nama<?= $id ?>" ><?= $n['name'] ?></td>
          <td data-id="nama<?= $salary_id ?>"><?= $n['work'] ?></td>
          <td data-id="nama<?= $work_id ?>"><?= $n['salary'] ?></td>
          <td>
            <a data-pid="<?= $id ?>" href="#" data-toggle="modal" data-target="#deleteModal">
              <i class="material-icons text-danger btnDel">
                delete_outline
              </i>
            </a>
            <a data-pid="<?= $id ?>" href="#">
              <i class="material-icons text-success" data-toggle="modal" id="editBtn" data-target="#editModal">
                edit
              </i>
            </a>
          </td>
        </tr>


      <?php } ?>
        
      </tbody>
    </table>
    <!-- table end -->


                <!-- edit Modal start -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModal">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form>
            <div class="modal-body">
              <div class="form-group">
                <input type="text" name="nama" id="editNama" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <select class="custom-select" id="editWorkSelect">
                  <option selected>Work</option>
                  <option value="1">Frontend Dev</option>
                  <option value="2">Backend Dev</option>
                </select>
              </div>
              <div class="form-group">
                <select class="custom-select" id="editSalarySelect">
                  <option selected>Salary</option>
                  <option value="1">10.000.000</option>
                  <option value="2">12.000.000</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning btnEdit">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- edit modal end -->

    <!-- Modal start -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" alt=""
              height="150">
            <p>Data Berhasil Dihapus</p>
          </div>

        </div>
      </div>
      <!-- modla end -->
    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>

    <script>
    $(function(){

      //Create
      $(document).on('click', '.addData', ()=>{
        let name = $('#nama').val();
        let id_salary = $('#salarySelect').val();
        let id_work = $('#workSelect').val();

        if(name != ''){
          let link = 'lib/add_data.php';
            $.ajax({
            url: link,
            type: 'post',
            cache: false,
            dataType: "json",
            data: {
              nama: name,
              id_salary : id_salary,
              id_work : id_work
            },
            success: (res)=>{
							location.reload();
            },
            error: (err)=>{
              console.log(err)
            }
          });
        }
      });


      //Update
      $(document).on('click', '.btnEdit', ()=>{
        let name = $('#editNama').val();
        let id_salary = $('#editWorkSelect').val();
        let id_work = $('#editSalarySelect').val();

        if(name != ''){
          let link = 'lib/update_data.php';
            $.ajax({
            url: link,
            type: 'post',
            cache: false,
            dataType: "json",
            data: {
              nama: name,
              id_salary : id_salary,
              id_work : id_work
            },
            success: (res)=>{
              console.log(res)
							location.reload();
            },
            error: (err)=>{
              console.log(err)
            }
          });
        }
      });

      //Update
      $(document).on('click', '.btnDel', ()=>{
        let id = $(this).data('pid');

        $.post('lib/delete_data.php', {id: id});
      });

    });
    
    </script>




</body>

</html>