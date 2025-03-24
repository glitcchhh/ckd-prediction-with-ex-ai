<?php
include("header.php");
include("nav.php");
?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Kidney Disease Prediction Using CT Scan</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Predict Kidney Disease</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Upload CT Scan Image</h4>
                            <p class="card-subtitle text-muted mr1">
                                Upload a CT scan image in JPEG format to predict the presence of kidney disease.
                            </p>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collapse show">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-3">Upload CT Scan Image</h6>
                                                    <p class="text-muted small">
                                                        Supported format: JPEG. Max file size: 5MB.
                                                    </p>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="file" class="form-control" name="images" accept=".jpeg, .jpg" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <button type="submit" class="btn btn-danger px-4" name="submit">
                                                        <i class="la la-check"></i> Predict
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php
                    set_time_limit(0);

                    if (isset($_POST['submit']) && isset($_FILES['images'])) {
                        $upload_dir = "C:\\xampp\htdocs\\kidney_disease\\LIME\\"; 
                        $target_file = $upload_dir . "input.jpeg"; 
                        $output_file = $upload_dir . "predicted_result2.txt"; 
                        $log_file = $upload_dir . "debug_log.txt"; // Log file to store debug output

                        // Delete old files
                        if (file_exists($target_file)) unlink($target_file);
                        if (file_exists($output_file)) unlink($output_file);
                        if (file_exists($log_file)) unlink($log_file);

                        // Move uploaded file
                        if (move_uploaded_file($_FILES['images']['tmp_name'], $target_file)) {
                            echo "<div class='alert alert-success mb-2'>File uploaded successfully as input.jpeg</div>";

                            // Run Python script and log output
                            $python_exe = "C:\\Users\\diyaa\\AppData\\Local\\Programs\\Python\\Python312\\python.exe";
                            $script_path = "C:\\Users\\diyaa\\Downloads\\LIME\\onlycnn.py";

                            $cmd = "$python_exe $script_path > $log_file 2>&1"; // Redirect output to debug_log.txt
                            exec($cmd, $output, $return_code);

                            sleep(5); // Wait for script to initialize

                            // Wait for output file
                            $max_wait_time = 5;
                            $elapsed_time = 0;

                            while (!file_exists($output_file) && $elapsed_time < $max_wait_time) {
                                sleep(2);
                                $elapsed_time += 2;
                            }

                            // Display prediction result
                            if (file_exists($output_file)) {
                                $prediction = file_get_contents($output_file);
                                echo "<div class='card mb-2'>
                                        <div class='card-header'>
                                            <h4 class='card-title'>Prediction Result</h4>
                                        </div>
                                        <div class='card-body text-center'>
                                            <h3 class='text-primary'>" . htmlspecialchars($prediction) . "</h3>
                                            <hr>
                                            <p class='text-muted'>
                                                If the result is not 'Predicted class: 1', consult a doctor for further evaluation.
                                            </p>
                                            <a href='viewhospital.php' class='btn btn-danger'>
                                                <i class='la la-stethoscope'></i> Consult Doctor
                                            </a>
                                        </div>
                                      </div>";
                            } else {
                                echo "<div class='alert alert-danger mb-2'>Prediction failed. Output file not found after waiting for 30 seconds!</div>";
                            }

                            // Debugging: Show Python execution log
                            if (file_exists($log_file)) {
                                echo "<div class='card mb-2'>
                                        <div class='card-header'>
                                            <h4 class='card-title'>Python Execution Log</h4>
                                        </div>
                                        <div class='card-body'>
                                            <pre class='bg-light p-2'>" . htmlspecialchars(file_get_contents($log_file)) . "</pre>
                                        </div>
                                      </div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger mb-2'>File upload failed!</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>