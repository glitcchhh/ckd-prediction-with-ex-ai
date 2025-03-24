<?php
include("header.php");
include("nav.php");

$csv_file = "C:\\xampp\\htdocs\\kidney_disease\\LIME\\kidney_disease.csv";
$lime_script = "C:\\xampp\\htdocs\\kidney_disease\\LIME\\run_lime.py";
$prediction_file = "C:\\xampp\\htdocs\\kidney_disease\\LIME\\prediction_result.txt";
$lime_html_file = "C:\\xampp\\htdocs\\kidney_disease\\LIME\\lime_explanation.html"; // Path to the LIME HTML file

?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Kidney Disease Prediction</h3>
            </div>
        </div>

        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Enter Patient Details</h4>
                        </div>
                        <div class="card-content">
                            <form method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        $fields = [
                                            "age", "bp", "sg", "al", "su", "rbc", "pc", "pcc", "ba",
                                            "bgr", "bu", "sc", "sod", "pot", "hemo", "pcv", "wc", "rc",
                                            "htn", "dm", "cad", "appet", "pe", "ane"
                                        ];

                                        foreach ($fields as $field) {
                                            echo '<div class="col-sm-6 mb-3">
                                                    <label>' . ucfirst(str_replace("_", " ", $field)) . '</label>
                                                    <input type="text" class="form-control" name="' . $field . '" required>
                                                  </div>';
                                        }
                                        ?>
                                    </div>
                                    <button type="submit" name="predict" class="btn btn-primary">Predict</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['predict'])) {
                        $input_data = [];
                        foreach ($fields as $field) {
                            $input_data[$field] = $_POST[$field];
                        }

                        $target_row_id = 134; // 🔹 Set ID to 99
                        $csv_data = [];
                        $headers = [];

                        if (file_exists($csv_file)) {
                            $file = fopen($csv_file, "r");
                            if ($file) {
                                $headers = fgetcsv($file);
                                while (($line = fgetcsv($file)) !== false) {
                                    $csv_data[] = $line;
                                }
                                fclose($file);
                            }
                        }

                        if (empty($headers)) {
                            $headers = array_merge(['id'], $fields, ['class']);
                        }

                        while (count($csv_data) + 1 < $target_row_id) {
                            $csv_data[] = array_fill(0, count($headers), "");
                        }

                        $new_row = array_fill(0, count($headers), "");
                        $new_row[0] = $target_row_id;
                        foreach ($fields as $field) {
                            $header_index = array_search($field, $headers);
                            if ($header_index !== false) {
                                $new_row[$header_index] = $input_data[$field];
                            }
                        }
                        $csv_data[$target_row_id - 2] = $new_row; // 🔹 Insert at index 98 (zero-based)

                        $file = fopen($csv_file, "w");
                        fputcsv($file, $headers);
                        foreach ($csv_data as $row) {
                            fputcsv($file, $row);
                        }
                        fclose($file);

                        sleep(3);

                        // Run LIME Model
                        $command = "C:\Users\diyaa\AppData\Local\Programs\Python\Python312\python.exe \"$lime_script\" 2>&1"; 
                        $output = shell_exec($command);
                        echo "<pre>$output</pre>"; // Display error messages


                        // Fetch Prediction Result
                        $prediction_result = "";
                        if (file_exists($prediction_file)) {
                            $prediction_result = trim(file_get_contents($prediction_file));
                        }

                        echo "<div class='col-lg-9 col-md-12 well' style='background-color:#aad6ff'>
                                <center><h1>Prediction Result</h1><hr>
                                <pre><h3>" . htmlspecialchars($prediction_result) . "</h3>";
                        if (stripos($prediction_result, 'ckd') !== false) {
                            echo "<a href='viewhospital.php' class='btn btn-danger'>Consult Doctor</a><br><br><br>";
                        }
                        echo "</pre></center><br><br><br></div>";

                        // Display LIME Explanation HTML
                        if (file_exists($lime_html_file)) {
                            $lime_html_content = file_get_contents($lime_html_file);
                            echo "<div class='col-lg-9 col-md-12 well' style='background-color:#f0f0f0'>
                                    <center><h1>LIME Explanation</h1><hr>
                                    <div style='text-align: left; padding: 20px;'>" . $lime_html_content . "</div>
                                    </center><br><br><br></div>";
                        } else {
                            echo "<div class='col-lg-9 col-md-12 well' style='background-color:#f0f0f0'>
                                    <center><h1>LIME Explanation</h1><hr>
                                    <p>LIME explanation not available.</p>
                                    </center><br><br><br></div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>