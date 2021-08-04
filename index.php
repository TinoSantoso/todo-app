<?php
    require_once("module/main.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="container">
        <h2 class="text-center"><a href="index.php" class="text-dark">Aplikasi Todo List</a></h2>
        <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == 'berhasil') {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                    notifikasi($_GET['pesan']);
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
                if ($_GET['pesan'] == 'gagal') {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                    notifikasi($_GET['pesan']);
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }       
        ?>
        <p>Manage your daily activity</p>
        <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') : ?>
            <form action="module/create.php" method="POST">
                <div class="row">
                    <div class="col-75">
                        <input type="text" id="aktifitas" name="aktifitas" placeholder="Mau melakukan apa hari ini?">
                    </div>
                    <div class="col-25">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>
        <?php endif; ?>
       
        <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit') : ?>
        <form action="module/edit.php" method="POST">
                <div class="row">
                    <input type="hidden" value="<?= $_GET['id'];?>" name= "id">
                    <div class="col-75">
                        <input type="text" value="<?= $_GET['aktifitas'];?>" id="aktifitas" name="aktifitas" placeholder="Mau melakukan apa hari ini?">
                    </div>
                    <div class="col-25">
                        <input type="submit" value="update">
                    </div>
                </div>
            </form>
        <?php endif; ?>

        <br>
        <a href="index.php?aksi=tambah" class="btn btn-outline-primary btn-sm">Add task</a>
        <br>
        <br>
        <ul>
            <?php
             $sql = "SELECT * FROM m_activities";
             $result = query($sql);
             $todos = get_result($result);
            ?>

            <?php if (empty($todos)) : ?>
                <li class="no-act" style="font-weight: bold;">At this time, there is no activity.</li>
            <?php endif; ?>
            
            <?php if (!empty($todos)) : ?>
                <?php foreach ($todos as $todo) : ?>
                    <li class="<?= $todo['status']== 1 ? 'selesai' : ''; ?>"><?= $todo['activity_name'];?>
                        <div class="action">
                            <?php if ($todo['status']== 0) : ?>
                                <a href="module/finish.php?id=<?=$todo['id'];?>" class="btn btn-outline-success btn-sm">Done</a>
                                <a href="index.php?aksi=edit&id=<?=$todo['id'];?>&aktifitas=<?=$todo['activity_name'];?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square" style="color: white;"></i></a>
                            <?php endif; ?>
                                <a href="module/clear.php?id=<?=$todo['id'];?>" class="btn btn-danger btn-sm"><i class="bi bi-trash" style="color: white;"></i></a>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>