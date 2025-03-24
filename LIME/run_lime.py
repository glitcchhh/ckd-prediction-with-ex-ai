#!/usr/bin/env python
# coding: utf-8

# In[1]:


import pandas as pd
from sklearn.model_selection import train_test_split
#from sklearn.metrics import accuracy_score
from sklearn.metrics import accuracy_score, confusion_matrix, classification_report
import lime
from lime import lime_tabular
import matplotlib.pyplot as plt
import seaborn as sns


# In[2]:


df = pd.read_csv("C:/xampp/htdocs/kidney_disease/LIME/kidney_disease.csv")

df.drop('id', axis = 1, inplace = True)     #dropping the unecessary "id" column 

df.columns = ['age', 'blood_pressure', 'specific_gravity', 'albumin', 'sugar', 'red_blood_cells', 'pus_cell',
              'pus_cell_clumps', 'bacteria', 'blood_glucose_random', 'blood_urea', 'serum_creatinine', 'sodium',
              'potassium', 'haemoglobin', 'packed_cell_volume', 'white_blood_cell_count', 'red_blood_cell_count',
              'hypertension', 'diabetes_mellitus', 'coronary_artery_disease', 'appetite', 'peda_edema',
              'anaemia', 'class']
df.head()


# For each of the columns (packed_cell_volume, white_blood_cell_count, and red_blood_cell_count), the code is:
# 
# * Using pd.to_numeric() to convert the values to numeric data types
# * Setting errors='coerce' which will convert any non-numeric values to <b> NaN (Not a Number) </b>
# 
# 
# The purpose of this conversion is likely to:
# 
# * Ensure these columns are properly formatted as <b> numeric values </b>  for analysis
# * <b> Handle any string or other non-numeric values </b> that might be present in these columns
# * Make these columns suitable for mathematical operations or statistical analysis
# 
# 
# After this operation:
# 
# * Any values that were already numeric remain unchanged
# * Any values that weren't valid numbers (like strings, special characters, etc.) are now NaN values
# * The dtype of these columns will be either int64 or float64 depending on the values

# In[3]:


#Converting Some Columns to Numeric
df['packed_cell_volume'] = pd.to_numeric(df['packed_cell_volume'], errors='coerce')
df['white_blood_cell_count'] = pd.to_numeric(df['white_blood_cell_count'], errors='coerce')
df['red_blood_cell_count'] = pd.to_numeric(df['red_blood_cell_count'], errors='coerce')


#Identifying Categorical & Numerical Columns
cat_cols = [col for col in df.columns if df[col].dtype == 'object']
num_cols = [col for col in df.columns if df[col].dtype != 'object']


# looking at unique values in categorical columns

for col in cat_cols:
    print(f"{col} has {df[col].unique()} values\n")


# In[4]:


# replace incorrect values

df['diabetes_mellitus'].replace(to_replace = {'\tno':'no','\tyes':'yes',' yes':'yes'},inplace=True)

df['coronary_artery_disease'] = df['coronary_artery_disease'].replace(to_replace = '\tno', value='no')

df['class'] = df['class'].replace(to_replace = {'ckd\t': 'ckd', 'notckd': 'not ckd'})


#Converting Class Labels to Numeric
df['class'] = df['class'].map({'ckd': 1, 'not ckd': 0})   # Convert "ckd" to 1 and "not ckd" to 0 for classification.
df['class'] = pd.to_numeric(df['class'], errors='coerce')
cols = ['diabetes_mellitus', 'coronary_artery_disease', 'class']

for col in cols:
    print(f"{col} has {df[col].unique()} values\n")


# In[5]:


df.isna().sum().sort_values(ascending = False)


# In[6]:


df[num_cols].isnull().sum()


# In[7]:


df[cat_cols].isnull().sum()


# In[8]:


# filling null values

def random_value_imputation(feature):   # Fills missing values with random samples - random sampling
    random_sample = df[feature].dropna().sample(df[feature].isna().sum())
    random_sample.index = df[df[feature].isnull()].index
    df.loc[df[feature].isnull(), feature] = random_sample

def impute_mode(feature):    # mean/mode sampling
    mode = df[feature].mode()[0]
    df[feature] = df[feature].fillna(mode)

# filling num_cols null values using random sampling method  

for col in num_cols:
    if df[col].isnull().sum() > 0:  # Apply only if there are missing values
        random_value_imputation(col)

df[num_cols].isnull().sum()


# In[9]:


# filling "red_blood_cells" and "pus_cell" using random sampling method and rest of cat_cols using mode imputation

random_value_imputation('red_blood_cells')
random_value_imputation('pus_cell')

