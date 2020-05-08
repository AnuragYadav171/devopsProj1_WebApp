# devopsProj1_WebApp
Web Application with Docker file and Jenkins file which will be used for CI CD pipeline


1) docker build -t web_app_fedora:latest .

2) docker run -it -v C:\xampp\htdocs\uploads:/var/www/html/uploads -p 9090:80 --network my-bridge-network --name webApp web_app_fedora
