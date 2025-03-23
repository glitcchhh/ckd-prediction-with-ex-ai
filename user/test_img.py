import os
import numpy as np
import tensorflow as tf
from keras.models import load_model
from keras.preprocessing import image
from keras.applications.mobilenet_v2 import preprocess_input

# Load the trained model
model = load_model("KIDNEY-Diseases.h5")  # Make sure to provide the correct path to your trained model

# Path to the folder containing test images
test_folder = 'test1/test'

# Get the list of image file names in the test folder
test_files = os.listdir(test_folder)

# Preprocess and resize the test images
test_images = []
for file in test_files:
    # Load and resize each image
    img_path = os.path.join(test_folder, file)
    img = image.load_img(img_path, target_size=(224, 224))  # Resize to (224, 224)
    img_array = image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0)
    img_array = preprocess_input(img_array)  # Apply MobileNetV2 preprocessing
    test_images.append(img_array)

# Concatenate all preprocessed images into a single array
test_images = np.concatenate(test_images, axis=0)

# Predict the classes for the test images using the loaded model
pred_probs = model.predict(test_images)
pred_labels = np.argmax(pred_probs, axis=1)

# Define class labels
class_labels = ['Cyst', 'Normal', 'Stone', 'Tumor']

# Convert the predicted labels to class names
pred_classes = [class_labels[label] for label in pred_labels]

# Print the predicted classes
out=pred_classes[0]

f = open("output_img.txt", "w")
f.write(out)
f.close()

print(out)