for col in cat_cols:
    if df[col].isnull().sum() > 0:  # Apply only if there are missing values
        impute_mode(col)

df[cat_cols].isnull().sum()



# In[10]:


#categorical features encoding
for col in cat_cols:
    print(f"{col} has {df[col].nunique()} categories\n")


# This code is using scikit-learn's `LabelEncoder` to convert categorical variables into numeric format. Here's what it does:
# 
# 1. First, it imports the `LabelEncoder` class from scikit-learn's preprocessing module
# 2. It creates an instance of the `LabelEncoder` called `le`
# 3. Then, for each column in the list `cat_cols` (which presumably contains the names of categorical columns in the dataframe):
#    - It applies `fit_transform()` on that column
#    - This transforms categorical text values into numeric integers
#    - The result is stored back in the same column of the dataframe
# 
# The `LabelEncoder` works by:
# - Assigning a unique integer to each distinct category in the column
# - For example, if a column contains values ["red", "blue", "green", "red"], it would transform them to [0, 1, 2, 0]
# - The encoding is determined alphabetically by default, so "blue" might become 0, "green" becomes 1, "red" becomes 2
# 
# This is a common preprocessing step for machine learning models that require numeric inputs rather than text categories. However, there are some considerations:
# - `LabelEncoder` creates an ordinal relationship between categories which may not exist
# - For categorical variables with no intrinsic order, techniques like one-hot encoding are often preferable
# - Using the same encoder instance for multiple columns means each column gets its own independent encoding
# 
# Note that reusing the same `LabelEncoder` instance across different columns (as done in this code) is valid because each call to `fit_transform()` resets the encoder's internal state.

# In[11]:


from sklearn.preprocessing import LabelEncoder

# Define columns that need binary encoding
binary_cols = ['red_blood_cells', 'pus_cell', 'pus_cell_clumps', 'bacteria', 
               'hypertension', 'diabetes_mellitus', 'coronary_artery_disease', 
               'appetite', 'peda_edema', 'anaemia']

# Initialize LabelEncoder
le = LabelEncoder()

# Apply LabelEncoder to each binary column
for col in binary_cols:
    df[col] = le.fit_transform(df[col])

df.head()


# When you use `LabelEncoder` to convert categorical values to numbers, you're assigning numeric values (like 0, 1, 2, 3) to categories that might not have any natural ordering. This can potentially mislead machine learning algorithms into inferring a relationship that doesn't exist in the real world.
# 
# For example, let's say you have a "color" column with values ["red", "blue", "green"]. After label encoding, these might become [2, 0, 1]. Now, mathematically:
# - blue (0) < green (1) < red (2)
# 
# This creates an implicit ordering suggesting that "blue" is somehow "less than" "green" which is "less than" "red." But colors don't have this kind of natural ordering in reality.
# 
# Some algorithms are particularly sensitive to this:
# - Linear and logistic regression models might interpret these values as having meaningful numeric distances
# - Tree-based models like Decision Trees and Random Forests are less affected but may still be influenced
# - Neural networks might assign importance to the numeric relationships
# 
# This becomes problematic when the algorithm tries to learn patterns like "as the color increases from blue (0) to red (2), the target variable tends to increase." Such patterns would be arbitrary and could lead to poor generalization.
# 
# For truly categorical features with no ordering, one-hot encoding is often preferred because it creates binary features (presence/absence) for each category without implying any ordinal relationship between them.

# In[12]:


ind_col = [col for col in df.columns if col != 'class']
dep_col = 'class'

X = df[ind_col]
y = df[dep_col]

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.30, random_state = 0)



# Splitting into <b>70%</b> train, <b>30%</b> test

# <h4>Implementing GridSearchCV on RandomForestClassifier to create the best random forest model</h4>

# In[13]:


from sklearn.ensemble import RandomForestClassifier
from sklearn.model_selection import GridSearchCV
from sklearn.metrics import accuracy_score, confusion_matrix, classification_report

# Step 1: Define the base model
rf = RandomForestClassifier(random_state=42)

# Step 2: Define the hyperparameter grid
param_grid = {
    'n_estimators': [50, 100, 150],      # Number of trees
    'max_depth': [5, 10, 15],            # Maximum depth of trees
    'min_samples_split': [2, 5, 10],     # Minimum samples required to split a node
    'min_samples_leaf': [1, 2, 4],       # Minimum samples in a leaf node
    'max_features': ['sqrt', 'log2'],    # Number of features considered for split
    'criterion': ['gini', 'entropy']     # Splitting criterion
}

