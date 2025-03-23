import sys
import subprocess
import os
import json

# Path to the notebook
notebook_path = "C:\Users\diyaa\Downloads\LIME\Lime-Copy1.ipynb"
# Path to store the row index
row_index_file = os.path.dirname(notebook_path) + "/target_row.txt"

# Write the row index to a file
with open(row_index_file, "w") as f:
    f.write("400")

# Run the notebook
cmd = ["jupyter", "nbconvert", "--to", "script", notebook_path, "--output", "temp_script"]
subprocess.run(cmd, check=True)

# Run the generated script
cmd = ["python", os.path.dirname(notebook_path) + "/temp_script.py"]
result = subprocess.run(cmd, capture_output=True, text=True)

# Output the result
print(result.stdout)
if result.stderr:
    print("Error:", result.stderr)

# Get the prediction result
prediction_file = os.path.dirname(notebook_path) + "/prediction_result.txt"
try:
    if os.path.exists(prediction_file):
        with open(prediction_file, "r") as f:
            prediction = f.read().strip()
            print(prediction)
    else:
        print("No prediction result found.")
except Exception as e:
    print("Error reading prediction:", str(e))