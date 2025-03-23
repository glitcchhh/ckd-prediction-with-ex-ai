import papermill as pm

# Paths
notebook_path = "C:/xampp/htdocs/kidney_disease/LIME/Lime-Copy2.ipynb"
output_notebook = "C:/Users/diyaa/Downloads/LIMEnew/Lime-Copy2-output.ipynb"

try:
    # Execute the Jupyter Notebook
    pm.execute_notebook(
        notebook_path,  # Input notebook
        output_notebook  # Output executed notebook
    )

    print("✅ LIME Model executed successfully!")

except Exception as e:
    print(f"❌ Error running LIME model: {e}")
