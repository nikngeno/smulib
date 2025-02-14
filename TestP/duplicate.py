import pandas as pd

# Load the Excel file
input_file = 'input.xlsx'  # Replace with your file name
output_file = 'output.xlsx'  # Name of the output file

# Read the Excel file into a DataFrame
df = pd.read_excel(input_file)

# Create 10 duplicate entries for each row
df_duplicates = pd.concat([df] * 10, ignore_index=True)

# Save the new DataFrame with duplicates to a new Excel file
df_duplicates.to_excel(output_file, index=False)

print(f"Output saved to {output_file}")
