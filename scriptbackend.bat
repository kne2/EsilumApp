REM Se mueve a la carpeta del backend, no importa en cual de las apps sea, hagan el dockerignore y el gitignore y pongan el nombre de la carpeta del backend en los 2
cd AppAlumno\CarpetaDelBackEnd\


set /p commit= "Ingresar un commit :"
git add .
git commit -m "%commit%"
git push

REM Espera a que se termine de actualizar el github (si no ponía el timeout a veces no clonaba el update) y vuelve a buildear la app
timeout /t 10 /nobreak
docker-compose up --build