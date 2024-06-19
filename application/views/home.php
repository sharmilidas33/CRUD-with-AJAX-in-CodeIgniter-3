<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Student Registration Form</h2>
        <?php
            if($this->session->flashdata('error')){
                echo $this->session->flashdata('error');
            }
        ?>
        <form action="<?php echo site_url('crud/addUser'); ?>" method="post" class="needs-validation" novalidate>
        
            <div class="mb-3">
                <label for="stName" class="form-label">Name</label>
                <input type="text" name="name" id="stName" class="form-control name" placeholder="Enter your name" required autocomplete="name">
                <div class="invalid-feedback">
                    Please enter your name.
                </div>
            </div>
            
            <div class="mb-3">
                <label for="stEmail" class="form-label">Email</label>
                <input type="email" name="email" id="stEmail" class="form-control email" placeholder="Enter your email" required autocomplete="email">
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>
            
            <div class="mb-3">
                <label for="stPassword" class="form-label">Password</label>
                <input type="password" name="password" id="stPassword" class="form-control password" placeholder="Enter your password" required autocomplete="new-password">
                <div class="invalid-feedback">
                    Please enter a password.
                </div>
            </div>
            
            <button class="btn btn-primary submit" type="submit">Submit</button>
        
        </form>

        <div class="feedback"></div>
        <div class="error-log" style="color: red; margin-top: 20px;"></div> 

        <div>
            <br><br><br>
            <table border='1' class='mytable'>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <?php if(isset($allRecords) && $allRecords): ?> <!-- Check if $allRecords is set and not empty -->
                    <?php foreach($allRecords->result() as $std):?>
                            <tr>
                                <td><?= $std->stId;?></td>
                                <td><?= $std->stName;?></td>
                                <td><?= $std->stEmail;?></td>
                                <td><?= $std->stDate;?></td>
                            </tr>
                        <?php endforeach;?>
                <?php else: ?>
                    <tr><td colspan="3">No data exists</td></tr>
                <?php endif; ?>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (optional, if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
    var ajaxUrl = "<?php echo site_url('crud/addUser'); ?>";
    </script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script> 
</body>
</html>
