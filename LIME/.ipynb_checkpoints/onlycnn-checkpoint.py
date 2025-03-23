import numpy as np
import tensorflow as tf
import cv2
import os

# Define paths
image_path = "C:/Users/diyaa/Downloads/LIME/input.jpeg"
model_path = "C:/Users/diyaa/Downloads/LIME/new_diya_kidney_model.keras"
output_file = "C:/Users/diyaa/Downloads/LIME/predicted_result2.txt"

# Check if the model file exists
if not os.path.exists(model_path):
    with open(output_file, "w") as f:
        f.write(f"Error: Model file not found at {model_path}\n")
    print(f"Error: Model file not found at {model_path}")
    exit(1)

# Load the trained model
model = tf.keras.models.load_model(model_path)
print("Model loaded successfully!")

# Load and preprocess image
img = cv2.imread(image_path)
if img is None:
    with open(output_file, "w") as f:
        f.write(f"Error: Image file not found at {image_path}\n")
    print(f"Error: Image file not found at {image_path}")
    exit(1)

img = cv2.resize(img, (28, 28))
if img.shape[2] == 1:
    img = np.dstack([img, img, img])

img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
img = np.array(img) / 255.0
pic = np.array([img])

# Predict
predictions = model.predict(pic)
predicted_class = np.argmax(predictions)

# Save result to file
with open(output_file, "w") as f:
    f.write(f"Predicted class: {predicted_class}\n")

print(f"Prediction saved to {output_file}")
