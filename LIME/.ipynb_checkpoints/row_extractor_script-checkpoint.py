import pandas as pd

# File paths
csv_file = "C:\\Users\\diyaa\\Downloads\\LIME\\kidney_disease.csv"
temp_file = "C:\\Users\\diyaa\\Downloads\\LIME\\temp.csv"

# Load dataset
try:
    df = pd.read_csv(csv_file)

    # Ensure there are at least 100 rows
    if len(df) >= 100:
        row_100 = df.iloc[99]  # 100th row (index starts from 0)
        
        # Save the extracted row to temp.csv
        row_100.to_frame().T.to_csv(temp_file, index=False)
        print(f"Successfully extracted 100th row to {temp_file}")
    else:
        print("Error: Not enough rows in the CSV file.")

except Exception as e:
    print(f"Error processing CSV: {e}")