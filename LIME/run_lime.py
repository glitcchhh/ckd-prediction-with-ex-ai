import papermill as pm
import os
import time

# Paths
notebook_path = "C:/xampp/htdocs/kidney_disease/LIME/Lime-Copy2.ipynb"
output_notebook = "C:/xampp/htdocs/kidney_disease/LIME/Lime-Copy2-output.ipynb"
prediction_file = "C:/xampp/htdocs/kidney_disease/LIME/prediction_result.txt"
lime_html_file = "C:/xampp/htdocs/kidney_disease/LIME/lime_explanation.html"

try:
    # Execute the Jupyter Notebook
    pm.execute_notebook(
        notebook_path,  # Input notebook
        output_notebook  # Output executed notebook
    )

    # Wait to ensure the notebook execution completes
    time.sleep(10)  # Ensure file writing is completed

    # Check if files were updated
    if os.path.exists(prediction_file):
        print("✅ Prediction result file updated.")
    else:
        print("❌ Prediction result file NOT found.")

    if os.path.exists(lime_html_file):
        print("✅ LIME explanation file updated.")
    else:
        print("❌ LIME explanation file NOT found.")

except Exception as e:
    print(f"❌ Error running LIME model: {e}")
