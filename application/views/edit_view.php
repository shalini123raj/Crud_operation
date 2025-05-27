<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation In CI</title>
    <link href="<?php echo base_url(); ?>media/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="jumbotron">
        <h1 align="center" style="color:deeppink">CRUD CI Operation</h1>

    </div>
    <div class="container">
        <h1 align="center" style="color:blue">Edit Student</h1>
        <form class="p-2 d-flex justify-content-center" action="<?php echo base_url();?>Site/update/<?php echo $singlestudent->id; ?>" method="post">
            <div class="model-header mb-2 " style="width: 450px; border:1px solid black;padding:15px">


                <div class="model-body p-2">
                    
                    <div class="from-group my-3 d-flex flex-column">
                        <label  for="Name" class="text-black fw-bold">Name</label>
                        <input type="text" style="color:darkgreen;" name="name" placeholder="Enter your name" class="from-control" value="<?php echo $singlestudent->name;?>">
                    </div>
                    <div class="from-group d-flex flex-column">
                        <label for="Roll" class="text-black fw-bold">Roll</label>
                        <input type="text" style="color:darkgreen;" roll="roll" placeholder="Enter your roll" class="from-control" value="<?php echo $singlestudent->roll;?>">
                    </div>

                    <div class="model-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="model">submit</button>
                                <button type="button" class="btn btn-primary">save changes</button>
                                <input type="submit" name="insert" value="Add Student" class="btn btn-info"> -->
                    </div>

                    <div class="modal-footer d-flex justify-content-start my-3">
                        <input type="submit" name="edit" value="Update" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>

    


    <?php if ($this->session->flashdata('error')): ?>
        <div align="center" style="color:#FFF" class="bg-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>

    <?php endif; ?>

    <?php if ($this->session->flashdata('inserted')): ?>
        <div align="center" style="color:#FFF" class="bg-success">
            <?php echo $this->session->flashdata('inserted'); ?>
        </div>

    <?php endif; ?>


     <?php if ($this->session->flashdata('updated')): ?>
        <div align="center" style="color:#FFF" class="bg-success">
            <?php echo $this->session->flashdata('updated'); ?>
        </div>

    <?php endif; ?>




    <footer class="footer text-center text-sm-start d-print-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0 border-bottom-0 rounded-bottom-0">
                        <div class="card-body">
                            <p class="text-muted mb-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                Dastone
                                <span
                                    class="text-muted d-none d-sm-inline-block float-end">
                                    Design with
                                    <i class="iconoir-heart-solid text-danger align-middle"></i>
                                    by Mannatthemes</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->

    <script src="<?php echo base_url(); ?>media/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>media/assets/libs/simplebar/simplebar.min.js"></script>

    <script src="<?php echo base_url(); ?>media/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="../../../apexcharts.com/samples/assets/stock-prices.js"></script>
    <script src="<?php echo base_url(); ?>media/assets/js/pages/index.init.js"></script>
    <script src="<?php echo base_url(); ?>media/assets/js/app.js"></script>

    <!-- Button trigger modal -->

</body>

</html>