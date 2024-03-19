CREATE DATABASE ResearchData;
USE ResearchData;

CREATE TABLE student ( 

student_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 

student_name VARCHAR(30) NOT NULL, 

student_username VARCHAR(30) NOT NULL, 

student_password VARCHAR(80) NOT NULL, 

auth BIT NOT NULL 

); 

  

CREATE TABLE admin ( 

admin_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 

admin_name VARCHAR(30) NOT NULL, 

admin_username VARCHAR(30) NOT NULL, 

admin_password VARCHAR(80) NOT NULL 

); 

  

CREATE TABLE image ( 

image_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 

image_name VARCHAR(20) NOT NULL, 

image_description VARCHAR(255) NOT NULL 

); 

  

CREATE TABLE post ( 

post_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 

post_name VARCHAR(20) NOT NULL, 

post_description VARCHAR(255) NOT NULL, 

post_content VARCHAR(255) NOT NULL, 

student_id_fk INT NOT NULL, 

FOREIGN KEY (student_id_fk) REFERENCES student(student_id), 

admin_id_fk INT NOT NULL, 

FOREIGN KEY (admin_id_fk) REFERENCES admin(admin_id), 

image_id_fk INT NOT NULL, 

FOREIGN KEY (image_id_fk) REFERENCES image(image_id) 

); 
