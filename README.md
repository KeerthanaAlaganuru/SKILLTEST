# Skill Test Web Application

## Overview
The Skill Test Web Application is designed for educational institutions to facilitate online examinations. It allows students to log in, select subjects, and take multiple-choice questions (MCQs) exams. The application is built using PHP for server-side scripting and Bootstrap for responsive front-end design.

## Features
- **User Authentication**: Students can log in securely using a username and password.
- **Dynamic Question Loading**: Based on the selected subject, the application fetches relevant questions from the database.
- **Navigation Between Questions**: Students can navigate between questions with "Next" and "Previous" buttons. The application validates user input to ensure an answer is selected before proceeding.
- **Submission of Answers**: Once all questions are answered, students can submit their responses for evaluation.
- **Responsive Design**: The application is mobile-friendly, providing a good user experience on various devices.

## Technologies Used
### Frontend:
- **HTML/CSS**: Structure and style of the application.
- **JavaScript**: For handling dynamic question navigation and form validation.
- **Bootstrap**: For responsive design and styling.

### Backend:
- **PHP**: Server-side scripting for processing requests and interacting with the database.
- **MySQL**: Database to store user data, questions, and answers.

## File Structure
- **index.html**: Main login page for students.
- **studentValidation.php**: Validates user credentials and redirects to the exam page.
- **exam.php**: Displays the exam questions and handles navigation and submission logic.
- **Result.php**: Processes and displays the exam results.
- **Database Setup**: SQL commands to create the necessary database and tables for the application.
- **Styles**: CSS files for custom styles.


