npx webpack --mode=development --watch  

python manage.py makemigrations 
python manage.py migrate 
env\Scripts\activate.bat 
deactivate

pip install -r requirements.txt