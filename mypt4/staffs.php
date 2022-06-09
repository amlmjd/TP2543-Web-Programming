<?php
include_once 'staffs_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>APerfume Corner : Staffs</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2446/2446470.png">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style type="text/css">
      .btn-aml {
      background-color: #1726eb !important;
      color: white !important;
      }
    </style>
<body style="background-image: url('images/Background 2.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
<?php include_once 'nav_bar.inc'; ?>

<div class="container-fluid dark" style="padding-bottom: 30px;">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="page-header">
                <h2>Add New Staff</h2>
            </div>

            <?php
            if (isset($_SESSION['error'])) {
                echo "<p class='text-danger text-center'>{$_SESSION['error']}</p>";
                unset($_SESSION['error']);
            }
            ?>

            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="form-horizontal">
                <?php
                if (isset($_GET['edit'])) {
                    echo '<input type="hidden" name="sid" value="' . $editrow['fld_staff_num'] . '" />';
                }
                ?>

                      <div class="form-group">
        <label for="staffid" class="col-sm-3 control-label">Staff ID</label>
        <div class="col-sm-9">
          <input name="sid" type="text" class="form-control" id="staffid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>"required>
        </div>
      </div>

                <div class="form-group">
                    <label for="staffname" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input name="name" type="text" class="form-control" id="staffname" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>"required>
                    </div>
                </div>                

      <div class="form-group">
        <label for="inputEmail" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Staff Email" value="<?php if (isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label for="staffphone" class="col-sm-3 control-label">Phone Number</label>
        <div class="col-sm-9">
          <input name="phone" type="text" class="form-control" id="staffphone" placeholder="Phone Number" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>"required>
        </div>
      </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input name="password" type="text" class="form-control" id="inputEmail"
                               placeholder="Staff Password"
                               value="<?php if (isset($_GET['edit'])) echo $editrow['fld_staff_password']; ?>" required>
                    </div>
                </div>



                <div class="form-group">
                      <label for="position" class="col-sm-3 control-label">Position</label>
                      <div class="col-sm-9">

                      <div class="radio">
                        <label>
                        <input name="position" type="radio" id="position" value="Normal Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_position']=="Normal Staff") echo "checked"; ?>> Normal Staff
                        </label>
                      </div>

                      <div class="radio">
                          <label>
                          <input name="position" type="radio" id="position" value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_position']=="Admin") echo "checked"; ?>> Admin
                          </label>
                      </div>
                      </div>
                    </div>


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <?php if (isset($_GET['edit'])) { ?>
                            <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
                            <button class="btn btn-aml" type="submit" name="update"><span
                                        class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update
                            </button>
                        <?php } else { ?>
                            <button class="btn btn-aml" type="submit" name="create"><span
                                        class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create
                            </button>
                        <?php } ?>
                        <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase"
                                    aria-hidden="true"></span> Clear
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?php // } ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Staff List</h2>
            </div>
            <table class="table table-striped table-bordered">
                <tr style="font-weight:bold; color:white; background-color: #3a235b;">
                    <th><center>Staff ID</center></th>
                    <th><center>Name</center></th>
                    <th><center>Email</center></th>
                    <th><center>Phone Number</center></th>
                    <th><center>Position</center></th>
                    <th width= "10%"></th>
                </tr>
                <?php
                // Read
                $per_page = 5;
                if (isset($_GET["page"]))
                    $page = $_GET["page"];
                else
                    $page = 1;
                $start_from = ($page - 1) * $per_page;
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("select * from tbl_staffs_a174807_pt4 LIMIT {$start_from}, {$per_page}");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                foreach ($result as $readrow) {
                    ?>
                    <tr>
                        <td><?php echo $readrow['fld_staff_num']; ?></td>
                        <td><?php echo $readrow['fld_staff_name']; ?></td>
                        <td><?php echo $readrow['fld_staff_email']; ?></td>
                        <td><?php echo $readrow['fld_staff_phone']; ?></td>
                        
                        <td><?php echo ($readrow['fld_staff_position'] == 'Admin' ? 'Admin' : 'Normal Staff'); ?></td>
                        
                        <td class="text-center">
                            <?php
                            if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_position'] == 'Admin') {
                                ?>
                                <a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>"
                                   class="btn btn-success btn-xs" role="button"> Edit </a>
                                <a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>"
                                   onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs"
                                   role="button">Delete</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <nav>
                <ul class="pagination">
                    <?php
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a174807_pt2");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        $total_records = count($result);
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $total_pages = ceil($total_records / $per_page);
                    ?>
                    <?php if ($page == 1) { ?>
                        <li class="disabled"><span aria-hidden="true">&laquo;</span></li>
                    <?php } else { ?>
                        <li><a href="staffs.php?page=<?php echo $page - 1 ?>" aria-label="Previous"><span
                                        aria-hidden="true">&laquo;</span></a></li>
                        <?php
                    }
                    for ($i = 1; $i <= $total_pages; $i++)
                        if ($i == $page)
                            echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
                        else
                            echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
                    ?>
                    <?php if ($page == $total_pages) { ?>
                        <li class="disabled"><span aria-hidden="true">&raquo;</span></li>
                    <?php } else { ?>
                        <li><a href="staffs.php?page=<?php echo $page + 1 ?>" aria-label="Previous"><span
                                        aria-hidden="true">&raquo;</span></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