# Step 3: Initialize GridSearchCV
grid_search = GridSearchCV(
    estimator=rf,
    param_grid=param_grid,
    cv=5,                  # 5-fold cross-validation
    scoring='accuracy',     # Optimizing for accuracy
    n_jobs=-1,             # Use all CPU cores
    verbose=1              # Display progress
)

# Step 4: Fit GridSearchCV to training data
grid_search.fit(X_train, y_train)

# Step 5: Get the best hyperparameters
best_params = grid_search.best_params_
print("\nBest Parameters:", best_params)

# Step 6: Train the best model with optimal parameters
best_rf = grid_search.best_estimator_

# Step 7: Evaluate the optimized model
y_train_pred = best_rf.predict(X_train)
y_test_pred = best_rf.predict(X_test)

train_acc = accuracy_score(y_train, y_train_pred)
test_acc = accuracy_score(y_test, y_test_pred)

print(f"\nTraining Accuracy of Optimized Random Forest: {train_acc}")
print(f"Test Accuracy of Optimized Random Forest: {test_acc} \n")

print(f"Confusion Matrix:\n{confusion_matrix(y_test, y_test_pred)}\n")
print(f"Classification Report:\n{classification_report(y_test, y_test_pred)}")


# In[15]:


train_count = X_train.shape[0]
test_count = X_test.shape[0]
print("Training data count:", train_count)
print("Testing data count:", test_count)
print("First test instance index:", X_test.index[0])
print("First test instance data:\n", X_test.iloc[0])

X_train.head()
X_test.head()


# <h4>Explanation for best random forest model using GridSearchCV</h4>

# In[16]:


import lime.lime_tabular
import pandas as pd
import numpy as np

# Ensure the index is within valid bounds
row_index = 0  # Change this to select a specific row
if row_index >= len(X_test) or row_index < 0:
    raise ValueError(f"Invalid row index {row_index}. Choose between 0 and {len(X_test)-1}.")

# Create LIME explainer
explainer = lime.lime_tabular.LimeTabularExplainer(
    X_test.values, 
    mode='classification', 
    training_labels=y_train, 
    feature_names=X.columns.tolist(),
    discretize_continuous=True  # Helps in handling continuous features
)

# Select instance to explain
instance_to_explain = X_test.iloc[row_index]

# Explain the selected instance
exp = explainer.explain_instance(
    instance_to_explain.values, 
    lambda x: best_rf.predict_proba(pd.DataFrame(x, columns=X.columns))
)

# Convert to HTML and save to file
# Save the explanation as HTML
html_content = exp.as_html(show_table=True, show_all=False)
#print(html_content)
with open("C:/xampp/htdocs/kidney_disease/LIME/lime_explanation.html", "w", encoding="utf-8") as f:
    f.write(html_content)




# In[ ]:


from tabulate import tabulate
from termcolor import colored

# Get LIME explanation as a list
exp_list = exp.as_list()

# Get the predicted probabilities (CKD=1, Not CKD=0) from your classifier
probs = best_rf.predict_proba(pd.DataFrame([instance_to_explain.values], columns=X.columns))[0]

predicted_class = probs.argmax()  # 1 for CKD, 0 for Not CKD

# Extract original feature names
original_features = X.columns.tolist()

# Convert explanation to a table format
exp_table = []
for feature_label, weight in exp_list:
    # Extract the actual feature name from LIME's output
    feature_name = next((f for f in original_features if f in feature_label), feature_label)

    # Get the corresponding instance value
    instance_value = instance_to_explain.get(feature_name, "N/A")

    # Highlight based on class impact
    if predicted_class == 1:  # If CKD is predicted
        weight_str = colored(f"{weight:.3f}", "red") if weight > 0 else colored(f"{weight:.3f}", "green")  # Red for CKD contributors
    else:  # If Not CKD is predicted
        weight_str = colored(f"{weight:.3f}", "red") if weight > 0 else colored(f"{weight:.3f}", "green")  # Green for Not CKD contributors

    exp_table.append([feature_name, instance_value, weight_str])

# Print the table//////////////////
output_text = f"\nExplanation for the test instance at index {row_index} (CKD=1, Not CKD=0):\n"
output_text += f"Predicted Class: {'CKD (1)' if predicted_class == 1 else 'Not CKD (0)'}\n\n"
output_text += tabulate(exp_table, headers=['Feature', 'Instance Value', 'Weight'], tablefmt='pretty')

# Print output (optional)
print(output_text)

# **Save to a text file**
prediction_file = "C:\\xampp\\htdocs\\kidney_disease\\LIME\\prediction_result.txt"
with open(prediction_file, "w", encoding="utf-8") as f:
    f.write(output_text)

print(f"✅ Prediction result saved to {prediction_file}")


