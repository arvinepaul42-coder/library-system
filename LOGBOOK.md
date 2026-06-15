                        

# BIT3208: Advanced Web Design and Development
## Weekly Logbook Report

### Student Details
* **Student Name:** Arvin Paul Adede
* **Admission Number:** BSCCS/2024/73911
* **Course/Class:** Bachelor of Science in Computer Science (Year 3 Semester 2)
* **Unit Code:** BIT3208
* **Unit Name:** Advanced Web Design and Development
* **Lecturer Name:** Michael Nyoro
* **Semester/Academic Year:** Year 3 Semester 2
  
### Project Details
* **Project Title:** Simple Library Management System
* **Selected Technologies:** Node.js, Express.js, MySQL, EJS, JWT Authentication, Bootstrap 5
**Online Portfolio / GitHub Link GitHub Repository:** https://github.com/arvinepaul42-coder/library-system


 
## Table of Contents
* [Week 1: Local Environment Setup](#week-1)
* [Week 2: Wireframes and GUI Design](#week-2)	
* [Week 3: Backend Development & Database Integration](week-3)
* [Week 4: Authentication System](week-4) 
* [Week 5: CRUD Operations & System Extension](week-5)
* [Week 6: Database Integration and CRUD Operations](week-6)

 
<a id="week-1"></a>
## Week 1: Local Environment Setup
**Title:** Setting Up the Local Development Environment

For this project, I opted for a traditional local development environment using XAMPP. I installed Visual Studio Code.
 
![Fig 1: Visual Studio Code open with the Library Management System folder](images/vs-code-view.png)
![Fig 2: XAMPP Control Panel showing Apache and MySQL running](images/xampp-panel.png)
![Fig 3: Successful MySQL database connection message in terminals](images/db-connection.png)

### Student Reflection
In Week 1, I successfully set up my local development environment using Visual Studio Code, Node.js, and XAMPP for the MySQL database server. I chose the Node.js + Express stack for its efficiency in full-stack JavaScript development. The main challenge was configuring the .env file with the correct database connection string. Fig 5 demonstrates the Express server successfully connecting to MySQL using the mysql2 package. This solid setup formed the foundation for the entire Library Management Systems 


<a id="week-2"></a>
## Week 2: Wireframes and GUI Design
**Title:** User Interface Planning and System Design

During this week, I focused on the conceptual design phase of the library management system. I created hand-drawn wireframes.

![Fig 1: Login Page Wireframe](images/login-wireframe.png)
![Fig 2: Mobile Responsive Mock-up](images/mobile-mockup.png)
![Fig 4: Colour theme and navigation structure](images/colour-theme.png)
![Fig 5: Final GUI prototype using Bootstrap 5](images/final-gui-prototype.png)

### Student Reflection
In Week 2, I focused on designing a clean and responsive user interface for the Library Management System. Bootstrap 5 was selected to ensure mobile compatibility and professional appearance. The design emphasizes simplicity with a dark navbar for better visibility. Navigation flow was planned to allow users to move easily from login to viewing their personal books. This user-friendly design targets students and book lovers.


<a id="week-3"></a>
## Week 3: Backend Development & Database Integration
**Title:** Server Setup and MySQL Database Connection

During this week, I focused on the backend development of the library system. I established the connection between my application and the database.

![Fig 1: auth.php or main database connection file showing PHP setup](images/db-connection-php.png)
![Fig 2: MySQL tables (users and books) created in phpMyAdmin](images/mysql-tables.png)
![Fig 3: .env file with database connection string](images/env-file.png)
![Fig 4: Sample data inserted into the database (phpMyAdmin)](images/sample-data.png)
![Fig 5: Terminal showing successful database connection](images/db-terminal.png)
    
### Student Reflection
Week 3 involved developing the backend using Express.js and integrating it with MySQL using a proper connection string. I created user and book tables with proper relationships via user_id. JWT authentication was implemented to meet the requirement of not using cookies for session storage. Fig 5 confirms the successful database connection, which is critical for data persistence in the system.



<a id="week-4"></a>
## Week 4: Authentication System
**Title:** User Registration, Login and JWT Authentication

During this week, I focused on implementing a secure authentication system for the library project.

![Fig 1: Registration form with crypts password hashing](images/registration-form.png)
![Fig 2: Login form and JWT token generation](images/login-token.png)
![Fig 3: Token stored in browser local Storage](images/local-storage.png)
![Fig 4: Protected /books route after successful login](images/protected-route.png)

### Student Reflection
In Week 4, I implemented a secure authentication system using crypts for password hashing and JWT for token-based authentication. This approach fully complies with the no-cookies requirement. The system ensures each user can only access their personal books. Fig 4 shows successful login leading to the protected dashboard. This week strengthened my knowledge of modern secure web authentication.


<a id="week-5"></a>
## Week 5: CRUD Operations & System Extension
**Title:** Implementing CRUD Operations and System Extension

During this week, I shifted focus to the core functionality of the library system by implementing CRUD operations.

![Fig 1: Add New Book form and successful data insertion](images/add-book.png)
![Fig 2: Books listing page displaying records from MySQL](images/books-list.png)
![Fig 3: Delete book functionality with confirmation prompt](images/delete-book.png)
![Fig 4: User-specific data filtering using user_id (phpMyAdmin view)](images/user-data-filtering.png)
![Fig 5: System Access and Workflow Initiation](images/system-access.png)
 
### Student Reflection
In Week 5, I implemented full CRUD functionality and extended the system with secure user-specific book management. Users can now register, login, add books, view their personal library, and delete books. All operations are protected with JWT authentication. Fig 5 demonstrates the complete working flow of the Library Management System. This week marked significant progress toward a fully functional application.


<a id="week-6"></a>
## Week 6: Database Integration and CRUD Operations
**Title:** Implementing Database Connectivity and CRUD Functionality

This week, I initiated the backend development phase by establishing a dynamic link between the library management system and the database.

![Fig 1: Library Management System database structure in phpMyAdmin](images/db-structure.png)
![Fig 2: PHP Database Connection Script](images/db-script.png)
![Fig 3: Book Registration Form](images/registration-form.png)
![Fig 4: Library Book Catalog (Read Operation)](images/books-list.png)
 

### Student Reflection
In week 6, I successfully transitioned into the backend development phase of my Library Management System. The core focus was on implementing the fundamental CRUD (Create, Read, Update, and Delete) operations by integrating a MySQL database with my PHP application.
