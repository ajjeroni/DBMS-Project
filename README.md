# 📚 University Course & Enrollment Management System  
*A full-stack database-driven web application built with MySQL + PHP*

## 🚀 Overview
This project is a fully functional **web-based university database system** designed to manage professors, departments, courses, students, and enrollments.

Built as part of a collaborative 3-person team, the system demonstrates real-world relational database design, ER modeling, backend development, and frontend interface creation.

The application runs on a secure CSUF department server using **MySQL** and **PHP**, and includes a complete schema, DDL, frontend pages, and backend query logic.

---

## 🏗️ Features

### 👩‍🏫 Professor Portal
- **View Assigned Classes**  
  Enter a professor’s SSN to list:
  - Course titles  
  - Classroom locations  
  - Meeting days  
  - Start & end times  

- **Grade Distribution Report**  
  Given a course number & section number:
  - Count how many students earned each grade (A, A-, B+, B, B-, etc.)

---

### 🎓 Student Portal
- **Browse Course Sections**  
  Enter a course number to display:
  - All available sections  
  - Classrooms  
  - Meeting days & times  
  - Number of students enrolled in each section  

- **View Student Transcript**  
  Enter a campus-wide student ID to list:
  - All completed courses  
  - Grades earned  

---

## 🗄️ Database Design

### 📌 Entities Modeled
- Professors (SSN, personal details, title, degrees)
- Departments (name, office, phone, chairperson)
- Courses (title, textbook, units, prerequisites)
- Sections (classroom, capacity, instructor, meeting times)
- Students (name, ID, major, minors, contact info)
- Enrollments (student, section, grade)

### 📊 Included Project Artifacts
- ER diagram  
- Relational schema with PK/FK definitions  
- Full DDL used to create tables  
- SQL queries for all required operations  
- PHP scripts for backend logic and UI  
- Screenshots of the system running on the CSUF server  

The database includes at least:
- **8 students**
- **3 professors**
- **2 departments**
- **4 courses**
- **6 sections**
- **20+ enrollment records**

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|------------|
| Database | MySQL |
| Backend | PHP |
| Frontend | HTML/CSS with PHP templating |
| Deployment | CSUF Linux server (SSH + VPN) |

---

## 📸 Screenshots
The full report includes:
- Interfaces for students and professors  
- Completed queries & results  
- Sample inputs & outputs  
- Database test runs from the department server  

---

## 👥 Team
A collaborative project developed by a 3-person team involving:
- Database design (ERD, schema)  
- Backend PHP development  
- Web interface creation  
- Data entry & validation  
- Remote server deployment & testing  

---

## 🎯 Skills Demonstrated
- Relational database design (ERD → schema → DDL)
- SQL joins, aggregation, constraints, and nested queries  
- PHP server-side scripting  
- Full-stack web application development  
- Data integrity and referential design  
- Working with Linux servers (SSH, permissions)  
- Team collaboration and documentation

---
