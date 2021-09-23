cd AppAlumno\EsilumBackEnd\
set /p commit= "Ingresar un commit :"
git add .
git commit -m "%commit%"
git push
timeout /t 10 /nobreak
docker-compose up --build