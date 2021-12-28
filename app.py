# utils
import os
import numpy as np
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image
from flask import Flask, request, render_template
from werkzeug.utils import secure_filename


# define flask app
app = Flask(__name__)

# model name(acuuracy : 61.87%)
MODEL_PATH ='my_model.h5'  

# load trained model
model = load_model(MODEL_PATH)

def model_predict(img_path, model):
    print('Uploaded image path: ',img_path)
    loaded_image = image.load_img(img_path, target_size=(64, 64))

    # preprocess the image
    loaded_image_in_array = image.img_to_array(loaded_image)

    # normalize
    loaded_image_in_array=loaded_image_in_array/255

    # add additional dim such as to match input dim of the model architecture
    x = np.expand_dims(loaded_image_in_array, axis=0)

    # prediction
    prediction = model.predict(x)

    results=np.argmax(prediction, axis=1)

    if results==0:
        results="(왼쪽) 망막병증 1단계가 의심됩니다."
    elif results==1:
        results="(왼쪽) 망막병증 2단계가 의심됩니다."
    elif results==2:
        results="(왼쪽) 망막병증 3단계가 의심됩니다."
    elif results==3:
        results="(왼쪽) 망막병증 4단계가 의심됩니다."                        
    elif results==4:
        results="(왼쪽) 정상입니다."
    elif results==5:
        results="(오른쪽) 망막병증 1단계가 의심됩니다."
    elif results==6:
        results="(오른쪽) 망막병증 2단계가 의심됩니다."
    elif results==7:
        results="(오른쪽) 망막병증 3단계가 의심됩니다."                        
    elif results==8:
        results="(오른쪽) 망막병증 4단계가 의심됩니다."  
    else:
        results="(오른쪽) 정상입니다."

    return results

@app.route('/', methods=['GET'])
def index():
    return render_template('index.html')

@app.route('/predict', methods=['GET', 'POST'])
def upload():
    if request.method == 'POST':
        # Get the file from post request
        f = request.files['file']

        # Save the file to ./uploads
        basepath = os.path.dirname(__file__)
        file_path = os.path.join(
            basepath, 'uploads', secure_filename(f.filename))
        f.save(file_path)

        # Make prediction
        preds = model_predict(file_path, model)
        result=preds
        return result
    return None

if __name__ == '__main__':
    app.run(port=5001,debug=True)
