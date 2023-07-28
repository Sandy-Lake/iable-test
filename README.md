# IABLE Project

## Installation steps:
1. If you’re on Linux, you should install the docker and docker-compose packages through your distribution’s package manager. Depending on your distribution, you may need to:
<br/>
- Add your user to the docker group as outlined in the Docker manual here.
<br/>
- Start the docker service:
<br/>
```systemctl start docker.service```
<br/>
and enable it with:
<br/>
```systemctl enable docker```
<br/>
If you’re on Windows or macOS, the installer will do this for you.

2. Run the following commands:
<br/>
```docker-compose build```
<br/>
```docker-compose up -d```


3. For insterting data to MySQL, you need to run such commands:
<br/>
```docker exec -i mysql mysql -uroot -psecret iable < dumps/database.sql```
<br/>
To make sure that our MySQL image uses correct database, go to the MySQL container and select needed database:
<br/>
```docker exec -it mysql```
<br/>
```mysql -uroot -psecret```
<br/>
```use iable;```
<br/>

## API Documentation

1. The project has Course entity, which structure reflected in object model that places in ```models/Course.php```.
2. ```api/CourseManager.php``` object that serves for CRUD operations.
